<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use JordanMiguel\LaravelPopular\Traits\Visitable;

class Blog extends Model
{
    use SoftDeletes;
    use Visitable;
}
