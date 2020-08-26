<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $table = 'departments';
    public $timestamps = true;
    protected $fillable = array('Department_name');

    public function collage()
    {
        return $this->belongsTo('App\Models\Collage');
    }

    public function Courses()
    {
        return $this->hasMany('App\Models\Course');
    }

}
