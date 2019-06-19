<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\Helper;

use App\Models\Admin\Vendor;

use Session;
use Validator;

class VendorController extends Controller
{
    protected $rules = [
        'name' => 'required',
        'phone' => 'required|numeric'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('admin.pages.vendor.index')->withVendors($vendors);
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
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $vendor = new Vendor;

            $vendor->name = $request->name;
            $vendor->slug = str_slug($request->name, '-');
            $vendor->phone = $request->phone;

            if ($request->hasFile('image')) {
                $vendor->image = Helper::interventionUploadImage($request->file('image'), null, 'vendors');
            }
            if ($request->hasFile('image_logo')) {
                $vendor->image_logo = Helper::interventionUploadImage($request->file('image_logo'), null, 'vendors');
            }
            
            $vendor->save();
            
            return response()->json($vendor);
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
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $vendor = Vendor::findOrFail($id);

            $vendor->name = $request->name;
            $vendor->slug = str_slug($request->name, '-');
            $vendor->phone = $request->phone;

            if ($request->hasFile('image')) {
                $image_path = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $vendor->image);

                if (file_exists($image_path)) {
                    unlink($image_path);
                }
                $vendor->image = Helper::interventionUploadImage($request->file('image'), null, 'vendors');
            }
            if ($request->hasFile('image_logo')) {
                $image_logo_path = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $vendor->image_logo);

                if (file_exists($image_logo_path)) {
                    unlink($image_logo_path);
                }
                $vendor->image_logo = Helper::interventionUploadImage($request->file('image_logo'), null, 'vendors');
            }
            
            $vendor->save();
            
            return response()->json($vendor);
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
        $vendor = Vendor::findOrFail($id);

        $image_path = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $vendor->image);
        $image_logo_path = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $vendor->image_logo);
        
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        if (file_exists($image_logo_path)) {
            unlink($image_logo_path);
        }

        foreach ($vendor->brands as $brand) {
            $brand_image_path = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $brand->image);

            if (file_exists($brand_image_path)) {
                unlink($brand_image_path);
            }

            foreach ($brand->items as $item) {
                $item_image1 = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $item->image1);
                $item_image2 = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $item->image2);
                $item_image3 = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $item->image3);
                $item_image4 = str_replace(env('LINK_PATH'), env('UPLOAD_PATH'), $item->image4);

                if (file_exists($item_image1)) {
                    unlink($item_image1);
                }
                if (file_exists($item_image2)) {
                    unlink($item_image2);
                }
                if (file_exists($item_image3)) {
                    unlink($item_image3);
                }
                if (file_exists($item_image4)) {
                    unlink($item_image4);
                }

                $item->delete();
            }

            $brand->delete();
        }
        
        $vendor->delete();
        return response()->json($vendor);
    }
}
