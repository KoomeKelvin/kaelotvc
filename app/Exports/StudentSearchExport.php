<?php

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class StudentSearchExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $student;

    public function __construct($students){
        $this->student=$students;
    }


    public function collection()
    {
        //
        return $this->student;
    }

    public function map($student) : array {
        $admission_year=date('Y', strtotime($student->created_at));
          return [
              $student->admission_number,
              $student->full_name,
              $student->class->code,
              $student->kcpe_index."/".$student->kcpe_year,
              $student->kcse_index."/".$student->kcse_year,
              $student->gender,
              $student->id_no,
              $student->last_tvet_programme,
              $student->course->name,
              $student->course->type,
              "KNEC",
              substr($student->course->duration, 0, 1),
              $admission_year,
              $student->current_study_year,
              $student->sponser
  
          ] ;
   
   
      }
   
      public function headings() : array {
          return [
             'ADMISSION NO',
             'Full NAMES',
             'CLASS',
             'KCPE INDEX NUMBER',
             'KCSE INDEX NUMBER',
             'GENDER',
             'NATIONAL ID / CITIZENSHIP',
             'LAST TVET PROGRAMME',
             'CURRENT PROGRAMME NAME',
             'LEVEL OF CURRENT PROGRAMME',
             'PROGRAMME EXAMINING BODY',
             'PROGRAMME DURATION',
             'ADMISSION YEAR',
             'CURRENT YEAR OF STUDY',
             'SPONSORSHIP'
                    ] ;
      }
}
