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

class CartController extends Controller
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
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();
        return view('pages.shop.cart')->withCarts($carts);
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
        $user = Auth::user();
        $item = Item::findOrFail($request->item_id);

        if ($request->qty <= $item->qty) {
            $validator = Validator::make($request->all(), $this->rules);

            if ($validator->fails()) {
                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            } else {
                $cart = new Cart;

                $cart->user_id = $user->id;
                $cart->item_id = $request->item_id;
                $cart->qty = $request->qty;

                $cart->save();

                return response()->json($cart->load('user')->load('item'));
            }
        } else {
            return response()->json(array('errors' => 'Periksa kembali qty yang Anda masukkan, pastikan tidak melebihi stock yang tersedia!'));
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
        $user = Auth::user();

        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $cart = Cart::findOrFail($id);

            $cart->user_id = $user->id;
            $cart->item_id = $request->item_id;
            $cart->qty = $request->qty;

            $cart->save();

            return response()->json($cart->load('user')->load('item'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return response()->json($cart);
    }
}
