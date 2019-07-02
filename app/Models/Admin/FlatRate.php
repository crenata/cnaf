<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlatRate extends Model
{
    use SoftDeletes;

    public function car_region() {
        return $this->belongsTo('App\Models\Admin\CarRegion');
    }
}
