@extends('layouts.manage')
@permission('create-classes')
@section('content')
<div class="container">
<div class="row">
<h2>You are creating a class</h2>
</div>
<hr>

<form action="{{route('theclasses.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-center align-items-center">
            <button class="btn btn-outline-info the_submit">Create Class</button>
    </div>
    <div class="row">
    
    <div class="col-md-6">
<div class="form-group row mx-auto">
<label for="class_name" class="col-form-label col-md-4">Class Name</label>
<input type="text" class="form-control col-md-8" name="class_name">
</div>
<div class="form-group row mx-auto">
<label for="class_code" class="col-form-label col-md-4">Class Code</label>
<input type="text" class="form-control col-md-8" name="class_code">
</div>
<div class="form-group row mx-auto">
<label for="description" class="col-form-label col-md-4">Class Description</label>
<input type="text" class="form-control col-md-8" name="description">
</div>
<div class="form-group row mx-auto">
<label for="year" class="col-form-label col-md-4">Year</label>
<input type="text" class="form-control col-md-8" name="year">
</div>

</div>
<div class="col-md-6">
    <input type="text" :value="the_course" name="course_id" hidden>
    <em> <b> Which course is the class in? </b></em>
@foreach($courses as $course)
<div class="custom-control custom-radio">
<input  id="{{$course->id}}" type="radio" v-model="the_course" name="the_course" class="custom-control-input" value="{{$course->id}}">
<label for="{{$course->id}}" class="custom-control-label">{{$course->name}}</label>
</div>
@endforeach
</div>
</div>

</form>
</div>
@endsection
@section('script')
<script>
var app = new Vue({
el: '#app',
data: {
 the_course: ''
}
});
</script>
@endsection
@endpermission