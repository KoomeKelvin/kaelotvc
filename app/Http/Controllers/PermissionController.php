<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Session;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct(){
    //      $this->middleware('role:manager');
    // }
    public function index()
    {
        //
        $permissions= Permission::orderBy('id', 'desc')->paginate(9);
        return view('manage.permission.index')->withPermissions($permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('manage.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    if($request->permissions == 'general'){
        $this->validate($request, [
        'full_name'=> 'required|max:255',
        'abbreviation'=>'required|max:255|alphadash|unique:permissions,name',
        'description'=> 'sometimes|max:255'
        ]);
        $permission= new Permission();
        $permission->name=$request->abbreviation;
        $permission->display_name=$request->full_name;
        $permission->description=$request->description;
        $permission->save();
        return redirect()->route('permissions.show', $permission->id)->with('success', 'permission added successfully');
    }elseif($request->permissions == 'crud'){
            $this->validateWith([
            'privilege'=>'required|min:3|max:100|alpha'
            ]);
            $the_choosen=explode(',', $request->option_choosen);
            if(count($the_choosen)> 0){
                foreach($the_choosen as $y){
                    $abbreviation= strtolower($y).'-'.strtolower($request->privilege);
                    $full_name=ucwords($y. " ".$request->privilege);
                    $description="Allows a user to ".strtoupper($y). ' '.ucwords($request->privilege);
                    $permission= new Permission();
                    $permission->name=$abbreviation;
                    $permission->display_name=$full_name;
                    $permission->description=$description;
                    $permission->save();
                }
                 
                    return redirect()->route('permissions.show', $permission->id)->with('success', 'permission added successfully');    
            }
    }
    else{
        return redirect()->route('permission.create')->withInput();
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
        $permission=Permission::findOrFail($id);
        return view('manage.permission.show')->withPermission($permission);
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
        $permission=Permission::findOrFail($id);
        return view('manage.permission.edit')->withPermission($permission);
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
$this->validateWith([
'full_name'=>'required|max:255',
'description'=>'required|max:255'
]);
$permission=Permission::findOrFail($id);
$permission->display_name=$request->full_name;
$permission->description=$request->description;
$permission->save();
return redirect()->route('permissions.show', $id)->with('success', 'permission updated successfully');
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

    $permission=Permission::find($id);
    if($permission->delete()){
        return redirect()->route('permissions.index')->with('success', 'Deleted the Permission successfully!');  
    }else{
        return redirect()->route('permissions.index')->with('danger', 'Failed to delete the permission!!');
    }
    }
}
