<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Helpers\Helper;

use App\Models\User\Cart;
use App\Models\Admin\Item;

use Session;
use Validator;
use PDF;

class TransactionController extends Controller
{
    protected $rules = [
        'item_id' => 'required|numeric',
        'qty' => 'required|numeric',
    ];

    private $item = [], $price = [], $total_price = 0, $items_id, $qty, $data_per_vendor = [];
    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$this->user = Auth::user();
        $carts = Cart::where('user_id', $this->user->id)->get();
        return view('pages.shop.cart')->withCarts($carts);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Please use DB::transaction(); */

        $this->items_id = json_decode($request->items_id, true);
        $this->qty = json_decode($request->qty, true);

        if (Auth::check()) {
            $this->user = Auth::user();
            if (count($this->items_id) > 0 || count($this->items_id) != 0 || count($this->items_id) != null) {
                foreach ($this->items_id as $index => $item_id) {
                    $this->item[$item_id] = Item::findOrFail($item_id);
                    if ($this->item[$item_id]->count() > 0 || $this->item[$item_id] != 0 || $this->item[$item_id] != null) {
                        if ($this->qty[$index] <= $this->item[$item_id]->qty) {
                            if ($this->item[$item_id]->price_after_discount != '' || $this->item[$item_id]->price_after_discount != null || $this->item[$item_id]->price_after_discount != 0) {
                                $this->price[$item_id] = ((float) $this->item[$item_id]->price_after_discount) * ((float) $this->qty[$index]);
                                $this->total_price += $this->price[$item_id];
                            } else {
                                $this->price[$item_id] = ((float) $this->item[$item_id]->normal_price) * ((float) $this->qty[$index]);
                                $this->total_price += $this->price[$item_id];
                            }
                        } else {
                            return response()->json(array('errors' => 'Periksa kembali Qty yang Anda masukkan!'));
                            break;
                        }
                    } else {
                        /* Complete code this, this program haven't stable */
                        return response()->json(array('errors' => 'Salah satu barang kamu, mungkin sudah tidak tersedia!'));
                        break;
                    }
                }

                if ($this->total_price <= $this->user->credit) {
                    if ($this->total_price >= 50000000) {
                        try {
                            DB::transaction(function () {
                                $now = Carbon::now();
                                $transaction_id = DB::table('transactions')->insertGetId(['user_id' => $this->user->id, 'total' => $this->total_price, 'created_at' => $now, 'updated_at' => $now]);
                                foreach ($this->items_id as $index => $item_id) {
                                    DB::table('transaction_details')->insert([
                                        'transaction_id' => $transaction_id,
                                        'item_id' => $this->item[$item_id]->id,
                                        'qty' => $this->qty[$index],
                                        'price' => ($this->item[$item_id]->price_after_discount != '' || $this->item[$item_id]->price_after_discount != null || $this->item[$item_id]->price_after_discount != 0) ? $this->item[$item_id]->price_after_discount : $this->item[$item_id]->normal_price,
                                        'created_at' => $now,
                                        'updated_at' => $now
                                    ]);

                                    if (empty($this->data_per_vendor[$this->item[$item_id]->vendor_id])) {
                                        $this->data_per_vendor[$this->item[$item_id]->vendor_id] = [];
                                        $this->data_per_vendor[$this->item[$item_id]->vendor_id]['total'] = 0;
                                    }

                                    $this->data_per_vendor[$this->item[$item_id]->vendor_id]['vendor_id'] = $this->item[$item_id]->vendor_id;
                                    $this->data_per_vendor[$this->item[$item_id]->vendor_id]['total'] += $this->price[$item_id];
                                }

                                foreach ($this->data_per_vendor as $per_vendor) {
                                    $transaction_vendor_id = DB::table('transaction_vendors')->insertGetId([
                                        'transaction_id' => $transaction_id,
                                        'vendor_id' => $per_vendor['vendor_id'],
                                        'total' => $per_vendor['total'],
                                        'status' => 1,
                                        'created_at' => $now,
                                        'updated_at' => $now
                                    ]);
                                    $this->data_per_vendor[$per_vendor['vendor_id']]['transaction_vendor_id'] = $transaction_vendor_id;
                                }

                                foreach ($this->items_id as $index => $item_id) {
                                    DB::table('transaction_vendor_details')->insert([
                                        'transaction_vendor_id' => $this->data_per_vendor[$this->item[$item_id]->vendor_id]['transaction_vendor_id'],
                                        'item_id' => $this->item[$item_id]->id,
                                        'qty' => $this->qty[$index],
                                        'price' => ($this->item[$item_id]->price_after_discount != '' || $this->item[$item_id]->price_after_discount != null || $this->item[$item_id]->price_after_discount != 0) ? $this->item[$item_id]->price_after_discount : $this->item[$item_id]->normal_price,
                                        'created_at' => $now,
                                        'updated_at' => $now
                                    ]);

                                    if ($this->qty[$index] <= $this->item[$item_id]->qty) {
                                        DB::table('items')->where('id', $this->item[$item_id]->id)->update([
                                            'qty' => ($this->item[$item_id]->qty -= $this->qty[$index]),
                                            'updated_at' => $now
                                        ]);
                                    }
                                }

                                DB::table('users')->where('id', $this->user->id)->update([
                                    'credit' => ($this->user->credit -= $this->total_price),
                                    'updated_at' => $now
                                ]);

                                DB::table('carts')->where('user_id', $this->user->id)->delete();

                                $random_name = Helper::getInvoiceRandomName();
                                $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'defaultFont' => 'sans-serif'])
                                    ->loadView('pages.shop.invoice.invoice', [
                                        'user' => $this->user,
                                        'item' => $this->item,
                                        'items_id' => $this->items_id,
                                        'qty' => $this->qty,
                                        'price' => $this->price,
                                        'total_price' => $this->total_price
                                    ])
                                    ->save(Config::get('constants')['UPLOAD_PATH'] . "invoice/$random_name.pdf");

                                Mail::send('pages.shop.invoice.mail', [
                                    'user' => $this->user,
                                    'item' => $this->item,
                                    'items_id' => $this->items_id
                                ], function ($message) use ($random_name) {
                                    $message->from(Config::get('constants')['MAIL_USERNAME'], Config::get('constants')['MAIL_INITIAL'])
                                        ->to($this->user->email)
                                        ->subject('Invoice')
                                        ->attach(Config::get('constants')['UPLOAD_PATH'] . "invoice/$random_name.pdf");
                                });
                            });
                            return response()->json(array('success' => 'Permintaan Anda sedang dikirimkan!', 'html' => view('pages.shop.success')->render(), 'credit' => $this->user->credit));
                        } catch (Exception $e) {
                            return response()->json(array('errors' => 'Maaf ada kesalahan saat checkout!'));
                        }
                    } else {
                        return response()->json(array('errors' => 'Maaf Anda belum mencukupi minimum pembelanjaan!'));
                    }
                } else {
                    return response()->json(array('errors' => 'Maaf Credit Anda tidak mencukupi!'));
                }
            } else {
                return response()->json(array('errors' => 'Cart Anda kosong, Silahkan add terlebih dahulu di Shop!'));
            }
        } else {
            return response()->json(array('errors' => 'Silahkan login terlebih dahulu!'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
