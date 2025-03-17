<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'user_id',
        'degree_name',
        'institute_name',
        'start_date',
        'end_date',
        'description',
        'gpa',
        'cgpa'
    ];
}
