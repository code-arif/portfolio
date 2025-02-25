<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'user_id', 'title', 'short_description', 'long_description', 'start_date', 'end_date', 'language_or_key', 'category', 'certificate', 'batch_no', 'institute', 'trainer'
    ];
}
