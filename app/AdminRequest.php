<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminRequest extends Model
{
    protected $table = 'admin_requests';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
