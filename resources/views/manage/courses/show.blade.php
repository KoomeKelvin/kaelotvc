@extends('layouts.manage')
@permission('read-courses')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Course Details</h3> &nbsp;
            <a href="{{route('courses.create')}}" class="btn btn-info"><i class="fa fa-edit"></i>Create</a>
        </div>
        <div class="col-md-4 d-flex justify-content-end align-items-start">
        <a href="{{route('courses.edit', $course->id)}}" class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>
        </div>
    </div>
    <hr class="mb-0">
    <form>
<div class="form-group row">
    <label for="course_name" class="col-sm-2 col-form-label col-form-label-lg">Course Name</label>
<p class="form-control-plaintext  col-sm-10 form-control-lg" id="course_name"><em>{{$course->name}}</em></p>
</div>
<div class="form-group row">
    <label for="course_type" class="col-sm-2 col-form-label col-form-label-lg">Course Type</label>
<p class="form-control form-control-lg col-sm-10 form-control-plaintext" id="course_type"><em>{{$course->type}}</em></p>
</div>
<div class="form-group row">
        <label for="department" class="col-sm-2 col-form-label col-form-label-lg">Department</label>
    <p class="form-control form-control-lg col-sm-10 form-control-plaintext" id="department"><em>{{$course->department}}</em></p>
    </div>
<div class="form-group row">
        <label for="duration" class="col-sm-2 col-form-label col-form-label-lg">Duration</label>
    <p class="form-control form-control-lg col-sm-10 form-control-plaintext" id="duration"><em>{{$course->duration}}</em></p>
    </div>
    <div class="form-group row">
            <label for="minimum_grade" class="col-sm-2 col-form-label col-form-label-lg">Minimum Grade</label>
        <p class="form-control-plaintext col-sm-10 form-control  form-control-lg " id="minimum_grade"><em>{{$course->minimum_grade}}</em></p>
        </div>
        <div class="form-group row">
                <label for="examining_body" class="col-sm-2 col-form-label col-form-label-lg">Examining Body</label>
            <p class="form-control form-control-lg col-sm-10 form-control-plaintext" id="examining_body"><em>{{$course->examining_body}}</em></p>
            </div>



    </form>
</div>



@endSection
@endpermission