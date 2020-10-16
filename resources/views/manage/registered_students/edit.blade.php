@extends('layouts.manage')
@permission('update-students')
@section('content')
<div class="container">
 
    <div class="row">
       <h3> You are Editing {{$student->full_name}} data</h3> 
    </div>
    <hr mb-0>

      
<form action="{{route('students.update', $student->id)}}" method="POST" enctype="multipart/form-data">
@csrf
{{method_field('PUT')}}
<div class="row">
<div class="col-md-6"> 
<div class="form-group row mx-auto">
<label for="id_no" class="col-form-label col-sm-5 ">ID Number / Birth Cert. No.</label>
<input type="text" class="form-control col-sm-5" id="id_no" name="id_no" value="{{$student->id_no}}">
</div>
<div class="form-group row mx-auto">
<label for="full_name" class="col-form-label col-sm-5 ">Full Name</label>
<input type="text" class="form-control col-sm-5" id="full_name" name="full_name" value="{{$student->full_name}}">
</div>
<div class="form-group row mx-auto">
<label for="gender" class="col-form-label col-sm-5 ">Gender</label>
    <select name="gender" id="gender" class="custom-select col-sm-5">
        <option selected disabled="disabled">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
<em>{{$student->gender}}</em>
</div>
<div class="form-group row mx-auto">
    <label for="phone_no" class="col-form-label col-sm-5 ">Phone Number</label>
    <input type="text" class="form-control col-sm-5" id="phone_no" name="phone_no" value="{{$student->phone_no}}">
</div>
<div class="form-group row mx-auto">
        <label for="email" class="col-form-label col-sm-5 ">Email</label>
        <input type="text" class="form-control col-sm-5" id="email" name="email" value="{{$student->email}}">
    </div>
    <div class="form-group row mx-auto">
            <label for="postal_address" class="col-form-label col-sm-5 ">Postal Address</label>
            <input type="text" class="form-control col-sm-5" id="postal_address" name="postal_address" value="{{$student->postal_address}}">
        </div>
        <div class="form-group row mx-auto">
            <label for="county" class="col-form-label col-sm-5 ">County</label>
                <select name="county" id="county" class="custom-select col-sm-5">
                    <option selected disabled="disabled">Select County</option>
                    <option value="Baringo">Baringo</option>
                    <option value="Bomet">Bomet</option>
                    <option value="Bungoma">Bungoma</option>
                    <option value="Busia">Busia</option>
                    <option value="Elgeyo-Marakwet">Elgeyo Marakwet</option>
                    <option value="Embu">Embu</option>
                    <option value="Garissa">Garissa</option>
                    <option value="Homa-Bay">Homa Bay</option>
                    <option value="Isiolo">Isiolo</option>
                    <option value="Kajiado">Kajiado</option>
                    <option value="Kakamega">Kakamega</option>
                    <option value="Kericho">Kericho</option>
                    <option value="Kiambu">Kiambu</option>
                    <option value="Kilifi">Kilifi</option>
                    <option value="Kirinyaga">Kirinyaga</option>
                    <option value="Kisii">Kisii</option>
                    <option value="Kisumu">Kisumu</option>
                    <option value="Kitui">Kitui</option>
                    <option value="Kwale">Kwale</option>
                    <option value="Laikipia">Laikipia</option>
                    <option value="Lamu">Lamu</option>
                    <option value="Machakos">Machakos</option>
                    <option value="Makueni">Makueni</option>
                    <option value="Mandera">Mandera</option>
                    <option value="Marsabit">Marsabit</option>
                    <option value="Meru">Meru</option>
                    <option value="Migori">Migori</option>
                    <option value="Momabasa">Mombasa</option>
                    <option value="Murang'a">Murang'a</option>
                    <option value="Nairobi">Nairobi</option>
                    <option value="Nakuru">Nakuru</option>
                    <option value="Nandi">Nandi</option>
                    <option value="Narok">Narok</option>
                    <option value="Nyamira">Nyamira</option>
                    <option value="Nyandarua">Nyandarua</option>
                    <option value="Nyeri">Nyeri</option>
                    <option value="Samburu">Samburu</option>
                    <option value="Siaya">Siaya</option>
                    <option value="Taita-Taveta">Taita-Taveta</option>
                    <option value="Tana-River">Tana River</option>
                    <option value="Tharaka-Nithi">Tharaka-Nithi</option>
                    <option value="Trans-Nzoia">Trans Nzoia</option>
                    <option value="Turkana">Turkana</option>
                    <option value="Uasin-Gishu">Uasin Gishu</option>
                    <option value="Vihiga">Vihiga</option>
                    <option value="Wajir">Wajir</option>
                    <option value="West-Pokot">West Pokot</option>
                </select>
            <em>{{$student->county}}</em>
        </div> <br>
        <div class="form-group-control mx-auto">  
            <label for="passport" class="col-form-label col-sm-5">Passport image</label>
        <input type="file" name="passport" id="passport" class="col-sm-5">
        <p class="form-control form-control-lg col-sm-5 form-control-plaintext" id="student_image"> 
                <img style="width:auto; height:100px;" src="/storage/student/passport/{{$student->passport}}" alt="samburuTTI">    
                </p>
        </div>
        <br>  <br> <br>
        <div class="form-group row mx-auto">
                <label for="intake" class="col-form-label col-sm-5 ">Intake</label>
                    <select name="intake" id="intake" class="custom-select col-sm-5">
                        <option selected disabled="disabled">Select Intake</option>
                        <option value="January">January</option>
                        <option value="September">September</option>
                        <option value="July">July</option>
                        <option value="May">May</option>
                    </select>
                <em>{{$student->intake}}</em>
            </div>
<div class="form-group row mx-auto">
    <label for="kcse_index" class="col-form-label col-sm-5 ">K.C.S.E Index</label>
<input type="text" class="form-control col-sm-5" id="kcse_index" name="kcse_index" value="{{$student->kcse_index}}">
</div>
<div class="form-group row mx-auto">
        <label for="kcse_year" class="col-form-label col-sm-5 ">K.C.S.E Year</label>
        <input type="text" class="form-control col-sm-5" id="kcse_year" name="kcse_year" value="{{$student->kcse_year}}">
    </div>
        <div class="form-group row mx-auto">
            <label for="kcse_meangrade" class="col-form-label col-sm-5 ">K.C.S.E Mean Grade</label>
                <select name="kcse_meangrade" id="kcse_meangrade" class="custom-select col-sm-5">
                    <option selected disabled="disabled">Select KCSE Grade</option>
                    <option value="A">A</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="B-">B-</option>
                    <option value="C+">C+</option>
                    <option value="C">C</option>
                    <option value="C-">C-</option>
                    <option value="D+">D+</option>
                    <option value="D">D</option>
                    <option value="D-">D-</option>
                    <option value="E">E</option>
                </select>
            <em>{{$student->kcse_meangrade}}</em>
        </div>
        <div class="form-group-control mx-auto"> 
                <label for="id_pic" class="col-form-label col-sm-5">National ID Scanned image / pdf</label>
            <input type="file" name="id_pic" id="id_pic">
            <a href="/storage/student/id/{{$student->id_pic}}" target="_blank"> <i class="fa fa-download" aria-hidden="true"> Download National ID / Passport already in the system </i>
            </a> 
            </div>
            <br><br>
            <div class="form-group-control mx-auto">
                     
                    <label for="kcse_pic" class="col-form-label col-sm-5">K.C.S.E Scanned image / pdf</label>
        <input type="file" name="kcse_pic" id="kcse_pic">
        <a href="/storage/student/id/{{$student->kcse_pic}}" target="_blank"> <i class="fa fa-download" aria-hidden="true"> Download KCSE Image already in the system </i>
        </a>  
        </div>
        <div class="form-group row mx-auto">
            <label for="nextofkin_phone" class="col-form-label col-sm-5 ">Next-of-Kin Phone Number</label>
            <input type="text" class="form-control col-sm-5" id="nextofkin_phone" name="nextofkin_phone" value="{{$student->nextofkin_phone}}">
        </div>
        <div class="form-group row mx-auto">
            <label for="kcpe_index" class="col-form-label col-sm-5 ">K.C.P.E index</label>
            <input type="text" class="form-control col-sm-5" id="kcpe_index" name="kcpe_index" value="{{$student->kcpe_index}}">
        </div>
        <div class="form-group row mx-auto">
            <label for="kcpe_year" class="col-form-label col-sm-5 ">K.C.P.E year</label>
            <input type="text" class="form-control col-sm-5" id="kcpe_year" name="kcpe_year" value="{{$student->kcpe_year}}">
        </div>
        <div class="form-group-control mx-auto">  
            <label for="kcpe_pic" class="col-form-label col-sm-5">K.C.P.E Scanned image / pdf</label>
        <input type="file" name="kcpe_pic" id="kcpe_pic">
        <a href="/storage/student/kcpe/{{$student->kcpe_pic}}" target="_blank"> <i class="fa fa-download" aria-hidden="true"> Download KCPE Image already in the system </i>
        </a>  
        </div>


        <div class="form-group row mx-auto">
            <label for="dateofbirth" class="col-form-label col-sm-5 ">Date of birth</label>
            <input type="text" class="form-control col-sm-5" id="dateofbirth" name="dateofbirth" value="{{$student->dateofbirth}}">
        </div>
        <div class="form-group row mx-auto">
<label for="marital_status" class="col-form-label col-sm-5">Marital Status</label>
    <select name="marital_status" id="marital_status" class="custom-select col-sm-5">
        <option selected disabled="disabled">Select Marital Status</option>
        <option value="married">Married</option>
        <option value="single">Single</option>
    </select>
<em>{{$student->marital_status}}</em>
        </div>
        <div class="form-group row mx-auto">
                <label for="pry_sch" class="col-form-label col-sm-5 ">Primary School Attended</label>
        <input type="text" class="form-control col-sm-5" id="pry_sch" name="pry_sch" value="{{$student->pry_sch}}">
            </div>
            <div class="form-group row mx-auto">
                    <label for="sec_sch" class="col-form-label col-sm-5 ">Secondary School Attended</label>
            <input type="text" class="form-control col-sm-5" id="sec_sch" name="sec_sch" value="{{$student->sec_sch}}">
                </div>
                <div class="form-group row mx-auto">
                    <label for="sec_start" class="col-form-label col-sm-5 ">Year Started Secondary School</label>
                <input type="text" class="form-control col-sm-5" id="sec_start" name="sec_start" value="{{$student->sec_start}}">
                </div>
                <div class="form-group row mx-auto mt-5">
                        <label for="languages_spoken" class="col-form-label col-sm-5 ">Languages Spoken</label>
                        <input type="text" class="form-control col-sm-5" id="languages_spoken" name="languages_spoken" value="{{$student->languages_spoken}}">
                    </div>
        <div class="form-group row mx-auto">
        <label for="physically_challenged" class="col-form-label col-sm-5">Physically Challenged</label>
        <select name="physically_challenged" id="physically_challenged" class="custom-select col-sm-5">
            <option selected disabled="disabled">Physically Challenged?</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        <em>{{$student->physically_challenged}}</em>
            </div>
        <div class="form-group row mx-auto">
        <label for="sponser" class="col-form-label col-sm-5 ">Sponsor</label>
        <select name="sponser" id="sponser" class="custom-select col-sm-5">
            <option selected disabled="disabled">Sponsered by..?</option>
            <option value="KUCPPS">KUCPPS</option>
            <option value="Self-Sponsered">SELF</option>
        </select>
        <em>{{$student->sponser}}</em>
            </div>
        <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" v-model="parents_status" name="parents_status" id="living" value="living">
        <label for="living" class="custom-control-label">All parents living</label>
        </div>
        <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" v-model="parents_status" name="parents_status" id="one-parent-living" value="one-parent-living">
        <label for="one-parent-living" class="custom-control-label">One parent living</label>
        </div>
        <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" v-model="parents_status" name="parents_status" id="no-parent-living" value="no-parent-living">
        <label for="no-parent-living" class="custom-control-label">No parent living</label>
        </div>
        <input type="text"  class="mt-2 form-control col-sm-10"  placeholder="mother's name"  name="mother_info" v-if="parents_status=='living'">
        <input type="text"  class="mt-2 form-control col-sm-10"  placeholder="father's name" name="father_info" v-if="parents_status=='living'">
        <input type="text"  class="mt-2 form-control col-sm-10"  placeholder="mother's name or mother's death cert No."  name="mother_info" v-if="parents_status=='one-parent-living'">
        <input type="text"  class="mt-2 form-control col-sm-10"  placeholder="father's name or mother's death cert No." name="father_info" v-if="parents_status=='one-parent-living'">
        <input type="text"  class="mt-2 form-control col-sm-10"  placeholder="mother's death cert No."  name="mother_info" v-if="parents_status=='no-parent-living'">
        <input type="text"  class="mt-2 form-control col-sm-10"  placeholder="father's death cert No." name="father_info" v-if="parents_status=='no-parent-living'">
        <em>Mother's info: {{$student->mother_info}}</em>
        <em>Father's info: {{$student->father_info}}</em>

        <hr>
        <div class="form-group-control mx-auto">
            <p class="text-success text-center font-weight-bold"> 
                <i class="fa fa-check"></i> <i class="fa fa-check"></i>  <u>ADMIT </u> <i class="fa fa-check"></i> <i class="fa fa-check"></i>
            </p>
        </div>
        <div class="form-group-control mx-auto">  
            <label for="alfees_payment" class="col-form-label col-sm-5">Admission Payment </label>
        <input type="file" name="alfees_payment" id="alfees_payment">
        <a href="/storage/student/paymentreceipt/{{$student->alpaymentreceipt}}" target="_blank"> <i class="fa fa-download" aria-hidden="true"> Download Fees Payment Receipt already in the system </i>
        </a>  
        </div>
      
        <div class="form-group-control mx-auto">  
            <label for="fees_payment" class="col-form-label col-sm-5">Fees Payment</label>
        <input type="file" name="fees_payment" id="fees_payment">
        @foreach($fees as $fee)  
        <a href="/storage/student/paymentreceipt/{{$fee->location}}" target="_blank"> <i class="fa fa-download" aria-hidden="true"> Download Fees Payment Receipt already in the system </i>
        </a>  
        @endforeach
        </div>

        <div class="form-group row mx-auto">
            <label for="fee_description" class="col-form-label col-sm-5 ">Fees Description</label>
        <input type="text" class="form-control col-sm-5" id="fee_description" name="fee_description" value="E.g. Term one 2020 Fees">
        </div>
        <div class="form-group row mx-auto">
            <label for="fee_amount" class="col-form-label col-sm-5 ">Fees Amount</label>
        <input type="text" class="form-control col-sm-5" id="fee_amount" name="fee_amount" value="e.g. 15000">
        </div>
    <p class="text-danger">The last Adm No Was:{{$adm}}</p>
        <div class="form-group row mx-auto">
                <label for="admission_number" class="col-form-label col-sm-5 ">Admission Number</label>
            <input type="text" class="form-control col-sm-5" id="sec_start" name="admission_number" value="{{$student->admission_number}}">
        </div>
    <div class="form-group row mx-auto">
            <label for="admittedon" class="col-form-label col-sm-5 ">Admitted On</label>
            <input type="text" class="form-control col-sm-5" id="admittedon" name="admittedon" value="{{$student->admitted_on}}">
    </div>
        <hr>
    <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="student_password" name="student_password">
        <label for="student_password" class="custom-control-label ">Check to give student a password as their email <b>NB!</b><em> after successful admission</em> so to have access to the student portal</label>
    </div>

            </div>
    <div class="col-md-6">
        <em> <b>
            Course registered </b></em>
            @if(count($courses)>0)
        @foreach($courses as $course)
            <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input"  v-model="course_taken" name="course_taken"  id="{{$course->id}}" value="{{$course->id}}">
                    <label for="{{$course->id}}" class="custom-control-label">{{$course->name}}</label>
                </div>
                @endforeach
                @endif
                <hr>
                <div class="form-group-row">
                        <em> <b>Class </b></em>
   @if(count($classes)> 0)            
 @foreach($classes as $class)
<div class="custom-control custom-radio">
<input type="radio" class="custom-control-input"  v-model="student_class" name="student_class"  id="{{$class->code}}" value="{{$class->id}}">
        <label for="{{$class->code}}" class="custom-control-label">{{$class->class_name}}</label>
    </div>
    @endforeach 
@endif
</div>
            
    </div>

        <button class="btn btn-block btn-outline-info the_submit">Edit Info</button>                  
                </div>
        @endsection
        @section('script')
    <script>
        var app= new Vue({
        el:'#app',
        data:{
        course_taken:{!! $student->course->id  !!},
        parents_status : 'living',
        student_class: ''
        }
        });
            </script>
    
        <script>
            $('#dateofbirth').datepicker({
        format:'yyyy-mm-dd',
        autoclose: true
            });
            $('#admittedon').datepicker({
        format:'yyyy-mm-dd',
        autoclose: true
            });
        </script>

                @endsection
                @endpermission