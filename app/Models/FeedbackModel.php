<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedback_models';
    public $timestamps = true;
    protected $fillable = ['head'];

    public function feedbacks()
    {
        return $this->hasMany('App\Models\FeedBack');
    }

    public function fillfeedbacks()
    {
        return $this->hasMany('App\Models\FillFeedBack');
    }
}
