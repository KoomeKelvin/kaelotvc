@extends('layouts.manage')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Manage Courses</h3>
        </div>
        <div class="col-md-4 d-flex justify-content-between align-items-start">
            <form action="{{route('search.courses')}}" method="POST">
                {{csrf_field()}}
                <div class="input-group">
                <input type="text" name="search_item" placeholder="search" class="form-control">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </span>
            </div>
            </form>
        <a href="{{route('courses.create')}}" class="btn btn-info"><i class="fa fa-user-plus"></i>Create</a>
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
       <th>EXAMINING BODY</th>
       <th>view</th>
       <th>Edit</th>
       <th>Delete</th>
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
        <td><a href="{{route('courses.show', $course->id)}}" class="btn btn-outline-info"><i class="fa fa-binoculars"></i></a></td> 
        <td><a href="{{route('courses.edit', $course->id)}}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a></td>
        <td>
            @permission('delete-courses')
            <form action="{{route('courses.destroy', $course->id)}}">
        <input type="hidden" name="_method" value="DELETE">
        {{csrf_field()}}
        <button type="submit" class="btn btn-outline-info"><i class="fa fa-trash"></i></button>
        </form>
            @endpermission</td>
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