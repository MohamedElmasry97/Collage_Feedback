<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    protected $table = 'feedbacks';
    public $timestamps = true;
    protected $fillable = ['degree', 'feedback_model_id', 'question', 'is_active'];

    public function students()
    {
        return $this->belongsToMany('App\Models\Student', 'feedback_student', 'feedback_id', 'student_id');
    }

    public function instructors()
    {
        return $this->belongsToMany('App\Models\Instructor', 'feedback_instructor', 'feedback_id', 'instructor_id');
    }

    public function feedbackModel()
    {
        return $this->belongsTo('App\Models\FeedbackModel');
    }
}
