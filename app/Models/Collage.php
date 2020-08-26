<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collage extends Model
{

    protected $table = 'collages';
    public $timestamps = true;
    protected $fillable = array('collage_name');

    public function Departments()
    {
        return $this->hasMany('App\Models\Department');
    }

}
