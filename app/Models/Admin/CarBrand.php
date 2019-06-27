<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarBrand extends Model
{
    use SoftDeletes;

    public function carregion() {
        return $this->belongsTo('App\Models\Admin\CarRegion');
    }
}
