<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper;

use App\Models\Admin\Vendor;
use App\Models\Admin\Brand;
use App\Models\Admin\Item;
use App\Models\Admin\Blog;

use App\Models\Admin\CarRegion;
use App\Models\Admin\CarBrand;
use App\Models\Admin\CarType;
use App\Models\Admin\CarModel;
use App\Models\Admin\CarYear;
use App\Models\Admin\FlatRate;
use App\Models\Admin\AssuranceType;
use App\Models\Admin\AssuranceRate;

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
        $carregions = CarRegion::orderBy('name', 'asc')->get();
        return view('pages.simulasi')->withVendors($vendors)->withCarRegions($carregions)->withCarBrands(null)->withCurrentRegion(null)->withCurrentBrand(null)->withCurrentType(null);
    }

    public function simulasiFromHome(Request $request) {
        $vendors = Vendor::orderBy('name', 'asc')->get();
        $carregions = CarRegion::orderBy('name', 'asc')->get();

        $current_region = $request->car_region_id;

        if ($current_region != null || $current_region != 0) {
            $carbrands = CarBrand::where('car_region_id', $current_region)->orderBy('name', 'asc')->get();
        } else {
            $carbrands = null;
        }

        $current_brand = $request->car_brand_id;

        if ($current_brand != null || $current_brand != 0) {
            $cartypes = CarType::where('car_brand_id', $current_brand)->orderBy('name', 'asc')->get();
        } else {
            $cartypes = null;
        }

        $current_type = $request->car_type_id;

        if ($current_type != null || $current_type != 0) {
            $carmodels = CarModel::where('car_type_id', $current_type)->orderBy('name', 'asc')->get();
        } else {
            $carmodels = null;
        }

        return view('pages.simulasi')->withVendors($vendors)->withCarRegions($carregions)->withCarBrands($carbrands)->withCarTypes($cartypes)->withCarModels($carmodels)->withCurrentRegion($current_region)->withCurrentBrand($current_brand)->withCurrentType($current_type);
    }

    public function shop() {
        $vendors = Vendor::paginate(7);
//        $vendors = Vendor::orderBy('id', 'desc')->paginate(7);
        return view('pages.shop.home')->withVendors($vendors);
    }

    public function shopVendorDetails($slug) {
        $vendor = Vendor::where('slug', $slug)->firstOrFail();
        $brands = Brand::where('vendor_id', $vendor->id)->paginate(7);
//        $brands = Brand::where('vendor_id', $vendor->id)->orderBy('id', 'desc')->paginate(7);

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
        $carbrands = CarBrand::where('car_region_id', $id)->get();
        return response()->json($carbrands);
    }

    public function carTypeByCarBrand($id) {
        $cartypes = CarType::where('car_brand_id', $id)->get();
        return response()->json($cartypes);
    }

    public function carModelByCarType($id) {
        $carmodels = CarModel::where('car_type_id', $id)->get();
        return response()->json($carmodels);
    }

    public function carYearByCarModel($id) {
        $caryears = CarYear::where('car_model_id', $id)->get();
        return response()->json($caryears);
    }

    public function flatRateByCarRegion($id) {
        $flatrates = FlatRate::where('car_region_id', $id)->get();
        return response()->json($flatrates);
    }

    public function getAssuranceType() {
        $assurancetypes = AssuranceType::orderBy('name', 'asc')->get();
        return response()->json($assurancetypes);
    }

    public function assuranceRateByCarRegionAndAssuranceType($id, $assurancetypeid) {
        $assurances = AssuranceRate::where([
            ['car_region_id', $id],
            ['assurance_type_id', $assurancetypeid]
        ])->orderBy('id', 'desc')->get();
        return response()->json($assurances);
    }

    public function cart() {
        return view('pages.shop.cart');
    }

    public function maps() {
        return view('pages.testing.maps');
    }

    public function invoice() {
        return view('pages.testing.invoice');
    }
}
