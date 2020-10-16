<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    //
    protected $fillable=['title', 'slug', 'body', 'unit_id',];

    public function files(){
        return $this->MorphMany('App\File', 'fileable');
    }
    public function unit(){
        return $this->belongsTo('App\Unit');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
