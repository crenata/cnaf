<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    public function transaction() {
        return $this->belongsTo('App\Models\User\Transaction');
    }

    public function item() {
        return $this->belongsTo('App\Models\Admin\Item');
    }
}
