<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\Helper;

use App\Models\Admin\CarRegion;

use Session;
use Validator;

class CarRegionController extends Controller
{
    protected $rules = [
        'name' => 'required',
        'admin_fee' => 'required|numeric',
        'provisi_percentage' => 'required',
        'polis_fee' => 'required|numeric'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carregions = CarRegion::all();
        return view('admin.pages.car.carregion.index')->withCarRegions($carregions);
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
            $carregion = new CarRegion;

            $carregion->name = $request->name;
            $carregion->slug = str_slug($request->name, '-');
            $carregion->admin_fee = $request->admin_fee;
            $carregion->provisi_percentage = $request->provisi_percentage;
            $carregion->polis_fee = $request->polis_fee;

            $carregion->save();

            return response()->json($carregion);
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
            $carregion = CarRegion::findOrFail($id);

            $carregion->name = $request->name;
            $carregion->slug = str_slug($request->name, '-');
            $carregion->admin_fee = $request->admin_fee;
            $carregion->provisi_percentage = $request->provisi_percentage;
            $carregion->polis_fee = $request->polis_fee;

            $carregion->save();

            return response()->json($carregion);
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
        $carregion = CarRegion::findOrFail($id);

        foreach ($carregion->carbrands as $carbrand) {
            foreach ($carbrand->car_types as $cartype) {
                foreach ($cartype->car_models as $carmodel) {
                    $carmodel->car_years->delete();
                }
                $cartype->car_models->delete();
            }
            $carbrand->car_types->delete();
        }

        $carregion->car_brands->delete();
        $carregion->delete();
        return response()->json($carregion);
    }
}
