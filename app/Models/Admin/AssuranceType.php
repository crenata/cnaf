<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssuranceType extends Model
{
    use SoftDeletes;

//    public function assurance_rates() {
//        return $this->hasMany('App\Models\Admin\CarType');
//    }
}
