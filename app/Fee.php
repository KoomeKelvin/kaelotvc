<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    //
    protected $fillable= ['location', 'description', 'amount', 'student_id',
];
    public function student()
    {
        return $this->belongsTo('App\Student');
    }

}
