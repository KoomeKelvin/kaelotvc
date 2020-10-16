<?php

namespace App;

use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\sendStudentResetPasswordNotification;

class Student extends Authenticatable
{
    use Notifiable;
    //
    protected $guard="student";

    protected $fillable=['id_no', 'full_name', 'gender', 'phone_no', 'email', 'postal_address', 'county', 'passport', 'intake', 'kcse_index',
    'kcse_year', 'kcse_meangrade', 'id_pic', 'kcse_pic', 'course_id', 'nextofkin_phone', 'kcpe_index', 'kcpe_pic', 'kcpe_year', 
    'dateofbirth', 'marital_status', 'pry_sch', 'sec_sch', 'sec_start', 'languages_spoken', 'physically_challenged', 
    'mother_info', 'father_info', 'admission_number', 'class_id','admitted_on', 'password', 'api_token',
    ];

    protected $hidden=[
    'password',
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function marks()
    {
        return $this->morphMany('App\Mark', 'markable');
    }

    public function class()
    {
        return $this->belongsTo('App\Theclass', 'class_id', 'id')->withDefault();
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new sendStudentResetPasswordNotification($token, $this->email));
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function fees()
    {
        return $this->hasMany('App\Fee');
    }
}
