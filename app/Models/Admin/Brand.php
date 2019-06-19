<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function vendor() {
    	return $this->belongsTo('App\Models\Admin\Vendor');
    }
    public function items() {
    	return $this->hasMany('App\Models\Admin\Item');
    }
}
