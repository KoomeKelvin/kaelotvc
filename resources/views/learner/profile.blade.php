@extends('layouts.student-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Profile</div>
                <div class="jumbotron">
                    <div class="form-group row justify-content-center">
                        <img  style="width:200px; height:200px; border-radius:50%;" src="/storage/student/passport/{{($student->passport!== null ? $student->passport : 'avatar.png')}}" alt="">
                    </div>
                <form action="{{route('student.profile.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        
                    <input type="text" name="student_id"  value="{{$student->id}}" hidden>
                        <div class="form-group row mx-auto">
                            <label for="password" class="form-control-label col-md-2">Change Password</label>
                            <input type="password" class="form-control col-md-10" >
                        </div>
                        <div class="form-group row mx-auto">
                            <label for="image" class="form-control-label col-md-2">Change Avatar</label>
                            <input type="file" name="image_uploaded" class="col-md-10">
                        </div>
                        <div class="form-group row justify-content-center">
                            <button class="btn btn-outline-info">Update</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
