<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionVendorDetail extends Model
{
    use SoftDeletes;

    public function transaction_vendor() {
        return $this->belongsTo('App\Models\User\TransactionVendor');
    }

    public function item() {
        return $this->belongsTo('App\Models\Admin\Item');
    }
}
