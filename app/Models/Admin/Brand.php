<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    public function vendor() {
    	return $this->belongsTo('App\Models\Admin\Vendor');
    }
    public function items() {
    	return $this->hasMany('App\Models\Admin\Item');
    }
}
