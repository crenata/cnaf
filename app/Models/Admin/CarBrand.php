<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarBrand extends Model
{
    use SoftDeletes;

    public function car_region() {
        return $this->belongsTo('App\Models\Admin\CarRegion');
    }

    public function car_types() {
        return $this->hasMany('App\Models\Admin\CarType');
    }
}
