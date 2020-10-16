<?php

namespace App\Observers;

use App\Student;
use Hash;
use App\Notifications\studentApplicationNotification;

class StudentObserver
{

    public function creating(Student $student)
    {
        //
        
        $student->api_token=bin2hex(openssl_random_pseudo_bytes(30));
        $length=10;
        $keyspace='ABCDEFGHJKMNPQRTUVWXYZacdefghijkmpqrstuvwxyz12346789';
        $str='';
        $max=mb_strlen($keyspace, '8bit')-1;
        for($i=0; $i<$length; ++$i){
            $str.=$keyspace[random_int(0, $max)];
         }
         $password= $str;
        $student->password=Hash::make($password);
        $student->notify(new StudentApplicationNotification($password, $student->email));
    }

    /**
     * Handle the User "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(Student $student)
    {
        // upon  a student being created we create a random password for them 
   

    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(Student $student)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(Student $student)
    {
        //
    }
}