<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kaelo Technical and Vocational College</title>

       <style>
           @page{
               margin:100px 25px;
               font-family:Arial, Helvetica, sans-serif;
               background-image: url('/storage/frontend/kaelotvclogo.png');
           }
           footer{
               position: fixed;
               bottom:-60px;
               left:0px;
               right:0px;
               height:50px;
           }
           #watermark{
               top:300px;
               bottom:300px;
               right:325px;
               left:225px;
               position:fixed;
               z-index: -200;
           }
        </style>
    </head>
    <body>
     <div class="row" style="text-align:center; margin:0 10px; margin-top:-40px;  align-items:center;">
        <div class="col-2">
            <img src="{{public_path().'/storage/frontend/kaelotvclogo.png'}}"  style="width:auto;  margin-left: 10px; height:80px;  margin-top:-40px; position:fixed;" alt="Laisamis Technical Training Institute">    
        </div>
       <div class="col-10" style="right:200px;">
        <h4 style="font-weight:900; margin:0; font-family:'Times New Roman', Times, serif; font-size:20px">KAELO TECHNICAL AND VOCATIONAL COLLEGE</h4> 
     <h3 style="font-size:16px; font-family:'Times New Roman', Times, serif; margin:0; font-weight:900;">P.O. BOX 262 - 60601, LAARE - MERU</h3> 
     <h5 style="margin:0; font-family:'Times New Roman', Times, serif;">TEL: +254 759 417 000</h5>  
     <h5 style=" margin:0; font-family:'Times New Roman', Times, serif;">Email: info@kaelotvc.ac.ke /kaelotechnical@gmail.com</h5>
        </div>
      <div class="col-2">
        <img src="{{public_path().'/storage/frontend/nationalemblem.png'}}"   style="width:auto; margin-left:650px; margin-top:-40px;  height:80px; position:fixed;" alt="Laisamis Technical Training Institute">
    </div>
    </div>
     <div class="row">
          <span><hr style="color:#62799D; background-color:#62799D; height:1.5px; margin-bottom:30px; float:left; width:735px; margin-left:0;">
           <br/>
           <div id="watermark">
            <img src="{{public_path().'/storage/frontend/kaelotvclogo.png'}}"  style="opacity:0.5; width:auto; height:200px;" alt="Laisamis Technical Training Institute">    
           </div>
    <h4 style="margin-top:50px;">TO: <em style="text-decoration: underline">{{$student->full_name}}</em> </h4>
        <h4>    ID No: <em stlye="text-decoration: underline"> {{$student->id_no}}</em> &nbsp; ADMISSION No:<em>{{$student->admission_number}}</em></h4>
   <div class="row">
    <img src="{{public_path().'/storage/student/passport/'.$student->passport}}" class="float-left" style="width:auto; height:70px;  margin-left:300px;" alt="{{$student->full_name}}">
   </div>
     
    <p>Congratulations! you that you have been offered an opportunity to undertake the course:
        <b>{{$student->course->name}} </b> Module 1/ Year 1  
    </p>
    <p>
        You are expected to report on ................................. and not later than ..........................
        between 8:00 am and 4:00 pm
    </p>
    <p>
        The duration of the course is specified in the brochure. Admission is subject to meeting all the admission requirements as specified.
    </p>
    <p>  
    You’re requested to clear the first terms fee as indicated on the fee statement attached on or before the reporting date
    </p>
    <p>
        <b>Note:</b> Make sure you are issued with a bank slip with correct amounts paid and present it on admission. 
        Cash and Personal Cheques shall not be accepted.
    </p>
        </div>
    <footer>
        <h4 style="text-align: center; margin-bottom:0;"> 
          Innovation for a better future
        </h4>
        <span><hr style="color:#62799D; background-color:#62799D; height:1.5px; margin-bottom:-10px; float:left; width:735px; margin-left:0;">
    </footer>
    </body>
</html>
