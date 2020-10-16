@extends('layouts.manage')
@permission('create-courses')
@section('content')
<div class="container">
    <div class="row">
            <h3>Create a new Course</h3>
    </div>
    <hr class="mb-o">
<form action="{{route('courses.store')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group row mx-auto">
    <label for="course_name" class="col-form-label col-sm-2 ">Course Name</label>
    <input type="text" class="form-control col-sm-10" id="course_name" name="course_name">
</div>
<div class="form-group row mx-auto">
        <label for="department" class="col-form-label col-sm-2 ">Department</label>
        <input type="text" class="form-control col-sm-10" id="department" name="department">
    </div>
<div class="form-group row mx-auto">
        <label for="course_type" class="col-form-label col-sm-2 ">Course Type</label>
            <select name="course_type" id="course_type" class="custom-select col-sm-10">
                <option selected>Select Course</option>
                <option value="Artisan">Artisan</option>
                <option value="Certificate">Certificate</option>
                <option value="Diploma">Diploma</option>
                <option value="Higher Diploma">Higher Diploma</option>
                <option value="NITA">NITA</option>
                <option value="Other">Other</option>
            </select>
       
    </div>
    <div class="form-group row mx-auto">
            <label for="duration" class="col-form-label col-sm-2 ">Duration</label>
            <input type="text" class="form-control col-sm-10" id="duration" name="duration">
        </div>
        <div class="form-group row mx-auto">
                <label for="minimum_grade" class="col-form-label col-sm-2 ">Minimum Grade</label>
                <input type="text" class="form-control col-sm-10" id="minimum_grade" name="minimum_grade">
            </div>
            <div class="form-group row mx-auto">
                    <label for="examining_body" class="col-form-label col-sm-2 ">Examining Body</label>
                    <input type="text" class="form-control col-sm-10" id="examining_body" name="examining_body">
                </div>
<button class="btn btn-outline-info the_submit">Create Course</button>
</form>
</div>
@endsection
@endpermission