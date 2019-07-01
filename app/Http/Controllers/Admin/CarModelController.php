<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\Helper;

use App\Models\Admin\CarRegion;
use App\Models\Admin\CarBrand;
use App\Models\Admin\CarType;
use App\Models\Admin\CarModel;

use Session;
use Validator;

class CarModelController extends Controller
{
    protected $rules = [
        'name' => 'required',
        'car_region_id' => 'required|numeric',
        'car_brand_id' => 'required|numeric',
        'car_type_id' => 'required|numeric'
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
        return view('admin.pages.car.carmodel.index')->withCarRegions($carregions)->withCarBrands($carbrands)->withCarTypes($cartypes)->withCarModels($carmodels);
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
            $carmodel = new CarModel;

            $carmodel->name = $request->name;
            $carmodel->slug = str_slug($request->name, '-');
            $carmodel->car_region_id = $request->car_region_id;
            $carmodel->car_brand_id = $request->car_brand_id;
            $carmodel->car_type_id = $request->car_type_id;

            $carmodel->save();

            return response()->json($carmodel->load('car_region')->load('car_brand')->load('car_type'));
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
            $carmodel = CarModel::findOrFail($id);

            $carmodel->name = $request->name;
            $carmodel->slug = str_slug($request->name, '-');
            $carmodel->car_region_id = $request->car_region_id;
            $carmodel->car_brand_id = $request->car_brand_id;
            $carmodel->car_type_id = $request->car_type_id;

            $carmodel->save();

            return response()->json($carmodel->load('car_region')->load('car_brand')->load('car_type'));
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
        $carmodel = CarModel::findOrFail($id);
        $carmodel->delete();
        return response()->json($carmodel);
    }
}
