<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

use App\Helpers\Helper;

use App\Models\Admin\Item;

use App\Models\User\Cart;
use App\Models\User\TransactionVendor;

use Session;
use Validator;

class VendorDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        if (Auth::check()) {
            if (Auth::user()->is_vendor) {
                $rules = ['qty' => 'required|numeric'];

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
                } else {
                    $item = Item::findOrFail($id);
                    $item->qty = $request->qty;
                    $item->save();

                    return response()->json($item);
                }
            }
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
        if (Auth::check()) {
            if (Auth::user()->is_vendor) {
                $item = Item::findOrFail($id);

                $image_path1 = str_replace(Config::get('constants')['LINK_PATH'], Config::get('constants')['UPLOAD_PATH'], $item->image1);
                $image_path2 = str_replace(Config::get('constants')['LINK_PATH'], Config::get('constants')['UPLOAD_PATH'], $item->image2);
                $image_path3 = str_replace(Config::get('constants')['LINK_PATH'], Config::get('constants')['UPLOAD_PATH'], $item->image3);
                $image_path4 = str_replace(Config::get('constants')['LINK_PATH'], Config::get('constants')['UPLOAD_PATH'], $item->image4);

                if (file_exists($image_path1)) {
                    unlink($image_path1);
                }
                if (file_exists($image_path2)) {
                    unlink($image_path2);
                }
                if (file_exists($image_path3)) {
                    unlink($image_path3);
                }
                if (file_exists($image_path4)) {
                    unlink($image_path4);
                }

                $item->delete();
                return response()->json($item);
            }
        }
    }

    public function orderDetail($id)
    {
        $transaction_vendor = TransactionVendor::where('id', $id)->firstOrFail();
        return response()->json(['transaction_vendor' => $transaction_vendor->load('transaction')->load('transaction_vendor_details'), 'transaction_vendor_details' => $transaction_vendor->transaction_vendor_details->load('item'), 'user' => $transaction_vendor->transaction->user]);
    }

    public function updateOrderStatus(Request $request, $id)
    {
        if (Auth::check()) {
            if (Auth::user()->is_vendor) {
                $rules = ['status' => 'required|numeric'];

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
                } else {
                    $transaction = TransactionVendor::findOrFail($id);
                    $transaction->status = $request->status;
                    $transaction->save();

                    return response()->json($transaction);
                }
            }
        }
    }
}
