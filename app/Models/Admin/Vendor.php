<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function brands() {
    	return $this->hasMany('App\Models\Admin\Brand');
    }

    public function items() {
    	return $this->hasMany('App\Models\Admin\Item');
    }
}
