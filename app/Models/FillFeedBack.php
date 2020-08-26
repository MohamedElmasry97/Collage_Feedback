<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FillFeedBack extends Model
{
    protected $table = 'fill_feedbacks';
    public $timestamps = true;
    protected $fillable = ['mean', 'student_id', 'instructor_id', 'course_id', 'feedback_model_id'];

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function instructor()
    {
        return $this->belongsTo('App\Models\Instructor');
    }

    public function statistic() // sum
    {
        return $this->belongsTo('App\Models\Statistics');
    }

    public function feedbackModel() // sum
    {
        return $this->belongsTo('App\Models\FeedbackModel');
    }
}
