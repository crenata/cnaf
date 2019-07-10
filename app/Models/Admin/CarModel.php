<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarModel extends Model
{
    use SoftDeletes;

    public function car_region() {
        return $this->belongsTo('App\Models\Admin\CarRegion');
    }

    public function car_brand() {
        return $this->belongsTo('App\Models\Admin\CarBrand');
    }

    public function car_type() {
        return $this->belongsTo('App\Models\Admin\CarType');
    }
}
