<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarRegion extends Model
{
    use SoftDeletes;

    public function car_brands() {
        return $this->hasMany('App\Models\Admin\CarBrand');
    }

    public function car_types() {
        return $this->hasMany('App\Models\Admin\CarType');
    }

    public function car_models() {
        return $this->hasMany('App\Models\Admin\CarModel');
    }
}
