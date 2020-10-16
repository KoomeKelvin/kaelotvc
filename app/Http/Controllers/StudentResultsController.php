<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mark;
use App\Unit;
use App\Theclass;
use App\Student;
use Auth;
use Hash;
use PDF;
use Illuminate\Support\Facades\Storage;

class StudentResultsController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:student');
    }

    public function index(){
    $id=Auth::guard('student')->user()->id;
    $student=Student::where('id', $id)->with('marks')->first();
    $units=Unit::all();
    return view('learner.results')->withStudent($student)->withUnits($units);
    }

    public function download_results($id, $term){
        $student= Student::where('id', $id)->with('marks')->first();
        $units=Unit::all();
        $term=$term;
        $pdf=PDF::loadView('learner.transcript', compact(['student', 'units', 'term']));
        Storage::put('public/transcript/'.$student->id.$student->full_name.'.pdf', $pdf->output());
        return $pdf->download($student->full_name.'.pdf');
    }
    // show student profile
    public function studentProfile()
    {
        $id=Auth::guard('student')->user()->id;
        $student=Student::where('id', $id)->first();
        return view('learner.profile')->withStudent($student);
    }
    // update student profile
    public function studentProfileUpdate(Request $request)
    {
       
        $request->validate([
            'student_id'=>'required|max:255',
            'password'=>'nullable|max:255',
            'image_uploaded'=>'nullable|image|max:1999'
        ]);
      
        if($request->hasFile('image_uploaded')){
            $imagename_withextension=$request->file('image_uploaded')->getClientOriginalName();
            $imagename=pathinfo($imagename_withextension, PATHINFO_FILENAME);
            $extension=$request->file('image_uploaded')->getClientOriginalExtension();
            $name=str_replace(' ', '_', Auth::guard('student')->user()->full_name);
            $image_to_store=$imagename.$name.time().'.'.$extension;
            $path=$request->file('image_uploaded')->storeAs('/public/student/passport', $image_to_store);
        }
        $student=Student::where('id', $request->student_id)->first();
        if(isset($request->password))
        {
            $student->password=Hash::make($request->password);
        }
        if($request->hasFile('image_uploaded')){
            $student->passport=$image_to_store;
        }
        if($student->save()){
            return view('learner.profile')->withStudent($student)->with('success', 'Updated successfully..');
        }
        
    }
}
