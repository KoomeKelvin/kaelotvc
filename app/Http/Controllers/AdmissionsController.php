<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Course;
use App\Student;
use App\Post;
use App\Fee;

class AdmissionsController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth:student');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $course_id=Auth::guard('student')->user()->course_id;
        $course= Course::where('id', $course_id)->first();
        $student_id=Auth::guard('student')->user()->id;
        $student_name=Auth::guard('student')->user()->full_name;
        if($fees_structure=Post::where('type', 'Other')->first()){
            $fees_structure=$fees_structure->image_uploaded;
        }else{
            $fees_structure="";
        }
        $admission_documents=array();
        $admission_documents[0]=$student_id;
        $admission_documents[1]=preg_replace('/\s+/', '_', $student_name);
        $admission_documents[2]=$fees_structure;
        $admission_documents[3]=$course->admission_letter;

        return view('learner.admissions.index')->with('admission_documents', $admission_documents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'fees_receipt'=>'required|max:1999'
        ]);
        $name=Auth::guard('student')->user()->full_name;
        $student_name=preg_replace('/\s+/', '_', $name);
        
        if($request->hasFile('fees_receipt'))
        {
            // Get file name and extension
            $file_name_and_extension=$request->file('fees_receipt')->getClientOriginalName();
            // Get file name
            $file_name=pathinfo($file_name_and_extension, PATHINFO_FILENAME);
            // Get extension
            $extension=$request->file('fees_receipt')->getClientOriginalExtension();
            // path to store in database
            $path_to_store=$file_name.'_'.$student_name.time().'_'.$extension;
            $storage=$request->file('fees_receipt')->storeAs('/public/student/paymentreceipt', $path_to_store);
        }
        else{
            $path_to_store='';
        }
        $student_id=Auth::guard('student')->user()->id;
        $fee= new Fee();
        $fee->location=$path_to_store;
        $fee->student_id=$student_id;
        if($fee->save())
        {
            return redirect()->route('admissions.show', $fee->id)->with('success', 'Saved, an admission number will be assigned to you shortly!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $fee= Fee::find($id);
        return view('learner.admissions.show')->withFee($fee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
