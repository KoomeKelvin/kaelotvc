<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Session;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles=Role::all();
        return view('manage.role.index')->withRoles($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions=Permission::all();
        return view('manage.role.create')->withPermissions($permissions);
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
            'full_name'=>'required|max:255',
            'abbreviation'=>'required|max:255|alphadash|unique:roles,name',
            'description'=>'sometimes|max:255'
        ]);
        $role= new Role();
        $role->name=$request->abbreviation;
        $role->display_name=$request->full_name;
        $role->description=$request->description;
        $role->save();
        //dd($role);
        if($request->permission_choosen){
            $role->syncPermissions(explode(',', $request->permission_choosen)); 
        }
        Session::flash('success', 'Successfully Created!');
        return redirect()->route('roles.show', $role->id);

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
        $role=Role::where('id', $id)->with('permissions')->first();
        return view('manage.role.show')->withRole($role);
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
        $role=Role::where('id', $id)->with('permissions')->first();
        $permissions= Permission::all();
        return view('manage.role.edit')->withRole($role)->withPermissions($permissions);
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
            'full_name'=>'required|max:255',
            'description'=>'sometimes|max:255'
        ]);
        $role= Role::findOrFail($id);
        $role->display_name=$request->full_name;
        $role->description=$request->description;
        $role->save();
        if($request->permission_choosen){
            $role->syncPermissions(explode(',', $request->permission_choosen)); 
        }
        Session::flash('success', 'Successfully updated!');
        return redirect()->route('roles.show', $id);

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
        $post=Role::find($id);
        if($post->delete()){
            return redirect()->route('roles.index')->with('success', 'Deleted role successfully!');
        }else{
            return redirect()->route('roles.index')->with('danger', 'Failed to delete Role!!');
        }
    }
}
