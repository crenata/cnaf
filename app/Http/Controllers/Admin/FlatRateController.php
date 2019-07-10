<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\Helper;

use App\Models\Admin\CarRegion;
use App\Models\Admin\FlatRate;

use Session;
use Validator;

class FlatRateController extends Controller
{
    protected $rules = [
        'car_region_id' => 'required|numeric',
        'tenor' => 'required|numeric',
        'rate' => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carregions = CarRegion::all();
        $flatrates = FlatRate::all();
        return view('admin.pages.car.flatrate.index')->withCarRegions($carregions)->withFlatRates($flatrates);
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
            $flatrate = new FlatRate;

            $flatrate->car_region_id = $request->car_region_id;
            $flatrate->tenor = $request->tenor;
            $flatrate->rate = $request->rate;

            $flatrate->save();

            return response()->json($flatrate->load('car_region'));
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
            $flatrate = FlatRate::findOrFail($id);

            $flatrate->car_region_id = $request->car_region_id;
            $flatrate->tenor = $request->tenor;
            $flatrate->rate = $request->rate;

            $flatrate->save();

            return response()->json($flatrate->load('car_region'));
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
        $flatrate = FlatRate::findOrFail($id);
        $flatrate->delete();
        return response()->json($flatrate);
    }
}
