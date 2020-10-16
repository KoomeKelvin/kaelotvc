<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $files=File::orderBy('id', 'desc')->paginate(6);
        return view('manage.files.index')->withFiles($files);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('manage.files.create');
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
        "file_description"=>"max:255|required",
        "file_uploaded"=>"nullable|max:199"
        ]);
        if($request->hasFile('file_uploaded')){
            // get file name and extension
            // Get file extension
            // file to store in db
            $file_name_with_extension=$request->file('file_uploaded')->getClientOriginalName();
            $file_name=pathinfo($file_name_with_extension, PATHINFO_FILENAME);
            $extension=$request->file('file_uploaded')->getClientOriginalExtension();
            $image_to_store=$file_name.substr($request->file_description, 0, 10).time().$extension;
            $path=$request->file('file_uploaded')->storeAs('/public/AandStaff', $image_to_store);

        }else{
            $imagename_to_store='noimage.jpg';
        }
        $file= new File();
        $file->fileable_type="";
        $file->file_path= $image_to_store;
        $file->file_description=$request->file_description;
        if($file->save()){
            return redirect()->route('files.index')->with('success', 'saved, now assign the file to your profile or the discussion forum');
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
        $file=File::where('id', $id)->first();
        return view('manage.files.show')->withFile($file);
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
        $file=File::where('id', $id)->first();
        return view('manage.files.edit')->withFile($file);
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
            "file_description"=>"max:255|required",
            "file_uploaded"=>"nullable|max:199"
            ]);
            if($request->hasFile('file_uploaded')){
                // get file name and extension
                // Get file extension
                // file to store in db
                $file_name_with_extension=$request->file('file_uploaded')->getClientOriginalName();
                $file_name=pathinfo($file_name_with_extension, PATHINFO_FILENAME);
                $extension=$request->file('file_uploaded')->getClientOriginalExtension();
                $image_to_store=$file_name.substr($request->file_description, 0, 10).time().$extension;
                $path=$request->file('file_uploaded')->storeAs('/public/AandStaff', $image_to_store);
    
            }else{
                $imagename_to_store='noimage.jpg';
            }
            $file= File::find($id);
            $file->fileable_type="";
            if($request->hasFile('file_uploaded')){
                $file->file_path= $image_to_store;
            }
           
            $file->file_description=$request->file_description;
            if($file->save()){
                return redirect()->route('files.index')->with('success', 'updated, now assign the file to your profile or the discussion forum');
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
        $file=File::find($id);
        if($file->delete()){
            return redirect()->route('files.index')->with('success', 'Deleted!!');
        } else{
            return redirect()->route('files.index')->with('danger', 'Failed to delete!!');
        }
       
    }
}
