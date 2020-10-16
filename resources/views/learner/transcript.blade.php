<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laisamis Technical Training Institute</title>

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
                left:300px;
                right:300px;
                position:fixed;
                z-index: -200;
            }
         </style>
     </head>
     <body>
      <div class="row" style="text-align:center; margin:0 10px; margin-top:-40px;  align-items:center;">
         <div class="col-2">
             <img src="{{url('/storage/frontend/kaelotvclogo.png')}}"  style="width:auto;  margin-left: 10px; height:80px;  margin-top:-40px; position:fixed;" alt="Kaelo Technical and Vocational College">    
         </div>
        <div class="col-10" style="right:200px;">
         <h4 style="font-weight:800; margin:0; font-size:17px">KAELO TECHNICAL AND VOCATIONAL COLLEGE </h4> 
      <h3 style="font-size:23px; margin:0; font-weight:900;">P.O. BOX 262 - 60601, LAARE</h3> 
      <h5 style="margin:0;">TEL: +254 759 417 000</h5>  
      <h5 style=" margin:0;">Email: info@kaelotvc.ac.ke . kaelotechnical@gmail.com</h5>
         </div>
       <div class="col-2">
         <img src="{{url('/storage/frontend/nationalemblem.png')}}"   style="width:auto; margin-left:650px; margin-top:-40px;  height:80px; position:fixed;" alt="Kaelo Technical and Vocational College">
     </div>
     </div>
      <div class="row">
           <span><hr style="color:#62799D;; background-color:#62799D;; height:1.5px; margin-bottom:30px; float:left; width:400px; margin-left:0;"></span> <span><hr style="color:green; margin-left:400px; margin-bottom:30px; background-color:green; height:1.5px; float:left; width:335px; clear:right;"></span>
            <br/>
            <div id="watermark">
             <img src="{{public_path().'/storage/frontend/laisamisttilogo.png'}}"  style="opacity:0.5; width:auto; height:200px;" alt="Laisamis Technical Training Institute">    
            </div>
     <h4 style="margin-top:50px;">TO: <em style="text-decoration: underline">{{$student->full_name}}</em> </h4>
         <h4>    ID No: <em stlye="text-decoration: underline"> {{$student->id_no}}</em> &nbsp; ADMISSION No:<em>{{$student->admission_number}}</em></h4>
    <div class="row">
     <img src="{{public_path().'/storage/student/passport/'.$student->passport}}" class="float-left" style="width:auto; height:70px;  margin-left:300px;" alt="{{$student->full_name}}">
    </div>
      
    <div class="card-header">
        <table class="table">
            <thead class="thead-light">
            <tr>
            <th  colspan="3" style="text-align: center"><em>{{$student->full_name}} marks in </em>{{$student->class->code}} {{$term =='term-one' ? 'TERM / SEMESTER ONE TRANSCRIPT' : 'TERM / SEMESTER TWO TRANSCRIPT'}} {{$term =='term-three' ? 'TERM / SEMESTER THREE TRANSCRIPT' : ''}}</th>   
            </tr>
            <tr>
            <th>Unit Name</th>
            <th>Marks</th>
            <th>Award</th>
            </tr>
            </thead>
            <tbody>
            @foreach($student->marks as $mark)
            @if($mark->term ==$term)
            <tr>  
                <td>
                 @foreach ($units as $unit)
                            @if($unit->id== $mark->unit_id)
                               {{$unit->name}}
                            @endif
                        @endforeach
                    </td>       
            <td>
            <div class="form-group row mx-auto">
                {{$total=$mark->cat + $mark->endterm}}
            {{-- <input type="text" class="form-control col-sm-3 form-control-sm"  value="{{$total}}" readonly> --}}
            </div>
            </td> 
            <td>
            <div class="form-group row mx-auto">
                   @if($total >=90 && $total < 100)
                   <b> Distinction 1 </b>
                   @endif
                   @if($total >=80 && $total < 90)
                    <b>Distinction 2</b>
                   @endif
                   @if($total >=70 && $total < 80)
                   <b>Credit 1</b>
                   @endif
                   @if($total >=60 && $total < 70)
                    <b>Credit 2 </b>
                   @endif
                   @if($total >=40 && $total < 60)
                   <b>Pass</b>
                   @endif
                   @if($total >=30 && $total < 40)
                   <b>Refer</b>
                   @endif
                   @if($total >=0 && $total < 30)
                   <b>Fail</b>
                   @endif
               
                </div>
                </td>
            </tr> 
            @endif 
            @endforeach   
            </tbody>
            </table>


    </div>
    <hr>
<p>Sign.................................</p>
<p><em>Benjamin Ncebere</em></p>
<p><em>Principal Kaelo Technical and Vocational College</em></p>
         </div>
     <footer>
         <h4 style="text-align: center;"> 
           Innovation for a better future
         </h4>
         <span><hr style="color:#62799D; background-color:#62799D; height:1.5px; margin-bottom:30px; float:left; width:400px; margin-left:0;"></span> <span><hr style="color:green; margin-left:400px; margin-bottom:30px; background-color:green; height:1.5px; float:left; width:335px; clear:right;"></span>
     </footer>
     </body>
 </html>
 