<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kaelo Technical and Vocational College</title>

       <style>
           @page{
               margin:100px 25px;
               padding:0, 10px;
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
               left:225px;
               right:325px;
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
        <h4 style="font-weight:900; margin:0; font-size:20px">KAELO TECHNICAL AND VOCATIONAL COLLEGE</h4> 
     <h3 style="font-size:16px; margin:0; font-weight:900;">P.O. BOX 262 - 60601, LAARE- MERU</h3> 
     <h5 style="margin:0;">TEL: +254 759 417 000</h5>  
     <h5 style=" margin:0;">Email: info@kaelotvc.ac.ke kaelotechnical@gmail.com / </h5>
        </div>
      <div class="col-2">
        <img src="{{public_path().'/storage/frontend/nationalemblem.png'}}"   style="width:auto; margin-left:650px; margin-top:-40px;  height:80px; position:fixed;" alt="Laisamis Technical Training Institute">
    </div>
    </div>
     <div class="row">
          <hr style="color:#62799D; background-color:#62799D; height:1.5px; margin-bottom:30px; float:left; width:735px; margin-left:0;">
           <br/>
           <div id="watermark">
            <img src="{{public_path().'/storage/frontend/kaelotvclogo.png'}}"  style="opacity:0.5; width:auto; height:200px;" alt="Laisamis Technical Training Institute">    
           </div>
    <h4 style="margin-top:50px;">TO: <em style="text-decoration: underline">{{$student->full_name}}</em>
        ID No: <em stlye="text-decoration: underline"> {{$student->id_no}}</em>
     </h4>
   <div class="row">
    <img src="{{public_path().'/storage/student/passport/'.$student->passport}}" class="float-left" style="width:auto; height:70px;  margin-left:300px;" alt="{{$student->full_name}}">
   </div>
     <h4>RE: APPLICATION REQUEST</h4>
    <p>
        Hi, this is to acknowledge that we received your online application for the course
    <u>{{$student->course->name}}</u>on <u>{{$student->created_at->toFormattedDateString()}}</u>
    </p>
    <p>  
        Your application has been received. Please check back again in three days to download your admission letter with an admission number
    </p>
    <p>
        Please Note that:
    </p>
    <ul>
        <li>
            The data filled you filled during application shall be verified which will follow issuance of an admission letter 
        </li>
    </ul>
    <p style="text-decoration:underline; font-weight:bold"> COMPULSORY ITEMS</p>
    <p>
        On the day of admissions please bring the following items:-
    </p>
    <ol type="a">
        <li>
        Letter of admission 
        </li>
        <li>
        Originals and two (2) copies of each of the following documents
            <ul>
                <li style="font-weight:bold">
                    KCSE
                </li>
                <li style="font-weight:bold">
                    KCPE certificate for Artisan applicants
                </li>
                <li style="font-weight:bold">
                    School leaving Certificate
                </li>
                <li style="font-weight:bold">
                    Birth Certificate
                </li>
                <li style="font-weight:bold">
                    National Identity Card
                </li>
                <li style="font-weight:bold">
                    Medical Certificate Certificate
                </li>
                <li style="font-weight:bold">
                    Two passport size photographs
                </li>
                <li style="font-weight:bold">
                    Fees - see the attached fees structure
                </li>
            </ul>
        </li>
    </ol>
    <footer>
        <h4 style="text-align: center; margin-bottom:-10px;"> 
          Innovation for a better future
        </h4>
        <hr style="color:#62799D; background-color:#62799D; height:1.5px; margin-bottom:30px; float:left; width:735px; margin-left:0;">
    </footer>
    <p style="font-weight: bold; text-decoration:underline;">
        BOARDING AND ACCOMODATION
    </p>
    <p>
    The college currently does not offer any accommodation to the students 
    </p>
    <ol type="a">
       <li>
        Though the college will provide some library books, students are advised to buy some textbooks on their own to supplement the available books 
        </li>
        <li>
        Stationery will not be provided. Students are advised to provide for themselves enough writing materials
        </li> 
        <li>
        Engineering students will be required to buy their own tools and equipment as listed below
        </li> 
    </ol>
    <p style="font-weight: bold; text-decoration:underline;">
        LIST OF TOOLS FOR MECHANICAL ENGINEERING STUDENTS
    </p>
    <ol type="1">
        <li>
        T-square 600mm
        </li>
        <li>
        Engineering drawing set
        </li>
        <li>
        Engineering set square (45⁰x45⁰, 60⁰x30⁰) 450mm and protractor
        </li>
        <li>
        Masking tape
        </li>
        <li>
        Scientific calculator
        </li>
        <li>
        Four figure mathematical log table
        </li>
        <li>
        Drawing book A3 size
        </li>
        <li>
        Overall, (navy blue)
        </li>
        <li>
        Pencils 4H, HB
        </li>
    </ol>
    <p>
        Yours sincerely
    </p>
    <p style="font-weight: bold">
    Benjamin Ncebere
    </p>
    <p style="font-weight: bold">
    Principal - Kaelo TVC
    </p>
    <footer>
        <h4 style="text-align: center; margin-bottom:-10px;"> 
          Innovation for a better future
        </h4>
        <hr style="color:#62799D; background-color:#62799D; height:1.5px; margin-bottom:30px; float:left; width:735px; margin-left:0;">
    </footer>
</div>
    </body>
</html>
