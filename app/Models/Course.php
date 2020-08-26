<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    public $timestamps = true;
    protected $fillable = ['name', 'department_id', 'type', 'symbolic'];

    public function Department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function student()
    {
        return $this->belongsToMany('App\Models\Student', 'course_student', 'course_id', 'student_id');
    }

    public function instructors()
    {
        return $this->belongsToMany('App\Models\Instructor', 'course_instructor', 'course_id', 'instructor_id');
    }

    public function fills()
    {
        return $this->hasMany('App\Models\FillFeedBack');
    }

    public function statistics()
    {
        return $this->hasMany('App\Models\Statistics');
    }
}
