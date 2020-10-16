<?php

namespace App\Http\Controllers;
use App\Course;
use Illuminate\Http\Request;
use Session;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function __construct()
{
$this->middleware('auth', ['except'=>'index, show']);
}    



public function index()
    {
        //
        $courses=Course::orderBy('id', 'asc')->paginate(6);
        return view('manage.courses.index')->withCourses($courses);

    }
    /**
     * search for courses 
     */
    public function searchCourses(Request $request)
    {
        $search=$request->search_item;
        if($search!=''){
        $search_items=Course::where('id', 'LIKE', '%'.$search.'%')
        ->orWhere('name', 'LIKE', '%'.$search.'%')
        ->orWhere('created_at', 'LIKE', '%'.$search.'%')
        ->orWhere('updated_at', 'LIKE', '%'.$request.'%')
        ->orWhere('duration', 'LIKE', '%'. $search.'%')
        ->orWhere('minimum_grade', 'LIKE', '%'. $search.'%')
        ->orWhere('examining_body', 'LIKE', '%'. $search.'%')
        ->paginate(6)
        ->setpath('');
        $search_items->appends(array('search'=>$request->search_item));
        return view('manage.courses.search_items')->with(compact('search_items'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('manage.courses.create');
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
            'course_name'=>'required|max:255|unique:courses,name',
            'department'=>'required|max:255',
            'course_type'=>'required|max:255',
            'duration'=>'required|max:255',
            'minimum_grade'=>'required|max:255',
            'examining_body'=>'required|max:255',
            'department'=>'required|max:255',
        ]);
    //   if($request->hasFile('admission_letter')){
    //       $admission_letter_with_extension=$request->file('admission_letter')->getClientOriginalName();
    //       $admission_letter_filename=pathinfo($admission_letter_with_extension, PATHINFO_FILENAME);
    //       $admission_letter_extension=$request->file('admission_letter')->getClientOriginalExtension();
    //       $admission_letter_to_store= $admission_letter_filename.'_'.time().'.'.$admission_letter_extension;
    //       $path=$request->file('admission_letter')->storeAs('/public/uploads/admissions', $admission_letter_to_store);

    //   }else{
    //     $admission_letter_to_store="noadmission_letter.docx";
    //   }
        $course= new Course();
        $course->name=$request->course_name;
        $course->type=$request->course_type;
        $course->duration=$request->duration;
        $course->minimum_grade=$request->minimum_grade;
        $course->examining_body=$request->examining_body;
        $course->department=$request->department;
        // $course->admission_letter=$admission_letter_to_store;
        if($course->save()){
            return redirect()->route('courses.show', $course->id)->with('success', 'saved');
        }
       return redirect()->route('courses.create')->with('danger', 'not saved!');
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
        $course=Course::where('id', $id)->first();
        return view('manage.courses.show')->withCourse($course);
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
        $course=Course::where('id', $id)->first();
        return view('manage.courses.edit')->withCourse($course);
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
        $request->validate([
            'course_name'=>'required|max:255|unique:courses,name,'.$id,
            'department'=>'required|max:255',
            'course_type'=>'required|max:255',
            'duration'=>'required|max:255',
            'minimum_grade'=>'required|max:255',
            'examining_body'=>'required|max:255',
            'department'=>'required|max:255',
        ]);
       
        // if($request->hasFile('admission_letter')){
        //     $admission_letter_with_extension=$request->file('admission_letter')->getClientOriginalName();
        //     $admission_letter_filename=pathinfo($admission_letter_with_extension, PATHINFO_FILENAME);
        //     $admission_letter_extension=$request->file('admission_letter')->getClientOriginalExtension();
        //     $admission_letter_to_store= $admission_letter_filename.'_'.time().'.'.$admission_letter_extension;
        //     $path=$request->file('admission_letter')->storeAs('/public/uploads/admissions', $admission_letter_to_store);
  
        // }else{
        //   $admission_letter_to_store="noadmission_letter.docx";
        //}
        $course= Course::findOrFail($id);
        $course->name=$request->course_name;
        $course->type=$request->course_type;
        $course->duration=$request->duration;
        $course->minimum_grade=$request->minimum_grade;
        $course->examining_body=$request->examining_body;
        $course->department=$request->department;
        // if($request->hasFile('admission_letter')){
        //     $course->admission_letter=$admission_letter_to_store;
        // }
       if($course->save()){
        return redirect()->route('courses.show', $course->id)->with('success', 'Successfully updated');
       }else{
           return redirect()->route('courses.edit')->with('danger', 'not updated');
       }
     
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
        $course=Course::find($id);
       if($course->delete()){
           return redirect()->route('courses.index')->with('success', 'deleted the course permanently!');
       }else{
        return redirect()->route('courses.index')->with('danger', 'failed to delete the course!!');
       }
        
    }
}
