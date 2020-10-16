<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mark;
use App\Unit;
use App\Theclass;
use App\Student;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $classes=Theclass::orderBy('id', 'desc')->paginate(6);
     return view('manage.marks.index')->withClasses($classes);
    
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
     * search for a class 
     */
    public function searchClass(Request $request){
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
        return view('manage.marks.search_items')->with(compact('search_items'));
        }
        
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
            'term'=>'required|max:255',
            'unit'=>'required|max:255'
        ]);
       
   $students=Student::where('class_id', $request->class)->get();
   foreach($students as $student)
   {
    $request = request();
    $value = request('cat'.$student->id, $default = null);
    $value1 = request('endterm'.$student->id_no, $default = null);
    $mark= Mark::where('unit_id', $request->unit)->where('markable_id', $student->id)->where('term', $request->term)->first();
       if(!empty($value) && empty($mark))
       {
            $mark=new Mark();
            $mark->markable_id=$student->id;
            $mark->markable_type="App\Student";
            $mark->cat=  $value;
            $mark->endterm=$value1;
            $mark->term=$request->term;
            $mark->unit_id=$request->unit;  
            $mark->save();
        }
    }
    return redirect()->route('marksheet_view', [$request->unit, $request->class]);
}
public function marksheet_view($id, $class_id){
 $students=Student::where('class_id', $class_id)->with('marks')->get();
 $unit=Unit::where('id', $id)->first();
 $class=Theclass::where('id', $class_id)->first();
return view ('manage.marks.marksheet_view')->withStudents($students)->withUnit($unit)->withClass($class);
}

public function marksentry(Request $request){
    $students=Student::where('class_id', $request->class_id)->with('marks')->get();
    $unit=Unit::where('id', $request->unit_id)->first();
   $class=Theclass::where('id', $request->class_id)->first();
   $term=$request->term;
   return view ('manage.marks.marksentry_view')->withStudents($students)->withUnit($unit)->withClass($class)->withTerm($term);
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
     
        $class=Theclass::where('id', $id)->with('units')->first();
        return view('manage.marks.show')->withClass($class);
    }
    public function marksheet($id, $class_id)
    {
        $students=Student::where('class_id', $class_id)->get();
        $unit=Unit::where('id', $id)->first();
        $class=Theclass::where('id', $class_id)->first();
        return view('manage.marks.marksheet')->withStudents($students)->withUnit($unit)->withClass($class);
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
    public function checkMarksEntered(Request $request){
       
        $unitid=$request->unitid;
        $classid=$request->classid;
        $term= $request->term;
        $marks= Mark::where([['unit_id', $unitid], ['term', $term]])->get();
        //return json_encode($marks);
        return view('manage.marks.enteredmarks')->with(compact('marks'));
    }
}
