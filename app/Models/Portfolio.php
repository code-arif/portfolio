<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['user_id', 'title', 'category', 'short_description', 'long_description', 'featured_image', 'image', 'video', 'github_url', 'live_url', 'language_or_key', 'status'];

    //set defaule status
    protected $attributes = ['status' => 0];
}
