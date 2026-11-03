<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    protected $table = 'course_student';

    protected $fillable = [
        'student_id',
        'course_id',
        'enrolled_at',
    ];
}