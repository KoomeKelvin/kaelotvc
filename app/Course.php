<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable= ['name', 'type', 'duration', 'minimum_grade', 'subjects_considered', 'department', 'admission_letter',
];
public function students (){
    return $this->hasMany('App\Student');
}
public function classes(){
    return $this->hasMany('App\Theclass');
}
}
