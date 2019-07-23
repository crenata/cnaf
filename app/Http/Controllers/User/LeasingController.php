<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

use Session;
use Validator;


class LeasingController extends Controller
{
    private $leasing_code = '', $request, $leasing_id;
    public function start(Request $request)
    {
        $this->request = $request;
        try {
            DB::transaction(function () {
                $now = Carbon::now();
                $car_region = CarRegion::findOrFail($this->request->wilayah_id);
                $car_brand = CarBrand::findOrFail($this->request->merk_id);
                $car_type = CarType::findOrFail($this->request->type_id);
                $car_model = CarModel::findOrFail($this->request->model_id);
                $car_year = CarYear::findOrFail($this->request->year_id);
                $tenor = FlatRate::findOrFail($this->request->tenor_id);

                $leasing_id = DB::table('leasings')->insertGetId([
//                    'user_id' => (Auth::check()) ? Auth::user()->id : '',
                    'leasing_value' => $car_year->price,
                    'max_value' => ($car_year->price * 80 / 100),
                    'total_loan' => $this->request->ajukan_pinjaman,
                    'car_brand' => $car_region->name,
                    'car_model' => $car_model->name,
                    'car_type' => $car_type->name,
                    'car_year' => $car_year->name,
                    'car_brand_id' => $this->request->merk_id,
                    'car_model_id' => $this->request->model_id,
                    'car_type_id' => $this->request->type_id,
                    'car_year_id' => $this->request->year_id,
                    'car_region_id' => $this->request->wilayah_id,
                    'tenor' => $tenor->tenor,
                    'assurance' => 120000,
                    'rate' => $tenor->rate,
                    'admin_fee' => $car_region->admin_fee,
                    'provisi' => 100000,
                    'polis' => $car_region->polis_fee,
                    'disbursement' => 1000000,
                    'total_ph' => 200000,
                    'cicilan_perbulan' => 100000,
                    'created_at' => $now,
                    'updated_at' => $now
                ]);

                $this->leasing_id = $leasing_id;

                $this->leasing_code = uniqid($leasing_id . '-' . date('Ymd') . md5(uniqid(rand(), true)));
                DB::table('leasings')->where('id', $leasing_id)->update([
                    'leasing_code' => $this->leasing_code
                ]);
            });
            return redirect()->route('apply', [1, $this->leasing_code]);
        } catch (Exception $e) {
            return abort(500);
        }
    }

    public function apply(Request $request, $step, $code)
    {
        $this->request = $request;
        $leasing = Leasing::where('leasing_code', $code)->firstOrFail();
        $this->leasing_id = $leasing->id;
        if ($step == 1) {
            return view('pages.apply.step1')->withLeasing($leasing)->withCode($code);
        } else if ($step == 2) {
            try {
                DB::transaction(function () {
                    $now = Carbon::now();
                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'ktp_type' => $this->request->ktp_type,
                        'ktp_picture' => Helper::interventionUploadImage($this->request->file('ktp_picture'), null, 'leasings/ktp'),
                        'selfie_picture' => Helper::interventionUploadImage($this->request->file('selfie_picture'), null, 'leasings/selfie'),
                        'updated_at' => $now
                    ]);
                });

                $leasing_up = Leasing::where('leasing_code', $code)->firstOrFail();

                if ($leasing_up->ktp_picture != null && $leasing_up->selfie_picture != null && $leasing_up->ktp_type != null) {
                    return view('pages.apply.step2')->withLeasing($leasing)->withCode($code);
                } else {
                    return redirect()->route('apply', [1, $code]);
                }
            } catch (Exception $e) {
                return abort(500);
            }
        } else if ($step == 3) {
            return 3;
        }
    }


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
