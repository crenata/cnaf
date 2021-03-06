<?php

namespace App\Http\Controllers\User;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

use App\Helpers\Helper;

use App\User;

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


class LeasingController extends Controller
{
    private $leasing_code = '', $request, $leasing_id, $user, $user_duplicate = false, $generate_password;
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
                    'user_id' => ((Auth::check()) ? Auth::user()->id : null),
                    'leasing_value' => $car_year->price,
                    'max_value' => ($car_year->price * 80 / 100),
                    'total_loan' => str_replace(',', '', $this->request->ajukan_pinjaman),
                    'car_brand' => $car_brand->name,
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
            if ($leasing->ktp_type == null || $leasing->ktp_type == '') {
                $this->validate($request, [
                    'ktp_type' => 'required'
                ]);
            }

            if ($leasing->ktp_picture == null || $leasing->ktp_picture == '') {
                $this->validate($request, [
                    'ktp_picture' => 'required|image'
                ]);
            }

            if ($leasing->selfie_picture == null || $leasing->selfie_picture == '') {
                $this->validate($request, [
                    'selfie_picture' => 'required|image',
                ]);
            }

            try {
                DB::transaction(function () {
                    $now = Carbon::now();

                    if ($this->request->ktp_type != null || $this->request->ktp_type != '' || $this->request->ktp_type > 0) {
                        DB::table('leasings')->where('id', $this->leasing_id)->update([
                            'ktp_type' => $this->request->ktp_type,
                            'updated_at' => $now
                        ]);
                    }

                    if ($this->request->hasFile('ktp_picture')) {
                        $ktp_url = Helper::interventionUploadImage($this->request->file('ktp_picture'), null, 'leasings/ktp');

                        DB::table('leasings')->where('id', $this->leasing_id)->update([
                            'ktp_picture' => $ktp_url,
                            'updated_at' => $now
                        ]);

                        if ($this->request->ktp_type == 'EKTP' && $this->request->hasFile('ktp_picture')) {
                            $client = new CurlClient(Config::get('constants')['ADVANCE_AI_HOST'], Config::get('constants')['ADVANCE_AI_API_KEY'], Config::get('constants')['ADVANCE_AI_SECRET_KEY']);
                            $ocr = $client->request(Config::get('constants')['ADVANCE_AI_OCR_KTP_CHECK'], null, array(
                                'ocrImage' => str_replace(Config::get('constants')['LINK_PATH'], Config::get('constants')['UPLOAD_PATH'], $ktp_url)
                            ));

                            $result = json_decode($ocr);

                            if ($result->code == 'SUCCESS') {
                                DB::table('leasings')->where('id', $this->leasing_id)->update([
                                    'name' => $result->data->name,
                                    'address' => $result->data->address,
                                    'ktp' => $result->data->idNumber,
                                    'ktp_ocr_number' => $result->data->idNumber,
                                    'ktp_ocr_name' => $result->data->name,
                                    'ktp_ocr_dob' => date('Y-m-d', strtotime(strrev(substr(strrev($result->data->birthPlaceBirthday), 0, 10)))),
                                    'updated_at' => $now
                                ]);
                            }
                        }
                    }

                    if ($this->request->hasFile('selfie_picture')) {
                        DB::table('leasings')->where('id', $this->leasing_id)->update([
                            'selfie_picture' => Helper::interventionUploadImage($this->request->file('selfie_picture'), null, 'leasings/selfie'),
                            'updated_at' => $now
                        ]);
                    }
                });

                $leasing_up = Leasing::where('leasing_code', $code)->firstOrFail();

                if ($leasing_up->ktp_picture != null && $leasing_up->selfie_picture != null && $leasing_up->ktp_type != null) {
                    return view('pages.apply.step2')->withLeasing($leasing_up)->withCode($code);
                } else {
                    return redirect()->route('apply', [1, $code]);
                }
            } catch (Exception $e) {
                return abort(500);
            }
        } else if ($step == 3) {
            if ($this->request->email != null || $this->request->email != '') {
                $users = User::where('email', $this->request->email)->get();
                if (count($users) > 0 || count($users) != null || count($users) != 0) {
                    return back()->with('error_email', 'This email already registered, Please login first!');
                }
            }

            if ($leasing->name == null || $leasing->name == '') {
                $this->validate($request, [
                    'name' => 'required'
                ]);
            }

            if ($leasing->email == null || $leasing->email == '') {
                $this->validate($request, [
                    'email' => 'email'
                ]);
            }

            if ($leasing->address == null || $leasing->address == '') {
                $this->validate($request, [
                    'address' => 'required',
                ]);
            }

            if ($leasing->npwp == null || $leasing->npwp == '') {
                $this->validate($request, [
                    'npwp' => 'required|numeric',
                ]);
            }

            if ($leasing->ktp_ocr_dob == null || $leasing->ktp_ocr_dob == '') {
                $this->validate($request, [
                    'ktp_ocr_dob' => 'required|date',
                ]);
            }

            if ($leasing->phone == null || $leasing->phone == '') {
                $this->validate($request, [
                    'phone' => 'required|numeric|min:10',
                ]);
            }

            if ($leasing->ktp == null || $leasing->ktp == '') {
                $this->validate($request, [
                    'ktp' => 'required|numeric|min:10',
                ]);
            }

            try {
                DB::transaction(function () {
                    $now = Carbon::now();

                    if ($this->request->name != null || $this->request->name != '') {
                        DB::table('leasings')->where('id', $this->leasing_id)->update([
                            'name' => $this->request->name,
                            'updated_at' => $now
                        ]);
                    }

                    if ($this->request->email != null || $this->request->email != '') {
                        DB::table('leasings')->where('id', $this->leasing_id)->update([
                            'email' => $this->request->email,
                            'updated_at' => $now
                        ]);
                    }

                    if ($this->request->address != null || $this->request->address != '') {
                        DB::table('leasings')->where('id', $this->leasing_id)->update([
                            'address' => $this->request->address,
                            'updated_at' => $now
                        ]);
                    }

                    if ($this->request->npwp != null || $this->request->npwp != '') {
                        DB::table('leasings')->where('id', $this->leasing_id)->update([
                            'npwp' => $this->request->npwp,
                            'updated_at' => $now
                        ]);
                    }

                    if ($this->request->ktp_ocr_dob != null || $this->request->ktp_ocr_dob != '') {
                        DB::table('leasings')->where('id', $this->leasing_id)->update([
                            'ktp_ocr_dob' => $this->request->ktp_ocr_dob,
                            'updated_at' => $now
                        ]);
                    }

                    if ($this->request->phone != null || $this->request->phone != '') {
                        DB::table('leasings')->where('id', $this->leasing_id)->update([
                            'phone' => $this->request->phone,
                            'updated_at' => $now
                        ]);
                    }

                    if ($this->request->ktp != null || $this->request->ktp != '') {
                        DB::table('leasings')->where('id', $this->leasing_id)->update([
                            'ktp' => $this->request->ktp,
                            'updated_at' => $now
                        ]);
                    }
                });

                $leasing_up = Leasing::where('leasing_code', $code)->firstOrFail();

                if ($leasing_up->ktp_picture != null && $leasing_up->selfie_picture != null && $leasing_up->ktp_type != null) {
                    if ($leasing_up->name != null && $leasing_up->email != null && $leasing_up->address != null && $leasing_up->npwp != null && $leasing_up->phone != null && $leasing_up->ktp != null) {
                        return view('pages.apply.step3')->withLeasing($leasing_up)->withCode($code);
                    } else {
                        return redirect()->route('apply', [2, $code]);
                    }
                } else {
                    return redirect()->route('apply', [1, $code]);
                }
            } catch (Exception $e) {
                return abort(500);
            }
        } else if ($step == 4) {
            if ($leasing->bpkb_picture == null || $leasing->bpkb_picture == '') {
                $this->validate($request, [
                    'bpkb_picture' => 'required|image'
                ]);
            }

            if ($leasing->picture1 == null || $leasing->picture1 == '') {
                $this->validate($request, [
                    'picture1' => 'required|image'
                ]);
            }

            if ($leasing->picture2 == null || $leasing->picture2 == '') {
                $this->validate($request, [
                    'picture2' => 'required|image',
                ]);
            }

            if ($leasing->picture3 == null || $leasing->picture3 == '') {
                $this->validate($request, [
                    'picture3' => 'required|image',
                ]);
            }

            if ($leasing->picture4 == null || $leasing->picture4 == '') {
                $this->validate($request, [
                    'picture4' => 'required|image',
                ]);
            }

            if ($leasing->picture5 == null || $leasing->picture5 == '') {
                $this->validate($request, [
                    'picture5' => 'required|image',
                ]);
            }

            if ($leasing->picture6 == null || $leasing->picture6 == '') {
                $this->validate($request, [
                    'picture6' => 'required|image',
                ]);
            }

            try {
                DB::transaction(function () {
                    $now = Carbon::now();

                    if ($this->request->hasFile('bpkb_picture')) {
                        DB::table('leasings')->where('id', $this->leasing_id)->update([
                            'bpkb_picture' => Helper::interventionUploadImage($this->request->file('bpkb_picture'), null, 'leasings/bpkb'),
                            'updated_at' => $now
                        ]);
                    }

                    if ($this->request->hasFile('picture1')) {
                        DB::table('leasings')->where('id', $this->leasing_id)->update([
                            'picture1' => Helper::interventionUploadImage($this->request->file('picture1'), null, 'leasings/pictures'),
                            'updated_at' => $now
                        ]);
                    }

                    if ($this->request->hasFile('picture2')) {
                        DB::table('leasings')->where('id', $this->leasing_id)->update([
                            'picture2' => Helper::interventionUploadImage($this->request->file('picture2'), null, 'leasings/pictures'),
                            'updated_at' => $now
                        ]);
                    }

                    if ($this->request->hasFile('picture3')) {
                        DB::table('leasings')->where('id', $this->leasing_id)->update([
                            'picture3' => Helper::interventionUploadImage($this->request->file('picture3'), null, 'leasings/pictures'),
                            'updated_at' => $now
                        ]);
                    }

                    if ($this->request->hasFile('picture4')) {
                        DB::table('leasings')->where('id', $this->leasing_id)->update([
                            'picture4' => Helper::interventionUploadImage($this->request->file('picture4'), null, 'leasings/pictures'),
                            'updated_at' => $now
                        ]);
                    }

                    if ($this->request->hasFile('picture5')) {
                        DB::table('leasings')->where('id', $this->leasing_id)->update([
                            'picture5' => Helper::interventionUploadImage($this->request->file('picture5'), null, 'leasings/pictures'),
                            'updated_at' => $now
                        ]);
                    }

                    if ($this->request->hasFile('picture6')) {
                        DB::table('leasings')->where('id', $this->leasing_id)->update([
                            'picture6' => Helper::interventionUploadImage($this->request->file('picture6'), null, 'leasings/pictures'),
                            'updated_at' => $now
                        ]);
                    }
                });

                $leasing_up = Leasing::where('leasing_code', $code)->firstOrFail();

                if ($leasing_up->ktp_picture != null && $leasing_up->selfie_picture != null && $leasing_up->ktp_type != null) {
                    if ($leasing_up->name != null && $leasing_up->email != null && $leasing_up->address != null && $leasing_up->npwp != null && $leasing_up->phone != null && $leasing_up->ktp != null) {
                        if ($leasing_up->bpkb_picture != null && $leasing_up->picture1 != null && $leasing_up->picture2 != null && $leasing_up->picture3 != null && $leasing_up->picture4 != null && $leasing_up->picture5 != null && $leasing_up->picture6 != null) {
                            return view('pages.apply.confirm')->withLeasing($leasing_up)->withCode($code);
                        } else {
                            return redirect()->route('apply', [3, $code]);
                        }
                    } else {
                        return redirect()->route('apply', [2, $code]);
                    }
                } else {
                    return redirect()->route('apply', [1, $code]);
                }
            } catch (Exception $e) {
                return abort(500);
            }
        } else {
            return abort(404);
        }
    }

    public function success(Request $request, $code)
    {
        $this->request = $request;
        $leasing = Leasing::where('leasing_code', $code)->firstOrFail();
        $this->leasing_id = $leasing->id;

        if ($leasing->ktp_type == null || $leasing->ktp_type == '') {
            $this->validate($request, [
                'ktp_type' => 'required'
            ]);
        }

        if ($leasing->ktp_picture == null || $leasing->ktp_picture == '') {
            $this->validate($request, [
                'ktp_picture' => 'required|image'
            ]);
        }

        if ($leasing->selfie_picture == null || $leasing->selfie_picture == '') {
            $this->validate($request, [
                'selfie_picture' => 'required|image',
            ]);
        }

        if ($leasing->name == null || $leasing->name == '') {
            $this->validate($request, [
                'name' => 'required'
            ]);
        }

        if ($leasing->email == null || $leasing->email == '') {
            $this->validate($request, [
                'email' => 'email'
            ]);
        }

        if ($leasing->address == null || $leasing->address == '') {
            $this->validate($request, [
                'address' => 'required',
            ]);
        }

        if ($leasing->npwp == null || $leasing->npwp == '') {
            $this->validate($request, [
                'npwp' => 'required|numeric',
            ]);
        }

        if ($leasing->ktp_ocr_dob == null || $leasing->ktp_ocr_dob == '') {
            $this->validate($request, [
                'ktp_ocr_dob' => 'required|date',
            ]);
        }

        if ($leasing->phone == null || $leasing->phone == '') {
            $this->validate($request, [
                'phone' => 'required|numeric|min:10',
            ]);
        }

        if ($leasing->ktp == null || $leasing->ktp == '') {
            $this->validate($request, [
                'ktp' => 'required|numeric|min:10',
            ]);
        }

        if ($leasing->bpkb_picture == null || $leasing->bpkb_picture == '') {
            $this->validate($request, [
                'bpkb_picture' => 'required|image'
            ]);
        }

        if ($leasing->picture1 == null || $leasing->picture1 == '') {
            $this->validate($request, [
                'picture1' => 'required|image'
            ]);
        }

        if ($leasing->picture2 == null || $leasing->picture2 == '') {
            $this->validate($request, [
                'picture2' => 'required|image',
            ]);
        }

        if ($leasing->picture3 == null || $leasing->picture3 == '') {
            $this->validate($request, [
                'picture3' => 'required|image',
            ]);
        }

        if ($leasing->picture4 == null || $leasing->picture4 == '') {
            $this->validate($request, [
                'picture4' => 'required|image',
            ]);
        }

        if ($leasing->picture5 == null || $leasing->picture5 == '') {
            $this->validate($request, [
                'picture5' => 'required|image',
            ]);
        }

        if ($leasing->picture6 == null || $leasing->picture6 == '') {
            $this->validate($request, [
                'picture6' => 'required|image',
            ]);
        }

        try {
            DB::transaction(function () {
                $now = Carbon::now();

                if ($this->request->ktp_type != null || $this->request->ktp_type != '' || $this->request->ktp_type > 0) {
                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'ktp_type' => $this->request->ktp_type,
                        'updated_at' => $now
                    ]);
                }

                if ($this->request->hasFile('ktp_picture')) {
                    $ktp_url = Helper::interventionUploadImage($this->request->file('ktp_picture'), null, 'leasings/ktp');

                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'ktp_picture' => $ktp_url,
                        'updated_at' => $now
                    ]);

                    if ($this->request->ktp_type == 'EKTP' && $this->request->hasFile('ktp_picture')) {
                        $client = new CurlClient(Config::get('constants')['ADVANCE_AI_HOST'], Config::get('constants')['ADVANCE_AI_API_KEY'], Config::get('constants')['ADVANCE_AI_SECRET_KEY']);
                        $ocr = $client->request(Config::get('constants')['ADVANCE_AI_OCR_KTP_CHECK'], null, array(
                            'ocrImage' => str_replace(Config::get('constants')['LINK_PATH'], Config::get('constants')['UPLOAD_PATH'], $ktp_url)
                        ));

                        $result = json_decode($ocr);

                        if ($result->code == 'SUCCESS') {
                            DB::table('leasings')->where('id', $this->leasing_id)->update([
                                'name' => $result->data->name,
                                'address' => $result->data->address,
                                'ktp' => $result->data->idNumber,
                                'ktp_ocr_number' => $result->data->idNumber,
                                'ktp_ocr_name' => $result->data->name,
                                'ktp_ocr_dob' => date('Y-m-d', strtotime(strrev(substr(strrev($result->data->birthPlaceBirthday), 0, 10)))),
                                'updated_at' => $now
                            ]);
                        }
                    }
                }

                if ($this->request->hasFile('selfie_picture')) {
                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'selfie_picture' => Helper::interventionUploadImage($this->request->file('selfie_picture'), null, 'leasings/selfie'),
                        'updated_at' => $now
                    ]);
                }

                if ($this->request->name != null || $this->request->name != '') {
                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'name' => $this->request->name,
                        'updated_at' => $now
                    ]);
                }

                if ($this->request->email != null || $this->request->email != '') {
                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'email' => $this->request->email,
                        'updated_at' => $now
                    ]);
                }

                if ($this->request->address != null || $this->request->address != '') {
                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'address' => $this->request->address,
                        'updated_at' => $now
                    ]);
                }

                if ($this->request->npwp != null || $this->request->npwp != '') {
                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'npwp' => $this->request->npwp,
                        'updated_at' => $now
                    ]);
                }

                if ($this->request->ktp_ocr_dob != null || $this->request->ktp_ocr_dob != '') {
                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'ktp_ocr_dob' => $this->request->ktp_ocr_dob,
                        'updated_at' => $now
                    ]);
                }

                if ($this->request->phone != null || $this->request->phone != '') {
                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'phone' => $this->request->phone,
                        'updated_at' => $now
                    ]);
                }

                if ($this->request->ktp != null || $this->request->ktp != '') {
                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'ktp' => $this->request->ktp,
                        'updated_at' => $now
                    ]);
                }

                if ($this->request->hasFile('bpkb_picture')) {
                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'bpkb_picture' => Helper::interventionUploadImage($this->request->file('bpkb_picture'), null, 'leasings/bpkb'),
                        'updated_at' => $now
                    ]);
                }

                if ($this->request->hasFile('picture1')) {
                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'picture1' => Helper::interventionUploadImage($this->request->file('picture1'), null, 'leasings/pictures'),
                        'updated_at' => $now
                    ]);
                }

                if ($this->request->hasFile('picture2')) {
                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'picture2' => Helper::interventionUploadImage($this->request->file('picture2'), null, 'leasings/pictures'),
                        'updated_at' => $now
                    ]);
                }

                if ($this->request->hasFile('picture3')) {
                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'picture3' => Helper::interventionUploadImage($this->request->file('picture3'), null, 'leasings/pictures'),
                        'updated_at' => $now
                    ]);
                }

                if ($this->request->hasFile('picture4')) {
                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'picture4' => Helper::interventionUploadImage($this->request->file('picture4'), null, 'leasings/pictures'),
                        'updated_at' => $now
                    ]);
                }

                if ($this->request->hasFile('picture5')) {
                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'picture5' => Helper::interventionUploadImage($this->request->file('picture5'), null, 'leasings/pictures'),
                        'updated_at' => $now
                    ]);
                }

                if ($this->request->hasFile('picture6')) {
                    DB::table('leasings')->where('id', $this->leasing_id)->update([
                        'picture6' => Helper::interventionUploadImage($this->request->file('picture6'), null, 'leasings/pictures'),
                        'updated_at' => $now
                    ]);
                }

                $leasing_user_register = Leasing::findOrFail($this->leasing_id);

                $generate_password = substr(md5(uniqid(rand(1, 6))), 0, 8);
                $this->generate_password = $generate_password;

                /*$user_id = DB::table('users')->insertGetId([
                    'name' => $leasing_user_register->name,
                    'email' => $leasing_user_register->email,
                    'password' => Hash::make($generate_password),
                    'phone' => $leasing_user_register->phone,
                    'address' => $leasing_user_register->address,
                    'created_at' => $now,
                    'updated_at' => $now
                ]);*/

                try {
                    $user = User::create([
                        'name' => $leasing_user_register->name,
                        'email' => $leasing_user_register->email,
                        'password' => Hash::make($generate_password),
                        'phone' => $leasing_user_register->phone,
                        'address' => $leasing_user_register->address,
                    ])/*->sendEmailVerificationNotification()*/;

                    $this->user = $user;
                } catch (QueryException $e) {
                    $error_code = $e->errorInfo[1];
                    if ($error_code == 1062) {
                        $this->user_duplicate = true;
                        return back()->with('error_email', 'This email already registered, Please login first!'); /* not executed, execute move into bottom */
                    }
                }

                DB::table('leasings')->where('id', $this->leasing_id)->update([
                    'user_id' => $user->id,
                    'updated_at' => $now
                ]);
            });

            $leasing_up = Leasing::where('leasing_code', $code)->firstOrFail();

            if ($leasing_up->ktp_picture != null && $leasing_up->selfie_picture != null && $leasing_up->ktp_type != null) {
                if ($leasing_up->name != null && $leasing_up->email != null && $leasing_up->address != null && $leasing_up->npwp != null && $leasing_up->phone != null && $leasing_up->ktp != null) {
                    if ($leasing_up->bpkb_picture != null && $leasing_up->picture1 != null && $leasing_up->picture2 != null && $leasing_up->picture3 != null && $leasing_up->picture4 != null && $leasing_up->picture5 != null && $leasing_up->picture6 != null) {
                        if (!$this->user_duplicate) {
                            $verification_url = route('apply.verify', [$this->user->email, $code]);
                            Mail::send('pages.apply.mail', [
                                'user' => $this->user,
                                'generate_password' => $this->generate_password,
                                'verification_url' => $verification_url
                            ], function ($message) {
                                $message->from(Config::get('constants')['MAIL_USERNAME'], Config::get('constants')['MAIL_INITIAL'])
                                    ->to($this->user->email)
                                    ->subject('Verify');
                            });

                            return view('pages.apply.success')->withUrl($verification_url)->withUser($this->user);
                        } else {
                            return back()->with('error_email', 'This email already registered, Please login first!'); /* executed */
                        }
                    } else {
                        return redirect()->route('apply', [3, $code]);
                    }
                } else {
                    return redirect()->route('apply', [2, $code]);
                }
            } else {
                return redirect()->route('apply', [1, $code]);
            }
        } catch (Exception $e) {
            return abort(500);
        }
    }

    public function verify($email, $code) {
        $user = User::where('email', $email)->firstOrFail();
        $user->email_verified_at = Carbon::now();
        $user->save();

        $leasing = Leasing::where('leasing_code', $code)->firstOrFail();

        if ($leasing->user_id == $user->id) {
            return view('pages.apply.changepassword')->withUser($user)->withCode($code);
        } else {
            return abort(404);
        }
    }

    public function change_password(Request $request, $email, $code)
    {
        $user = User::where('email', $email)->firstOrFail();
        $leasing = Leasing::where('leasing_code', $code)->firstOrFail();

        if ($leasing->user_id == $user->id) {
            $validator = Validator::make($request->all(), [
                'new_password' => '',
                'confirm_password' => 'same:new_password'
            ]);

            if ($validator->fails()) {
                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            } else {
                $user->password = Hash::make($request->new_password);
                $user->save();

                return response()->json($user);
            }
        } else {
            return abort(404);
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
