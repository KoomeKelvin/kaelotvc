@extends('layouts.manage')
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-4">
        <a href="{{route('elimishafeedback', $discussion->unit_id)}}" class="btn btn-info"><i class="fa fa-arrow-left"> &nbsp; Go Back</i></a>
    </div>
    <div class="col-md-8">
    <h3>Comments for {{$discussion->title}}</h3>
    </div>
</div>
<hr>
   <div class="jumbotron">
    <h1>{{$discussion->title}}</h1>
    <h5> <em> Posted by Teacher {{$discussion->user->name}} on {{$discussion->created_at->toFormattedDateString()}} </em></h5>
    <p>{!!$discussion->body!!}</p>
    <hr>
    @if(!empty($comments))
@foreach($comments as $comment)
    <div class="comment-wrap">   
        <img src="/storage/student/passport/{{$comment->student->passport}}" alt="No image" class="image-wrap">
           <div class="author-wrap">
               <h4>{{$comment->student->full_name}} </h4>
           <p class="author-time">{{$comment->created_at->toFormattedDateString()}}</p>
           </div>
        <h4 class="author-comment">{{$comment->body}}</h4>
    </div>
@endforeach
<div class="row justify-content-center">
    {{$comments->links()}}
</div>
@endif
</div>
</div>

@endsection