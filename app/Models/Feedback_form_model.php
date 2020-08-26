<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback_form_model extends Model
{

    protected $table = 'feedback_form_models';
    public $timestamps = true;
    protected $fillable = array('question', 'degree');

    public function feedback()
    {
        return $this->hasMany('App\FeedBack');
    }

    public function students()
    {
        return $this->belongsToMany('App\Models\Student','feedback_form_model_student','feedback_form_model_id','student_id');
    }

}
