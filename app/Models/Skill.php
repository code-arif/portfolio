<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'user_id', 'prefix', 'title', 'preposition', 'suffix', 'conjunction', 'short_description', 'long_description', 'start_date', 'end_date', 'language_or_key', 'category', 'certificate_image', 'certificate_link', 'progress_certificate', 'batch_no', 'batch_name', 'student_id', 'institute_name', 'institute_branch', 'institute_website', 'trainer_name'
    ];
}
