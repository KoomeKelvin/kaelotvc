<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    //
    protected $fillable = ['markable_id', 'markable_type', 'cat', 'exam', 'unit_id'];


    public function markable(){
        return $this->morphTo();
    }


}


