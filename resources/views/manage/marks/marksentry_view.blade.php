@extends('layouts.manage')
@section('content')
<div class="container">
        <form>
          
<div class="row">
<div class="col-md-5">
<h2>Marks for {{$unit->code}} <em>[ {{$unit->name}}]</em></h2>
<a href="{{route('marks.show', $class->id)}}" class="btn btn-info btn-sm"><< back</a>
</div>

<div class="col-md-3">
    {{-- <div class="form-group row mx-auto font-weight-bold">
        <select name="term" id="term" class="custom-select">
        <option selected disabled="disabled">Select Term?</option>
            <option value="term-one">Term One</option>
            <option value="term-two">Term Two</option>
            <option value="term-three">Term Three</option>
        </select>
    </div> --}}
        </div>
<div class="col-md-4">
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
@foreach($student->marks as $mark)
@if($mark->unit_id == $unit->id && $mark->term == $term)
<td>
<div class="form-group row mx-auto">
<input type="text" class="form-control col-sm-3 form-control-sm"  value="{{$mark->cat}}" readonly>
</div>
</td> 
<td>
<div class="form-group row mx-auto">
<input type="text" class="form-control col-sm-3 form-control-sm"  value="{{$mark->endterm}}" readonly>
</div>    
</td>
@endif
@endforeach

</tr>
@endforeach

</tbody>
</table>
<div class="form-group row mx-auto">
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
