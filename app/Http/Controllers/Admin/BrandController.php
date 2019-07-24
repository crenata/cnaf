<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

use App\Helpers\Helper;

use App\Models\Admin\Vendor;
use App\Models\Admin\Brand;

use Session;
use Validator;

class BrandController extends Controller
{
    protected $rules = [
        'name' => 'required',
        'vendor_id' => 'required|numeric'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();
        $brands = Brand::all();
        return view('admin.pages.brand.index')->withVendors($vendors)->withBrands($brands);
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
            $brand = new Brand;

            $brand->name = $request->name;
            $brand->slug = str_slug($request->name, '-');

            if ($request->hasFile('image')) {
                $brand->image = Helper::interventionUploadImage($request->file('image'), null, 'brands');
            }

            $brand->vendor_id = $request->vendor_id;
            
            $brand->save();
            
            return response()->json($brand->load('vendor'));
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
            $brand = Brand::findOrFail($id);

            $brand->name = $request->name;
            $brand->slug = str_slug($request->name, '-');

            if ($request->hasFile('image')) {
                $image_path = str_replace(Config::get('constants')['LINK_PATH'], Config::get('constants')['UPLOAD_PATH'], $brand->image);

                if (file_exists($image_path)) {
                    unlink($image_path);
                }
                $brand->image = Helper::interventionUploadImage($request->file('image'), null, 'brands');
            }

            $brand->vendor_id = $request->vendor_id;
            
            $brand->save();
            
            return response()->json($brand->load('vendor'));
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
        $brand = Brand::findOrFail($id);

        $image_path = str_replace(Config::get('constants')['LINK_PATH'], Config::get('constants')['UPLOAD_PATH'], $brand->image);
        
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        foreach ($brand->items as $item) {
            $item_image1 = str_replace(Config::get('constants')['LINK_PATH'], Config::get('constants')['UPLOAD_PATH'], $item->image1);
            $item_image2 = str_replace(Config::get('constants')['LINK_PATH'], Config::get('constants')['UPLOAD_PATH'], $item->image2);
            $item_image3 = str_replace(Config::get('constants')['LINK_PATH'], Config::get('constants')['UPLOAD_PATH'], $item->image3);
            $item_image4 = str_replace(Config::get('constants')['LINK_PATH'], Config::get('constants')['UPLOAD_PATH'], $item->image4);

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
        return response()->json($brand);
    }
}
