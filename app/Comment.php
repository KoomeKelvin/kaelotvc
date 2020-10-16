<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable= [
        'body', 'student_id'
    ];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
    public function discussion()
    {
        return $this->belongsTo('App\Discussion');
    }
}
