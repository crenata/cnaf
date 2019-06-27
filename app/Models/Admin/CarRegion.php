<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarRegion extends Model
{
    use SoftDeletes;

    public function carbrands() {
        return $this->hasMany('App\Models\Admin\CarBrand');
    }
}
