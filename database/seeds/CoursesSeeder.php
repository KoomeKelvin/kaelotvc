<?php

use Illuminate\Database\Seeder;
use App\Course;
class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $course1 = new Course();
        $course1->name="Certificate in Fashion Design";
        $course1->type="Certificate";
        $course1->duration="2 Years";
        $course1->minimum_grade="C-";
        $course1->subjects_considered="Maths C, Kiswahili C+, English B-";
        $course1->department="Applied";
        $course1->save();

        $course2 = new Course();
        $course2->name="Certificate in Food and Beverage Management ";
        $course2->type="Certificate";
        $course2->duration="2 Years";
        $course2->minimum_grade="D3";
        $course2->subjects_considered="Homescience C, Kiswahili C+, English B-";
        $course2->department="Food and Beverage";
        $course2->save();

        $course3 = new Course();
        $course3->name="Diploma in Electrical Engineering";
        $course3->type="Diploma";
        $course3->duration="3 Years";
        $course3->minimum_grade="C";
        $course3->subjects_considered="Maths B-, Kiswahili C+, English B-";
        $course3->department="Electrical Engineering";
        $course3->save();

        $course4 = new Course();
        $course4->name="Artisan in wireman";
        $course4->type="Artisan";
        $course4->duration="1 Year";
        $course4->minimum_grade="D";
        $course4->subjects_considered="Maths C-, Kiswahili D+, English C-";
        $course4->department="Electrical Engineering";
        $course4->save();

        $course5 = new Course();
        $course5->name="Higher Diploma in Secretarial Studies";
        $course5->type="Higher National Diploma";
        $course5->duration="2 Years";
        $course5->minimum_grade="C-";
        $course5->subjects_considered="Maths C, Kiswahili C+ English B-";
        $course5->department="Business";
        $course5->save();

    }
}
