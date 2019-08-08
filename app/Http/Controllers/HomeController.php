<?php

namespace App\Http\Controllers;

use App\Models\User\TransactionVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

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

use App\Models\User\Transaction;
use App\Models\User\Leasing;

use App\Http\Controllers\ai\advance\ApiClientFile;
use App\Http\Controllers\ai\advance\CurlClient;

use Session;
use Validator;

use PDF;

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
        $vendors = Vendor::orderBy('name', 'asc')->get();
        return view('pages.home')->withBlogs($blogs)->withCarRegions($carregions)->withVendors($vendors);
    }

    public function account() {
        $user = Auth::user();
        if (!$user->is_vendor) {
            $transactions = Transaction::where('user_id', $user->id)->get();
            $leasings = Leasing::where('user_id', $user->id)->get();
            return view('pages.user.account')->withTransactions($transactions)->withLeasings($leasings);
        } else {
            return abort(403);
        }
    }

    public function accountVendor() {
        $user = Auth::user();
        if ($user->is_vendor) {
            // $transactions = TransactionVendor::where('vendor_id', $user->is_vendor)->get();
            $transactions = TransactionVendor::where('vendor_id', $user->vendor_id)->get();
            $items = Item::where('vendor_id', $user->vendor_id)->get();
            $leasings = Leasing::where('user_id', $user->id)->get();
            return view('pages.user.vendor.dashboard')->withTransactions($transactions)->withItems($items)->withLeasings($leasings);
        } else {
            return abort(403);
        }
    }

    public function tentangkami() {
        return view('pages.tentangkami');
    }

    public function articles() {
        $blogs = Blog::orderBy('id', 'desc')->paginate(7);
        $new_blogs = Blog::orderBy('id', 'desc')->limit(5)->get();
        $populars = Blog::popularDay()->get();
        return view('pages.articles')->withBlogs($blogs)->withNewBlogs($new_blogs)->withPopulars($populars);
    }

    public function showArticle($slug) {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $new_blogs = Blog::orderBy('id', 'desc')->limit(5)->get();
        $populars = Blog::popularDay()->get();
        return view('pages.showarticle')->withBlog($blog)->withNewBlogs($new_blogs)->withPopulars($populars);
    }

    public function contact() {
        return view('pages.contact');
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
        if (Auth::check()) {
            if (Auth::user()->is_vendor) {
                return abort(403);
            } else {
                return view('pages.simulasi')->withVendors($vendors)->withCarRegions($carregions)->withCarBrands(null)->withCurrentRegion(null)->withCurrentBrand(null)->withCurrentType(null);
            }
        } else {
            return view('pages.simulasi')->withVendors($vendors)->withCarRegions($carregions)->withCarBrands(null)->withCurrentRegion(null)->withCurrentBrand(null)->withCurrentType(null);
        }
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

        if (Auth::check()) {
            if (Auth::user()->is_vendor) {
                return abort(403);
            } else {
                return view('pages.simulasi')->withVendors($vendors)->withCarRegions($carregions)->withCarBrands($carbrands)->withCarTypes($cartypes)->withCarModels($carmodels)->withCurrentRegion($current_region)->withCurrentBrand($current_brand)->withCurrentType($current_type);
            }
        } else {
            return view('pages.simulasi')->withVendors($vendors)->withCarRegions($carregions)->withCarBrands($carbrands)->withCarTypes($cartypes)->withCarModels($carmodels)->withCurrentRegion($current_region)->withCurrentBrand($current_brand)->withCurrentType($current_type);
        }
    }

    public function shop() {
        $vendors = Vendor::paginate(7);
//        $vendors = Vendor::orderBy('id', 'desc')->paginate(7);
        return view('pages.shop.home')->withVendors($vendors);
    }

    public function shopLogin() {
        return view('pages.shop.login');
    }

    public function howToShop() {
        return view('pages.shop.howtoshop');
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

    public function priceterbilang() {
        return view('pages.testing.priceterbilang');
    }

    public function invoice() {
        $random_name = Helper::getInvoiceRandomName();
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'defaultFont' => 'sans-serif'])
            ->loadView('pages.testing.invoice')
            ->save(Config::get('constants')['UPLOAD_PATH'] . "invoice/$random_name.pdf");

        Mail::send('pages.testing.mail', [], function ($message) use ($random_name) {
            $message->from('havea.crenata@gmail.com', 'Scranaver Plediagester')
                ->to('hafiizh.ghulam@gmail.com')
                ->subject('Invoice')
                ->attach(Config::get('constants')['UPLOAD_PATH'] . "invoice/$random_name.pdf");
        });

        return $pdf->stream();
//        return $pdf->download('invoice.pdf');
    }

    public function ocr() {
        $client = new CurlClient(Config::get('constants')['ADVANCE_AI_HOST'], Config::get('constants')['ADVANCE_AI_API_KEY'], Config::get('constants')['ADVANCE_AI_SECRET_KEY']);
        $result = $client->request(Config::get('constants')['ADVANCE_AI_OCR_KTP_CHECK'], null, array(
            'ocrImage' => "/home/degadai-dev/Downloads/ktp.jpeg"
        ));

        return response($result);
    }
}
