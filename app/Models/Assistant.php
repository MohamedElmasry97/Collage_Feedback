<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assistant extends Model
{

    protected $table = 'assistants';
    public $timestamps = true;
    protected $fillable = array('name');

    public function course()
    {
        return $this->belongsToMany('App\Course','assistant_course','assistant_id','course_id');
    }

}
