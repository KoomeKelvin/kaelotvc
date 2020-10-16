<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $fillable= ['name', 'code', 'description', 'class_id'];
    //  relationship to the class model
    public function class(){
        return $this->belongsTo('App\Theclass');
    }
    public function marks(){
        return $this->morphMany('App\Mark', 'markable');
    }
    public function  discussions(){
        return $this->hasMany('App\Discussion');
    }
}
