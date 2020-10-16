<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_no');
            $table->string('full_name');
            $table->string('gender');
            $table->string('phone_no');
            $table->string('email');
            $table->string('postal_address');
            $table->string('county');
            $table->string('passport');
            $table->string('intake');
            $table->string('kcse_index');
            $table->string('kcse_year');
            $table->string('kcse_meangrade');
            $table->string('id_pic');
            $table->string('kcse_pic');
            $table->integer('course_id');
            $table->string('nextofkin_phone');
            $table->string('kcpe_index');
            $table->string('kcpe_pic');
            $table->string('kcpe_year');
            $table->date('dateofbirth');
            $table->string('marital_status');
            $table->string('pry_sch');
            $table->string('sec_sch');
            $table->string('sec_start');
            $table->string('languages_spoken');
            $table->string('physically_challenged');
            $table->string('mother_info');
            $table->string('father_info');
            $table->integer('class_id')->nullable();
            $table->date('admitted_on')->nullable();
            $table->string('admission_number')->nullable();
            $table->string('sponser');
            $table->string('alpaymentreceipt')->nullable();
            $table->string('password')->nullable();
            $table->string('last_tvet_programme')->default("NONE");
            $table->string('current_study_year')->default('1');
            $table->string('api_token')->unique();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
