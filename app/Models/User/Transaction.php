<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function transaction_vendors() {
        return $this->hasMany('App\Models\User\TransactionVendor');
    }
}
