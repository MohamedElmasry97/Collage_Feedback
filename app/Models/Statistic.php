<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $table = 'statistics';
    public $timestamps = true;
    protected $fillable = ['mean', 'instructor_id', 'course_id'];

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function instructor()
    {
        return $this->belongsTo('App\Models\Instructor');
    }
}
