<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\Helper;

use App\Models\Admin\CarRegion;
use App\Models\Admin\CarBrand;
use App\Models\Admin\CarType;
use App\Models\Admin\CarModel;
use App\Models\Admin\CarYear;

use Session;
use Validator;

class CarYearController extends Controller
{
    protected $rules = [
        'name' => 'required',
        'price' => 'required|numeric',
        'car_region_id' => 'required|numeric',
        'car_brand_id' => 'required|numeric',
        'car_type_id' => 'required|numeric',
        'car_model_id' => 'required|numeric'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carregions = CarRegion::all();
        $carbrands = CarBrand::all();
        $cartypes = CarType::all();
        $carmodels = CarModel::all();
        $caryears = CarYear::all();
        return view('admin.pages.car.caryear.index')->withCarRegions($carregions)->withCarBrands($carbrands)->withCarTypes($cartypes)->withCarModels($carmodels)->withCarYears($caryears);
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
            $caryear = new CarYear;

            $caryear->name = $request->name;
            $caryear->slug = str_slug($request->name, '-');
            $caryear->price = $request->price;
            $caryear->car_region_id = $request->car_region_id;
            $caryear->car_brand_id = $request->car_brand_id;
            $caryear->car_type_id = $request->car_type_id;
            $caryear->car_model_id = $request->car_model_id;

            $caryear->save();

            return response()->json($caryear->load('car_region')->load('car_brand')->load('car_type')->load('car_model'));
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
            $caryear = CarYear::findOrFail($id);

            $caryear->name = $request->name;
            $caryear->slug = str_slug($request->name, '-');
            $caryear->price = $request->price;
            $caryear->car_region_id = $request->car_region_id;
            $caryear->car_brand_id = $request->car_brand_id;
            $caryear->car_type_id = $request->car_type_id;
            $caryear->car_model_id = $request->car_model_id;

            $caryear->save();

            return response()->json($caryear->load('car_region')->load('car_brand')->load('car_type')->load('car_model'));
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
        $caryear = CarYear::findOrFail($id);
        $caryear->delete();
        return response()->json($caryear);
    }
}
