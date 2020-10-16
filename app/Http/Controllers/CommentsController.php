<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Comment;
use Auth;
use App\Events\NewComment;

class CommentsController extends Controller
{

    public function index(Discussion $discussion)
    {
     return response()->json($discussion->comments()->with('student')->latest()->get());
    }
    public function store(Request $request, Discussion $discussion)
    {
        $comment=$discussion->comments()->create([
            'body'=>$request->body,
            'student_id'=>Auth::id()
        ]);
        $comment=Comment::where('id', $comment->id)->with('student')->first();
        broadcast(new NewComment($comment))->toOthers();
       return $comment->toJson();

    }
}
