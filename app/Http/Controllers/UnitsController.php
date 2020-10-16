<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Theclass;
class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $units=Unit::orderBy('id', 'desc')->paginate(6);
        return view('manage.units.index')->withunits($units);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    $classes= Theclass::all();
    return view('manage.units.create')->withClasses($classes);
  
    }
    public function search(Request $request)
    {
        $search=$request->search_item;
        if($search!=''){
        $search_items=Unit::where('id', 'LIKE', '%'.$search.'%')
        ->orWhere('id', 'LIKE', '%'.$search.'%')
        ->orWhere('created_at', 'LIKE', '%'.$search.'%')
        ->orWhere('updated_at', 'LIKE', '%'.$request.'%')
        ->orWhere('name', 'LIKE', '%'. $search.'%')
        ->orWhere('code', 'LIKE', '%'. $search.'%')
        ->orWhere('description', 'LIKE', '%'. $search.'%')
        ->orWhereHas('class', function($q) use($search){
            return $q->where('class_name', 'LIKE', '%'.$search.'%');
        })
        ->paginate(6)
        ->setpath('');
        $search_items->appends(array('search'=>$request->search_item));
        return view('manage.units.search_items')->with(compact('search_items'));
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
            'unit_name'=>'required|max:255',
            'code'=>'required|max:255',
            'description'=>'required|max:255',
            'theclass'=>'required|max:255'
        ]);
$unit=new Unit();
$unit->name=$request->unit_name;
$unit->code=$request->code;
$unit->description=$request->description;
$unit->class_id=$request->theclass;
if($unit->save()){
    return redirect()->route('units.show', $unit->id);
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
$unit=Unit::find($id);
return view('manage.units.show')->withUnit($unit);
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
        $classes=Theclass::all();
        $unit=Unit::find($id);
       
        return view('manage.units.edit')->withUnit($unit)->withClasses($classes);
        
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
        //yyy
        $request->validate([
            'unit_name'=>'required|max:255',
            'code'=>'required|max:255',
            'description'=>'required|max:255',
            'theclass'=>'required|max:255'
        ]);
      
$unit=Unit::findOrFail($id);
$unit->name=$request->unit_name;
$unit->code=$request->code;
$unit->description=$request->description;
$unit->class_id=$request->theclass;
if($unit->save()){
    return redirect()->route('units.show', $unit->id);
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
        $unit=Unit::find($id);
        if($unit->delete()){
            return redirect()->route('units.index')->with('success', 'deleted the unit permanently');
        } 
        else{
            return redirect()->route('units.index')->with('danger', 'Failed to delete!!');
        }
    }
}
