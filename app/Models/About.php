<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'short_description',
        'long_description',
        'user_id'
    ];
}
