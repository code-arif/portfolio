<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['first_name', 'last_name', 'designations', 'phone', 'additional_phone', 'additional_email', 'secondary_email', 'address', 'image_one', 'image_two', 'linkedin', 'facebook', 'github', 'twitter', 'instagram', 'fiverr', 'upwork', 'freelancer', 'bio', 'short_description', 'long_description', 'user_id'];
}
