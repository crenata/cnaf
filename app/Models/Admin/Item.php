<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	public function brand() {
    	return $this->belongsTo('App\Models\Admin\Brand');
    }

    public function vendor() {
    	return $this->belongsTo('App\Models\Admin\Vendor');
    }
}
