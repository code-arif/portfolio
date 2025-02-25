<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['first_name', 'last_name', 'designations', 'phone', 'additional_phone', 'additional_email', 'secondary_email', 'address','bio', 'user_id'];
}
