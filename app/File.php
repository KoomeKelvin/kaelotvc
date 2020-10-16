<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $fillable= ['fileable_id', 'fileable_type'];
    
    // morphto relationship to the user table
    public function fileable(){
        return $this->morphTo();
    }
}
