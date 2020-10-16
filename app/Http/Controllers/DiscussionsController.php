<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Theclass;
use App\Unit;
use App\File;
use Purifier;
use Auth;
use App\Comment;

class DiscussionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $discussions = Discussion::orderBy('id', 'desc')->with('files')->paginate(6);
        return view('manage.discussions.index')->withDiscussions($discussions);
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
            "title"=>'max:255|required',
            'slug'=>'max:255|required',
            "discussionbody"=>"required",
            "file_uploaded"=>"nullable|max:1999"
            ]);
          
            if($request->hasFile('file_uploaded')){
                // get file name and extension
                // Get file extension
                // file to store in db
                $title=str_replace(' ', '_', $request->title);
                $file_name_with_extension=$request->file('file_uploaded')->getClientOriginalName();
                $file_name=pathinfo($file_name_with_extension, PATHINFO_FILENAME);
                $extension=$request->file('file_uploaded')->getClientOriginalExtension();
                $file_to_store=str_replace(' ' , '_', $file_name).substr($title, 0, 10).time().$extension;
                $path=$request->file('file_uploaded')->storeAs('/public/AandStaff', $file_to_store);
    
            }else{
                $file_to_store='nofile';
            }
            $discussion= new Discussion();
            $discussion->title=$request->title;
            $discussion->slug=$request->slug;
            $discussion->body=Purifier::clean($request->discussionbody);
            $discussion->unit_id=$request->unit_id;
            $discussion->user_id=Auth::user()->id;
            $discussion->save();
            $file= new File();
            $file->file_path=$file_to_store;
            $file->file_description=$request->title;
            $discussion->files()->save($file);
                return redirect()->route('discussion.index')->with('success', 'saved for students viewing!');


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
    // 
       // create index for elimisha
    public function elimisha($id)
    {
        // $class=TheClass::where('id', $class_id)->with('units')->first();
        $unit=Unit::where('id', $id)->with('class')->first();
        return view('manage.discussions.elimisha')->withUnit($unit);

    }
    public function uniqueSlug(Request $request){
       return json_encode(!Discussion::where('slug', $request->slug)->first());
    }
    //Feedback from Elimisha
    public function elimishaFeedback($id)
    {
        $unit=Unit::where('id', $id)->first();
        $discussions=Discussion::where('unit_id', $id)->with('comments')->get();
        return view('manage.discussions.elimishafeedback')->with(compact('discussions', 'unit'));

    }
    // Feedback for Elimisha comments
    public function elimishaComments($id)
    {
        // $class=TheClass::where('id', $class_id)->with('units')->first();
        $discussion=Discussion::where('id', $id)->first();
        $comments=Comment::where('discussion_id', $id)->orderBy('id', 'desc')->with('student')->paginate(20);
        return view('manage.discussions.elimishacomments')->with(compact('comments', 'discussion'));

    }

 
}
