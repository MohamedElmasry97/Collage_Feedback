<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['pin_code', 'name', 'email', 'phone', 'department_name'];
    protected $table = 'students';
    public $timestamps = true;
    protected $hidden = [
        'password', 'api_token'
    ];

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course');
    }

    public function feedbacks()
    {
        return $this->belongsToMany('App\Models\FeedBack', 'feedback_student', 'student_id', 'feedback_id');
    }

    public function fillFeedbacks()
    {
        return $this->hasMany('App\Models\FillFeedBack');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}
