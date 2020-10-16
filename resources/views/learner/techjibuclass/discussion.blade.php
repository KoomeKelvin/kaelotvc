@extends('layouts.student-app')
@section('content')
<div class="container">
    <div class="row mx-auto">
        <div class="col-md-12">
            @if(count($discussions)>0)
            @foreach($discussions as $discussion)
            <div class="jumbotron">
            <h1>{{$discussion->title}}</h1>
            <h5> <em> Posted by Teacher {{$discussion->user->name}} on {{$discussion->created_at->toFormattedDateString()}} </em></h5>
            @foreach($discussion->files as $file)
            <a href="/storage/AandStaff/{{$file->file_path}}" target="_blank">{{$file->file_path}} <i class="fa fa-download"></i></a>
            @endforeach
            <a class="btn btn-lg btn-outline-info" href="{{route('discussions.single', $discussion->id)}}"> Read more..<i class="fa fa-arrow-right"></i></a>
            </div>
        @endforeach
        @endif
    </div>
    <div class="col-md-5 d-flex justify-content-center">
        {{$discussions->links()}}
    </div>

</div>
</div>
@endsection