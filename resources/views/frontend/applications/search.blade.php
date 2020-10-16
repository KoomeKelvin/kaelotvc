@extends('layouts.frontend')
@section('content')
<div class="container">
    @if(isset($courses))
    <div class="row">
        <div class="col-md-8">
            <h3><em class="text-success">Search results</em></h3>
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
       <th>type</th>
       <th>duration</th>
       <th>minimum grade</th>
       <th>subject considered</th>
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
        <td>{{$course->subjects_considered}}</td>
        <td><a href="{{route('frontend.apply', $course->id)}}"><i class="fa fa-laptop fa-2x"></i></a></td> 
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>
{{$courses->appends(Request::except('page'))->links()}}
@else
<em class="text-danger">{{$message}}</em>
@endif
</div>


@endSection