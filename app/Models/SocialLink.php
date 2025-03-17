<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = [
        'user_id', 'facebook', 'linkedin', 'twitter', 'instagram', 'github', 'fiverr', 'upwork', 'freelancer'
    ];
}
