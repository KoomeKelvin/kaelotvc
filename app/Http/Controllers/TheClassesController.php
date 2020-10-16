<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theclass;
use App\Course;
class TheClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classes=TheClass::orderBy('id', 'desc')->with('course')->paginate(6);
        return view('manage.classes.index')->withClasses($classes);
    }

    /**
     * 
     *code to search for classes 
     */
    public function searchClasses(Request $request)
    {
        $search=$request->search_item;
        if($search!=''){
        $search_items=Theclass::where('id', 'LIKE', '%'.$search.'%')
        ->orWhere('class_name', 'LIKE', '%'.$search.'%')
        ->orWhere('created_at', 'LIKE', '%'.$search.'%')
        ->orWhere('updated_at', 'LIKE', '%'.$request.'%')
        ->orWhere('code', 'LIKE', '%'. $search.'%')
        ->orWhere('description', 'LIKE', '%'. $search.'%')
        ->orWhereHas('course', function($q) use($search){
            return $q->where('name', 'LIKE', '%'.$search.'%');
        })
        ->paginate(6)
        ->setpath('');
        $search_items->appends(array('search'=>$request->search_item));
        return view('manage.classes.search_items')->with(compact('search_items'));
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
        $courses=Course::all();
        return view('manage.classes.create')->withCourses($courses);
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
    'class_name'=>'required|max:255',
    'class_code'=>'required|max:255|unique:theclasses,code',
    'description'=>'required|max:255',
    'year'=>'required|max:255',
    'course_id'=>'required|max:255'
]);
$class=new Theclass();
$class->class_name=$request->class_name;
$class->code=$request->class_code;
$class->description=$request->description;
$class->year=$request->year;
$class->course_id=$request->course_id;
if($class->save()){
    return redirect()->route('theclasses.show', $class->id);
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
    $class=Theclass::where('id', $id)->first();
    return view('manage.classes.show')->withClass($class);
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
        $courses=Course::all();
        $class=Theclass::find($id);
        return view('manage.classes.edit')->withClass($class)->withCourses($courses);
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
            'class_name'=>'required|max:255',
            'class_code'=>'required|max:255|unique:theclasses,code,'.$id,
            'description'=>'required|max:255',
            'year'=>'required|max:255',
            'course_id'=>'required|max:255'
        ]);
        $class=Theclass::findorFail($id);
        $class->class_name=$request->class_name;
        $class->code=$request->class_code;
        $class->description=$request->description;
        $class->year=$request->year;
        $class->course_id=$request->course_id;
        if($class->save()){
            return redirect()->route('theclasses.show', $class->id);
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
        $class=TheClass::where('id', $id)->first();
        if($class->delete())
        {
            return redirect()->route('theclasses.index')->with('success', 'record deleted permanently!!');
        }  else{
            return redirect()->route('theclasses.index')->with('danger', 'Failed to delete!!');
        }
        
    }
}
