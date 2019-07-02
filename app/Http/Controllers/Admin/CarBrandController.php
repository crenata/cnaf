<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\Helper;

use App\Models\Admin\CarRegion;
use App\Models\Admin\CarBrand;

use Session;
use Validator;

class CarBrandController extends Controller
{
    protected $rules = [
        'name' => 'required',
        'car_region_id' => 'required|numeric'
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
        return view('admin.pages.car.carbrand.index')->withCarRegions($carregions)->withCarBrands($carbrands);
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
            $carbrand = new CarBrand;

            $carbrand->name = $request->name;
            $carbrand->slug = str_slug($request->name, '-');
            $carbrand->car_region_id = $request->car_region_id;

            $carbrand->save();

            return response()->json($carbrand->load('car_region'));
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
            $carbrand = CarBrand::findOrFail($id);

            $carbrand->name = $request->name;
            $carbrand->slug = str_slug($request->name, '-');
            $carbrand->car_region_id = $request->car_region_id;

            $carbrand->save();

            return response()->json($carbrand->load('car_region'));
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
        $carbrand = CarBrand::findOrFail($id);

        foreach ($carbrand->car_types as $cartype) {
            foreach ($cartype->car_models as $carmodel) {
                $carmodel->car_years->delete();
            }
            $cartype->car_models->delete();
        }
        
        $carbrand->car_types->delete();
        $carbrand->delete();
        return response()->json($carbrand);
    }
}
