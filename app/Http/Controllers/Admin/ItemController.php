<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\Helper;

use App\Models\Admin\Vendor;
use App\Models\Admin\Brand;
use App\Models\Admin\Item;

use Session;
use Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();
        $brands = Brand::all();
        $items = Item::all();
        return view('admin.pages.item.index')->withVendors($vendors)->withBrands($brands)->withItems($items);
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
        $rules = [
            'name' => 'required',
            'normal_price' => 'required|numeric',
            'qty' => 'required|numeric',
            'vendor_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'image1' => 'required|image',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $item = new Item;

            $item->name = $request->name;
            $item->slug = str_slug($request->name, '-');
            $item->qty = $request->qty;
            $item->normal_price = $request->normal_price;
            $item->price_after_discount = $request->price_after_discount;
            $item->vendor_id = $request->vendor_id;
            $item->brand_id = $request->brand_id;

            if ($request->hasFile('image1')) {
                $item->image1 = Helper::interventionUploadImage($request->file('image1'), null, 'items');
            }
            if ($request->hasFile('image2')) {
                $item->image2 = Helper::interventionUploadImage($request->file('image2'), null, 'items');
            }
            if ($request->hasFile('image3')) {
                $item->image3 = Helper::interventionUploadImage($request->file('image3'), null, 'items');
            }
            if ($request->hasFile('image4')) {
                $item->image4 = Helper::interventionUploadImage($request->file('image4'), null, 'items');
            }

            $item->description = $request->description;
            
            $item->save();
            
            return response()->json($item->load('brand')->load('vendor'));
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
        $rules = [
            'name' => 'required',
            'normal_price' => 'required|numeric',
            'qty' => 'required|numeric',
            'vendor_id' => 'required|numeric',
            'brand_id' => 'required|numeric'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $item = Item::findOrFail($id);

            $item->name = $request->name;
            $item->slug = str_slug($request->name, '-');
            $item->qty = $request->qty;
            $item->normal_price = $request->normal_price;
            $item->price_after_discount = $request->price_after_discount;
            $item->vendor_id = $request->vendor_id;
            $item->brand_id = $request->brand_id;

            if ($request->hasFile('image1')) {
                $image_path1 = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $item->image1);

                if (file_exists($image_path1)) {
                    unlink($image_path1);
                }
                $item->image1 = Helper::interventionUploadImage($request->file('image1'), null, 'items');
            }
            if ($request->hasFile('image2')) {
                $image_path2 = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $item->image2);

                if (file_exists($image_path2)) {
                    unlink($image_path2);
                }
                $item->image2 = Helper::interventionUploadImage($request->file('image2'), null, 'items');
            }
            if ($request->hasFile('image3')) {
                $image_path3 = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $item->image3);

                if (file_exists($image_path3)) {
                    unlink($image_path3);
                }
                $item->image3 = Helper::interventionUploadImage($request->file('image3'), null, 'items');
            }
            if ($request->hasFile('image4')) {
                $image_path4 = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $item->image4);

                if (file_exists($image_path4)) {
                    unlink($image_path4);
                }
                $item->image4 = Helper::interventionUploadImage($request->file('image4'), null, 'items');
            }

            $item->description = $request->description;
            
            $item->save();
            
            return response()->json($item->load('brand')->load('vendor'));
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
        $item = Item::findOrFail($id);

        $image_path1 = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $item->image1);
        $image_path2 = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $item->image2);
        $image_path3 = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $item->image3);
        $image_path4 = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $item->image4);
        
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

    public function brandByVendor($id) {
        $brand = Brand::where('vendor_id', $id)->get();
        return response()->json($brand);
    }
}
