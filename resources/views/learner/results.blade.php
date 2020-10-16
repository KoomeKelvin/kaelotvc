@extends('layouts.student-app')

@section('content')
<div id="transcript" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input"  v-model="term" name="term"  id="termone" value="term-one">
                <label for="termone" class="custom-control-label">Term one</label>
                            </div>   
                <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input"  v-model="term" name="term"  id="termtwo" value="term-two">
                        <label for="termtwo" class="custom-control-label">Term Two</label>
                </div>  
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input"  v-model="term" name="term"  id="termthree" value="term-three">
                    <label for="termthree" class="custom-control-label">Term Three</label>
            </div>    
            {{-- term one  --}}
            <div v-show="term== 'term-one'">
            <div class="card">
                <div class="card-header">
                    <table class="table table-sm">
                        <thead class="thead-light">
                        <tr>
                        <th  colspan="2" style="text-align: center"><em>{{$student->full_name}} marks in </em>{{$student->class->code}}
                        <a href="{{route('student.results.download', ['student_id'=>$student->id, 'term'=>'term-one'])}}">
             <i class="fa fa-download">Download Transcript</i></a></th>  
         
                        </tr>
                        <tr>
                        <th>Unit Name</th>
                        <th>Marks</th>
                        <th>Award</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                        @foreach($student->marks as $mark) 
                        @if($mark->term== 'term-one')                
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
            </div>
        </div>
            {{-- term two --}}
        <div v-show="term == 'term-two'">
            <div class="card">
              
                <div class="card-header">
                    <table class="table table-sm">
                        <thead class="thead-light">
                        <tr>
                        <th  colspan="2" style="text-align: center"><em>{{$student->full_name}} marks in </em>{{$student->class->code}}
                            <a href="{{route('student.results.download', ['student_id'=>$student->id, 'term'=>'term-two'])}}">
             <i class="fa fa-download">Download Transcript</i></a></th>  
         
                        </tr>
                        <tr>
                        <th>Unit Name</th>
                        <th>Marks</th>
                        <th>Award</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                        @foreach($student->marks as $mark) 
                        @if($mark->term == 'term-two')               
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
            </div>
        </div>
            {{-- term three --}}
            <div v-show="term =='term-three'">
            <div class="card">
                <div class="card-header">
                    <table class="table table-sm">
                        <thead class="thead-light">
                        <tr>
                        <th  colspan="2" style="text-align: center"><em>{{$student->full_name}} marks in </em>{{$student->class->code}}
                            <a href="{{route('student.results.download', ['student_id'=>$student->id, 'term'=>'term-three'])}}">
             <i class="fa fa-download">Download Transcript</i></a></th>  
         
                        </tr>
                        <tr>
                        <th>Unit Name</th>
                        <th>Marks</th>
                        <th>Award</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                        @foreach($student->marks as $mark)
                        @if($mark->term == 'term-three')               
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
            </div>
        </div>
            {{-- End of term three --}}
        </div>
    </div>
</div>
@endsection
@section ('script')
<script>
    var app= new Vue({
        el: '#app',
        data: {
            term: 'term-one'
        }

    });


</script>
@endsection