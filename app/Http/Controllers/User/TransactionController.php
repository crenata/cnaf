<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Helpers\Helper;

use App\Models\User\Cart;
use App\Models\Admin\Item;

use Session;
use Validator;

class TransactionController extends Controller
{
    protected $rules = [
        'item_id' => 'required|numeric',
        'qty' => 'required|numeric',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();
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
        $user = Auth::user();
        $item = [];
        $price = [];
        $total_price = 0;

        $items_id = json_decode($request->items_id, true);
        $qty = json_decode($request->qty, true);

        if (Auth::check()) {
            foreach ($items_id as $index => $item_id) {
                $item[$item_id] = Item::findOrFail($item_id);
                if ($item[$item_id]->count() > 0 || $item[$item_id] != 0 || $item[$item_id] != null) {
                    if ($item[$item_id]->price_after_discount != '' || $item[$item_id]->price_after_discount != null || $item[$item_id]->price_after_discount != 0) {
                        $price[$item_id] = ((float) $item[$item_id]->price_after_discount) * ((float) $qty[$index]);
                        $total_price += $price[$item_id];
                    } else {
                        $price[$item_id] = ((float) $item[$item_id]->normal_price) * ((float) $qty[$index]);
                        $total_price += $price[$item_id];
                    }
                } else {
                    break;
                    /* Complete code this, this program haven't stable */
                }
            }
        } else {
            return response()->json(array('errors' => 'Silahkan login terlebih dahulu!'));
        }

        return $total_price; /* Please to finishing return */
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
