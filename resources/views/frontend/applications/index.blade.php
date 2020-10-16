@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3 class="mt-10">Courses at Kaelo Technical and Vocational College</h3>
        </div>
        <div class="col-md-4">
        <form action="{{route('frontend.search')}}" method="POST" role="search" class="mt-2">
                {{csrf_field()}}
             <div class="input-group">
                 <input type="text" class="form-control" name="the_search" placeholder="search">
                 <span class="input-group-btn">
                     <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                 </span>
             </div>
        </form>
        </div>
    </div>
   
    <hr class="mb-0">
    <div class="card mb-5">
        <div class="card-content">
            <div class="table-responsive">
<table class="table table-sm">
    <thead class="thead-light">
        <tr>
       <th>Id</th>
       <th>Name </th>
       <th>Department</th>
       <th>Type</th>
       <th>Duration</th>
       <th>Minimum Grade</th>
       <th>Examining Body</th>
       <th>Apply</th>
      
    </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
        <td>{{$course->id}}</td> 
        <td>{{$course->name}}</td> 
        <td>{{$course->department}}</td>
        <td>{{$course->type}}</td> 
        <td>{{$course->duration}}</td> 
        <td>{{$course->minimum_grade}}</td> 
        <td>{{$course->examining_body}}</td>
        <td><a href="{{route('frontend.apply', $course->id)}}"><i class="fa fa-laptop fa-2x"></i></a></td> 
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>
{{$courses->links()}}
</div>


@endSection