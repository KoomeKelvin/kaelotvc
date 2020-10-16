<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Student;
use App\Observers\UserObserver;
use App\Observers\StudentObserver;

class ObserverServiceProvider extends ServiceProvider
{
       /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        User::observe(UserObserver::class);
        Student::observe(StudentObserver::class);
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

    }

 
}
