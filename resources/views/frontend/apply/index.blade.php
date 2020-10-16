@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row">
       <h3 class="list-header"> You are applying for {{$course->name}}</h3> 
    </div>
    <hr mb-0>
    <div class="row course_application">
<form action="{{route('application.submission')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row mx-auto">
            <label for="id_no" class="col-form-label col-sm-2 ">ID Number / Birth Cert. No.</label>
            <input type="text" class="form-control col-sm-10" id="id_no" name="id_no">
        </div>
        <div class="form-group row mx-auto">
                <label for="full_name" class="col-form-label col-sm-2 ">Full Name</label>
                <input type="text" class="form-control col-sm-10" id="full_name" name="full_name">
            </div>
<div class="form-group row mx-auto">
        <label for="gender" class="col-form-label col-sm-2 ">Gender</label>
            <select name="gender" id="gender" class="custom-select col-sm-10">
                <option selected disabled="disabled">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        
</div>
    <div class="form-group row mx-auto">
            <label for="phone_no" class="col-form-label col-sm-2 ">Phone Number</label>
            <input type="text" class="form-control col-sm-10" id="phone_no" name="phone_no">
        </div>
        
        <div class="form-group row mx-auto">
                <label for="email" class="col-form-label col-sm-2 ">Email</label>
                <input type="text" class="form-control col-sm-10" id="email" name="email">
            </div>
            <div class="form-group row mx-auto">
                    <label for="postal_address" class="col-form-label col-sm-2 ">Postal Address</label>
                    <input type="text" class="form-control col-sm-10" id="postal_address" name="postal_address">
                </div>
                <div class="form-group row mx-auto">
                    <label for="nextofkin_phone" class="col-form-label col-sm-2 ">Parent's / Next-of-Kin Phone Number</label>
                    <input type="text" class="form-control col-sm-10" id="nextofkin_phone" name="nextofkin_phone">
                </div>
                <div class="form-group row mx-auto">
                    <label for="county" class="col-form-label col-sm-2 ">County</label>
                        <select name="county" id="county" class="custom-select col-sm-10">
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
                    
                </div>
                <div class="form-group-control mx-auto">
                    <label for="passport" class="col-form-label col-sm-2">Passport image</label>
                <input type="file" name="passport" id="passport">
                </div>
                <hr>
                <div class="form-group-control mx-auto">
                    <label for="alpaymentreceipt" class="col-form-label col-sm-8"><b>Upload a Scanned 
                        Receipt showing payment for KES. 300 for admission letter</b>
                        <em>[PAY TO EQUITY BANK  - A/C NO ]</em></label>
                <input type="file" name="alpaymentreceipt" class="col-form-label col-sm-2" id="alpaymentreceipt">
                </div>
                <hr>
                <div class="form-group row mx-auto">
                        <label for="intake" class="col-form-label col-sm-2 ">Intake</label>
                            <select name="intake" id="intake" class="custom-select col-sm-10">
                                <option selected disabled="disabled">Select Intake</option>
                                <option value="January">January</option>
                                <option value="September">September</option>
                                <option value="July" disabled>July</option>
                                <option value="May" disabled>May</option>
                            </select>
                    </div>
<div class="form-group row mx-auto">
    <label for="kcse_index" class="col-form-label col-sm-2 ">K.C.S.E Index</label>
    <input type="text" class="form-control col-sm-6" id="kcse_index" name="kcse_index">
    <span class="col-sm-4"> <em>example: 15327104087</em></span>
</div>
<div class="form-group row mx-auto">
        <label for="kcse_year" class="col-form-label col-sm-2 ">K.C.S.E Year</label>
        <input type="text" class="form-control col-sm-10" id="kcse_year" name="kcse_year">
    </div>
        <div class="form-group row mx-auto">
            <label for="kcse_meangrade" class="col-form-label col-sm-2 ">K.C.S.E Mean Grade</label>
                <select name="kcse_meangrade" id="kcse_meangrade" class="custom-select col-sm-10">
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
            
        </div>
        <div class="form-group-control mx-auto">
                <label for="id_pic" class="col-form-label col-sm-2">National ID Scanned image / pdf</label>
            <input type="file" name="id_pic" id="id_pic">
            </div>
            <div class="form-group-control mx-auto">
                    <label for="kcse_pic" class="col-form-label col-sm-2">K.C.S.E Scanned image / pdf</label>
                <input type="file" name="kcse_pic" id="kcse_pic">

                </div>
                <div class="form-group row mx-auto">
                    <label for="kcpe_index" class="col-form-label col-sm-2 ">K.C.P.E Index</label>
                    <input type="text" class="form-control col-sm-6" id="kcpe_index" name="kcpe_index">
                    <span class="col-sm-4"> <em>example: 15327227005</em></span>
                </div>
                <div class="form-group row mx-auto">
                    <label for="kcpe_year" class="col-form-label col-sm-2 ">K.C.P.E Year</label>
                    <input type="text" class="form-control col-sm-10" id="kcpe_year" name="kcpe_year">
                    
                </div>
                <div class="form-group-control mx-auto">
                    <label for="kcpe_pic" class="col-form-label col-sm-2">K.C.P.E Scanned image / pdf</label>
                <input type="file" name="kcpe_pic" id="kcpe_pic">
                </div>
            <input type="text" class="form-control col-sm-10" value="{{$course->id}}" name="course_id" hidden>
            <div class="form-group row mx-auto">
                    <label for="dateofbirth" class="col-form-label col-sm-2 ">Date of birth</label>
                    <input type="text" class="form-control col-sm-10" id="dateofbirth" name="dateofbirth">
                </div>
                <div class="form-group row mx-auto">
        <label for="marital_status" class="col-form-label col-sm-2">Marital Status</label>
            <select name="marital_status" id="marital_status" class="custom-select col-sm-10">
                <option selected disabled="disabled">Select Marital Status</option>
                <option value="married">Married</option>
                <option value="single">Single</option>
            </select>
                </div>
                <div class="form-group row mx-auto">
                        <label for="pry_sch" class="col-form-label col-sm-2 ">Primary School Attended</label>
                        <input type="text" class="form-control col-sm-10" id="pry_sch" name="pry_sch">
                    </div>
                    <div class="form-group row mx-auto">
                            <label for="sec_sch" class="col-form-label col-sm-2 ">Secondary School Attended</label>
                            <input type="text" class="form-control col-sm-10" id="sec_sch" name="sec_sch">
                        </div>
                        <div class="form-group row mx-auto">
                                <label for="sec_start" class="col-form-label col-sm-2 ">Year Started Secondary School</label>
                                <input type="text" class="form-control col-sm-10" id="sec_start" name="sec_start">
                            </div>
                            <div class="form-group row mx-auto">
                                    <label for="languages_spoken" class="col-form-label col-sm-2 ">Languages Spoken</label>
                                    <input type="text" class="form-control col-sm-10" id="languages_spoken" name="languages_spoken">
                                </div>
        <div class="form-group row mx-auto">
                <label for="physically_challenged" class="col-form-label col-sm-2">Physically Challenged</label>
                    <select name="physically_challenged" id="physically_challenged" class="custom-select col-sm-10">
                        <option selected disabled="disabled">Physically Challenged?</option>
                        <option value="Yes"> Yes </option>
                        <option value="No">No</option>
                    </select>
                        </div>
        <div class="form-group row mx-auto">
                <label for="sponser" class="col-form-label col-sm-2 ">Sponsor</label>
                    <select name="sponser" id="sponser" class="custom-select col-sm-10">
                        <option selected disabled="disabled">Sponsered by..?</option>
                        <option value="SELF">Self Sponsored</option>
                        <option value="KUCPPS">KUCPPS </option>
                        <option value="NYS">NYS ( National Youth Service)</option>
                        <option value="AfDB">AfDB (Africa Develpment Bank)</option>
                        <option value="COUNTY">County </option>
                        <option value="CDF">CDF</option>
                    </select>
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
        <button class="btn btn-outline-info the_submit">Submit Application</button>
        </form>
    </div>

</div>
@endsection
@section('script')
<script>
        var app= new Vue({
        el: '#app',
        data:{
        parents_status : 'living'
        }
        });
        </script>
<script>
    $('#dateofbirth').datepicker({
format:'yyyy-mm-dd',
autoclose: true
    });
</script>


@endsection