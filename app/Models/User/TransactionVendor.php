<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionVendor extends Model
{
    use SoftDeletes;

    public function transaction() {
        return $this->belongsTo('App\Models\User\Transaction');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function vendor() {
        return $this->belongsTo('App\Models\Admin\Vendor');
    }
}
