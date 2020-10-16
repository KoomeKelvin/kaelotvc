@extends('layouts.manage')
@section('content')
<div class="container">
        <form action="{{route('marks.store')}}" method="POST">
                @csrf
<div class="row">
<div class="col-md-5">
<h2>Enter marks for {{$unit->code}} <em>[ {{$unit->name}}]</em></h2>
</div>

<div class="col-md-3">
    <div class="form-group row mx-auto font-weight-bold">
        <select name="term" v-model="term"  id="term" class="custom-select">
        <option selected disabled="disabled">Select Term?</option>
            <option value="term-one">Term One</option>
            <option value="term-two">Term Two</option>
            <option value="term-three">Term Three</option>
        </select>
    
    </div>
  </div>
<check-marks  :unitid="{{$unit->id}}" :classid="{{$class->id}}" :term='term'></check-marks>

<div class="col-md-2">
<h2>{{$class->code}}</h2>
</div>
</div>
<hr>
<div class="card  mb-5">
<div class="card-content">
    <div class="table-responsive">
<table class="table table-sm">
    <thead class="thead-light">
        <tr>
            <th>Admission Number</th>
            <th>Student Name</th>
            <th>CAT </th>
            <th>END TERM</th>
        </tr>
    </thead>

<tbody>
@foreach($students as $student)
<tr>
<td>{{$student->admission_number}}</td>
<td>{{$student->full_name}}</td>
<td>
<div class="form-group row mx-auto">
<input type="text" class="form-control col-sm-3 form-control-sm"    name="cat{{$student->id}}" required>
</div>
</td> 

<td>
<div class="form-group row mx-auto">
<input type="text" class="form-control col-sm-3 form-control-sm"  name="endterm{{$student->id_no}}" required>
</div>    
</td>
</tr>
@endforeach

</tbody>
</table>

<input type="text" name="unit" value="{{$unit->id}}" hidden>
<input type="text" name="class" value="{{$class->id}}" hidden>
<div class="form-group row mx-auto">
<button class="btn btn-lg btn-outline-success">Submit Marks</button>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
@section('script')
<script>
    var app= new Vue({
        el:'#app',
        data:{
            term: '',
            api_token: '{{Auth::user()->api_token}}'
             }
    });


</script>
@endsection