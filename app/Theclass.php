<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theclass extends Model
    //
    {
        //
        protected $table="theclasses";
        protected $fillable= [
            'class_name', 'code', 'description', 'year', 'course_id',
    ];
    public function course(){
        return $this->belongsTo('App\Course');
    }
    public function units(){
        return $this->hasMany('App\Unit', 'class_id', 'id');
    }
    public function students(){
        return $this->hasMany('App\Student', 'class_id', 'id');
    }
}
