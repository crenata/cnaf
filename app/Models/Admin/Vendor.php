<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use SoftDeletes;

    public function brands() {
    	return $this->hasMany('App\Models\Admin\Brand');
    }

    public function items() {
    	return $this->hasMany('App\Models\Admin\Item');
    }
}
