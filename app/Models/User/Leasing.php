<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leasing extends Model
{
    use SoftDeletes;

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function car_region() {
        return $this->belongsTo('App\Models\Admin\CarRegion');
    }

    public function car_brand() {
        return $this->belongsTo('App\Models\Admin\CarBrand');
    }

    public function car_type() {
        return $this->belongsTo('App\Models\Admin\CarType');
    }

    public function car_model() {
        return $this->belongsTo('App\Models\Admin\CarModel');
    }

    public function car_year() {
        return $this->belongsTo('App\Models\Admin\CarYear');
    }
}
