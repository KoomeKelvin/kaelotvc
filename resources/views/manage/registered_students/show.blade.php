@extends('layouts.manage')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Student Details</h3>
        </div>
        <div class="col-md-4 d-flex justify-content-end align-items-start">
        <a href="{{route('students.edit', $student->id)}}" class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>
        </div>
    </div>
    <hr class="mb-0">
    <div class="row">
        <div class="col md-6">
    
    <form>
<div class="form-group row">
        <label for="student_image" class="col-sm-5 col-form-label col-form-label-lg">Student Image</label>
    <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="student_image"> 
    <img style="width:auto; height:100px;" src="/storage/student/passport/{{$student->passport}}" alt="samburuTTI">    
    </p>
    </div> <br> <br>
<div class="form-group row">
    <label for="id_no" class="col-sm-5 col-form-label col-form-label-lg"> Passport / ID / Birth Cert. No</label>
<p class="form-control-plaintext  col-sm-5 form-control-lg" id="id_no"><em>{{$student->id_no}}</em></p>
</div>
<div class="form-group row">
    <label for="full_name" class="col-sm-5 col-form-label col-form-label-lg">Full Name</label>
<p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="full_name"><em>{{$student->full_name}}</em></p>
</div>
<div class="form-group row">
        <label for="gender" class="col-sm-5 col-form-label col-form-label-lg">Gender</label>
    <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="gender"><em>{{$student->gender}}</em></p>
    </div>
    <div class="form-group row">
            <label for="phone_no" class="col-sm-5 col-form-label col-form-label-lg">Phone Number</label>
        <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="phone_no"><em>{{$student->phone_no}}</em></p>
        </div>
        <div class="form-group row">
                <label for="email" class="col-sm-5 col-form-label col-form-label-lg">Email</label>
            <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="email"><em>{{$student->email}}</em></p>
            </div>
        <div class="form-group row">
                <label for="postal_address" class="col-sm-5 col-form-label col-form-label-lg">Postal Address</label>
            <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="postal_address"><em>{{$student->postal_address}}</em></p>
            </div>
        <div class="form-group row">
                <label for="county" class="col-sm-5 col-form-label col-form-label-lg">County</label>
            <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="county"><em>{{$student->county}}</em></p>
            </div>
            <div class="form-group row">
                    <label for="intake" class="col-sm-5 col-form-label col-form-label-lg">Intake</label>
                <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="intake"><em>{{$student->intake}}</em></p>
                </div>
           </form>
        </div>
        <div class="col-md-6">
            <form>
                    <div class="form-group row">
                            <label for="course_taken" class="col-sm-5 col-form-label col-form-label-lg">Course Taken</label>
                        <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="course_taken"><em>{{$student->course->name}}</em></p>
                        </div>
                        <br>
        <div class="form-group row">
                <label for="kcse_index" class="col-sm-5 col-form-label col-form-label-lg">KCSE Index</label>
            <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="kcse_index"><em>{{$student->kcse_index}}</em></p>
            </div>
    <div class="form-group row">
            <label for="kcse_year" class="col-sm-5 col-form-label col-form-label-lg">KCSE Year</label>
        <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="kcse_year"><em>{{$student->kcse_year}}</em></p>
        </div>
        <div class="form-group row">
                <label for="kcse_meangrade" class="col-sm-5 col-form-label col-form-label-lg">KCSE Mean Grade</label>
            <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="kcse_meangrade"><em>{{$student->kcse_meangrade}}</em></p>
            </div>
            <div class="form-group row">
                    <label for="id_pic" class="col-sm-5 col-form-label col-form-label-lg">Id/ Birth Image / Document</label>
                <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="id_pic"> 
                <a href="/storage/student/id/{{$student->id_pic}}" target="_blank"> <i class="fa fa-download" aria-hidden="true"> Download National ID / Passport </i>
                        </a>   
                </p>
                </div>
        <div class="form-group row">
                <label for="kcse_pic" class="col-sm-5 col-form-label col-form-label-lg">KCSE Image / Document</label>
            <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="kcse_pic"> 
                    <a href="/storage/student/id/{{$student->kcse_pic}}" target="_blank"> <i class="fa fa-download" aria-hidden="true"> Download KCSE Image </i>
                    </a>   
            </p>
            </div>
            <div class="form-group row">
                <label for="nextofkin_phone" class="col-sm-5 col-form-label col-form-label-lg">Next-of-kin phone</label>
            <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="nextofkin_phone"><em>{{$student->nextofkin_phone}}</em></p>
            </div>
            <div class="form-group row">
                <label for="kcpe_index" class="col-sm-5 col-form-label col-form-label-lg">K.C.P.E index</label>
            <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="kcpe_index"><em>{{$student->kcpe_index}}</em></p>
            </div>
            <div class="form-group row">
                <label for="kcpe_year" class="col-sm-5 col-form-label col-form-label-lg">K.C.P.E year</label>
            <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="kcpe_year"><em>{{$student->kcpe_year}}</em></p>
            </div>
            <div class="form-group row">
                <label for="kcpe_pic" class="col-sm-5 col-form-label col-form-label-lg">KCPE Image / Document</label>
            <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="kcpe_pic"> 
                    <a href="/storage/student/kcpe/{{$student->kcpe_pic}}" target="_blank"> <i class="fa fa-download" aria-hidden="true"> Download KCPE Image </i>
                    </a>   
            </p>
            </div>

            </form>

        </div>
    </div>
</div>

@endSection