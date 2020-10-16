<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Unit;
use Auth;

class StudentDiscussionController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('auth:student');
    }
    public function getUnits()
    {
        $class_id=Auth::guard('student')->user()->class_id;
        $units=Unit::where('class_id', $class_id)->with(['discussions'])->get();
        return view('learner.techjibuclass.index')->withUnits($units);
    }
    public function getDiscussions($unit_id)
    {
        $discussions=Discussion::where('unit_id', $unit_id)->with('files')->paginate(10);
        return view('learner.techjibuclass.discussion')->withDiscussions($discussions);
    }
    public function getsingleDiscussions($id)
    {
        $discussion=Discussion::where('id', $id)->with('files')->first();
        return view('learner.techjibuclass.discussionfull')->withDiscussion($discussion);
    }
}
