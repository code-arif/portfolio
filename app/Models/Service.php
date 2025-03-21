<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'icon',
        'icon_color_code',
        'status'
    ];
}
