<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

	public function brand() {
    	return $this->belongsTo('App\Models\Admin\Brand');
    }

    public function vendor() {
    	return $this->belongsTo('App\Models\Admin\Vendor');
    }
}
