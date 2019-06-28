<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\Helper;

use App\Models\Admin\CarRegion;
use App\Models\Admin\CarBrand;
use App\Models\Admin\CarType;

use Session;
use Validator;

class CarTypeController extends Controller
{
    protected $rules = [
        'name' => 'required',
        'car_region_id' => 'required|numeric',
        'car_brand_id' => 'required|numeric'
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
        return view('admin.pages.car.cartype.index')->withCarRegions($carregions)->withCarBrands($carbrands)->withCarTypes($cartypes);
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
            $cartype = new CarType;

            $cartype->name = $request->name;
            $cartype->slug = str_slug($request->name, '-');
            $cartype->car_region_id = $request->car_region_id;
            $cartype->car_brand_id = $request->car_brand_id;

            $cartype->save();

            return response()->json($cartype->load('car_region')->load('car_brand'));
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
            $cartype = CarType::findOrFail($id);

            $cartype->name = $request->name;
            $cartype->slug = str_slug($request->name, '-');
            $cartype->car_region_id = $request->car_region_id;
            $cartype->car_brand_id = $request->car_brand_id;

            $cartype->save();

            return response()->json($cartype->load('car_region')->load('car_brand'));
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
        $cartype = CarType::findOrFail($id);
        $cartype->delete();
        return response()->json($cartype);
    }
}
