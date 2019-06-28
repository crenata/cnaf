<?php

namespace App\Http\Controllers;

use App\Models\Admin\CarBrand;
use App\Models\Admin\CarType;
use Illuminate\Http\Request;

use App\Helpers\Helper;

use App\Models\Admin\Vendor;
use App\Models\Admin\Brand;
use App\Models\Admin\Item;
use App\Models\Admin\Blog;

use App\Models\Admin\CarRegion;

use Session;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->limit(3)->get();
        $carregions = CarRegion::orderBy('name', 'asc')->get();
        return view('pages.home')->withBlogs($blogs)->withCarRegions($carregions);
    }

    public function tentangkami() {
        return view('pages.tentangkami');
    }

    public function articles() {
        $blogs = Blog::orderBy('id', 'desc')->paginate(7);
        return view('pages.articles')->withBlogs($blogs);
    }

    public function faq() {
        return view('pages.faq');
    }

    public function privacypolicy() {
        return view('pages.privacypolicy');
    }

    public function termsandcondition() {
        return view('pages.termsandcondition');
    }

    public function simulasi() {
        $vendors = Vendor::orderBy('name', 'asc')->get();
        return view('pages.simulasi')->withVendors($vendors);
    }

    public function shop() {
        $vendors = Vendor::orderBy('id', 'desc')->paginate(7);
        return view('pages.shop.home')->withVendors($vendors);
    }

    public function shopVendorDetails($slug) {
        $vendor = Vendor::where('slug', $slug)->firstOrFail();
        $brands = Brand::where('vendor_id', $vendor->id)->orderBy('id', 'desc')->paginate(7);

        return view('pages.shop.vendordetails')->withVendor($vendor)->withBrands($brands);
    }

    public function products($slug, $slugbrand) {
        $vendors = Vendor::orderBy('id', 'desc')->get();
        $currentvendor = Vendor::where('slug', $slug)->firstOrFail();
        $currentbrand = Brand::where('slug', $slugbrand)->firstOrFail();

        if ($currentbrand->vendor_id == $currentvendor->id) {
            $items = Item::where('brand_id', $currentbrand->id)->orderBy('id', 'desc')->paginate(15);

            return view('pages.shop.product.productlist')->withVendors($vendors)->withCurrentVendor($currentvendor)->withCurrentBrand($currentbrand)->withItems($items);
        } else {
            return abort(404);
        }
    }

    public function itemDetail($slug, $slugbrand, $slugitem) {
        $vendors = Vendor::orderBy('id', 'desc')->get();
        $currentvendor = Vendor::where('slug', $slug)->firstOrFail();
        $currentbrand = Brand::where('slug', $slugbrand)->firstOrFail();
        $currentitem = Item::where('slug', $slugitem)->firstOrFail();

        if ($currentbrand->vendor_id == $currentvendor->id) {
            if ($currentitem->brand_id == $currentbrand->id) {
                return view('pages.shop.product.itemdetail')->withVendors($vendors)->withCurrentVendor($currentvendor)->withCurrentBrand($currentbrand)->withItem($currentitem);
            } else {
                return abort(404);
            }
        } else {
            return abort(404);
        }
    }

    public function carBrandByCarRegion($id) {
        $carbrand = CarBrand::where('car_region_id', $id)->get();
        return response()->json($carbrand);
    }

    public function carTypeByCarBrand($id) {
        $cartype = CarType::where('car_brand_id', $id)->get();
        return response()->json($cartype);
    }
}
