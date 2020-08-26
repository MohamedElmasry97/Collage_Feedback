<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Instructor extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password',
    ];
    protected $guard = 'instructor';
    protected $table = 'instructors';
    protected $hidden = ['password'];
    public $timestamps = true;

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course', 'course_instructor', 'instructor_id', 'course_id');
    }

    public function feedbacks()
    {
        return $this->belongsToMany('App\Models\FeedBack', 'feedback_instructor', 'instructor_id', 'feedback_id');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function fillFeedbacks()
    {
        return $this->hasMany('App\Models\FillFeedback');
    }

    public function statistics()
    {
        return $this->hasMany('App\Models\Statistics');
    }
}
