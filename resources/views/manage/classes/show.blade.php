@extends('layouts.manage')
@permission('read-classes')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">

        </div>
        <div class="col-md-4 d-flex justify-content-end align-items-start">
        <a href="{{route('theclasses.edit', $class->id)}}" class="btn btn-info"><i class="fa fa-edit">Edit</i></a>
        </div>
    </div>
<form>
<div class="form-group row">
    <label for="class_name" class="col-form-label col-form-label-lg col-sm-2">Class Name</label>
<p class="form-control form-control-plaintext col-sm-10 form-control-lg" id="class_name">  <em>[{{$class->class_name}}]</em></p>
</div>
<div class="form-group row">
<label for="class_code" class="col-form-label col-form-label-lg col-sm-2">Class code</label>
<p class="form-control col-sm-10 form-control-plaintext form-control-lg" id="class_code"><em>[{{$class->code}}]</em></p>
</div>
<div class="form-group row">
<label for="class_description" class="col-form-label col-form-label-lg col-sm-2">Class Description</label>
<p class="form-control col-sm-10 form-control-plaintext form-control-lg" id="class_description"><em>[{{$class->description}}]</em></p>
</div>
<div class="form-group row">
<label for="year" class="col-form-label col-form-label-lg col-sm-2">Year</label>
<p class="form-control col-sm-10 form-control-plaintext  form-control-lg" id="year"><em>[{{$class->year}}]</em></p>
</div>
<div class="form-group row">
<label for="course_name" class="col-form-label col-form-label-lg col-sm-2">Course</label>
<p class="form-control col-sm-10 form-control-plaintext  form-control-lg" id="course_name"><em>[{{$class->course->name}}]</em></p>
</div>

</form>

</div>

@endSection
@endpermission