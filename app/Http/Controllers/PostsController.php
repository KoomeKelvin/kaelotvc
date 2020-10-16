<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Purifier;
use Auth;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
// public function __construct()
// {
//     $this->middleware('auth', ['except'=> 'index, show']);
// }


    public function index()
    {
        //
        $post=Post::orderBy('id', 'asc')->paginate(9);
        return view('manage.posts.index')->withPosts($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('manage.posts.create');
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
            'type'=>'required|max:255',
            'title'=>'required|max:1000',
            'description'=> 'required|max:1000',
            'image_uploaded'=>'nullable|max:1999'
        ]);
            if($request->hasFile('image_uploaded')){
                //get file name and extension
            $file_name_and_extension=$request->file('image_uploaded')->getClientOriginalName();
            //get file name 
            $file_name=pathinfo($file_name_and_extension, PATHINFO_FILENAME);
            //get extension
            $extension=$request->file('image_uploaded')->getClientOriginalExtension();
            //file name to be stored
            $imagename_to_store=$file_name.'_'.time().'.'.$extension;
            $path=$request->file('image_uploaded')->storeAs('/public/uploads', $imagename_to_store);

            }
            else{
                $imagename_to_store='noimage.jpg';
            }
            $post= new Post();
            $post->type=$request->type;
            $post->title=Purifier::clean($request->title);
            $post->description=Purifier::clean($request->description);
            $post->image_uploaded=$imagename_to_store;
            $post->user_id=Auth::user()->id;
            if($post->save()){
                return redirect()->route('posts.show', $post->id)->with('success', 'saved');
            }
            return redirect()->route('posts.create')->with('danger', 'failed to save post');

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
        $post=Post::find($id);
        return view('manage.posts.show')->withPost($post);

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
$post=Post::find($id);
return view('manage.posts.edit')->withPost($post);
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
            'type'=>'required|max:255',
            'title'=>'required|max:255',
            'description'=> 'required|max:1000',
            'image_uploaded'=>'nullable|max:1999'
        ]);
if($request->hasFile('image_uploaded')){
    //get file name and extension
$file_name_and_extension=$request->file('image_uploaded')->getClientOriginalName();
//get file name 
$file_name=pathinfo($file_name_and_extension, PATHINFO_FILENAME);
//get extension
$extension=$request->file('image_uploaded')->getClientOriginalExtension();
//file name to be stored
$imagename_to_store=$file_name.'_'.time().'.'.$extension;
$path=$request->file('image_uploaded')->storeAs('/public/uploads', $imagename_to_store);

}
else{
    $imagename_to_store='noimage.jpg';
}
$post= Post::find($id);
$post->type=$request->type;
$post->title=Purifier::clean($request->title);
$post->description=Purifier::clean($request->description);
if($request->hasFile('image_uploaded')){
    $post->image_uploaded=$imagename_to_store;
}
$post->user_id=Auth::user()->id;
if($post->save()){
    return redirect()->route('posts.show', $post->id)->with('success', 'saved');
}
return redirect()->route('posts.edit', $post->id)->with('danger', 'failed to update post');



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
        $post=Post::find($id);
        if($post->delete()){
        return redirect()->route('posts.index')->with('success', 'Deleted the Post Permanently!');
    }
    else{
        return redirect()->route('post.index')->with('danger', 'Failed to delete!!');
    }
}
}
