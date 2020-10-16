@extends('layouts.manage')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-8">
<h2>Manage Academics (Marks / Elearning-<em>elimisha</em>)</h2>
<a href="{{route('marks.index')}}" class="btn btn-info btn-sm"><< back</a>
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
<th>Unit Name</th>
<th>Elimisha Feedback</th>
<th>Elimisha</th>
<th>Enter Marks</th>
@role('principal|su|hod|registrar')
<th>Marks Entry</th>
@endrole
</tr>
</thead>
<tbody>
@foreach($class->units as $unit)
<tr>
<td>{{$unit->name}}</td>
<td> <a href="{{route('elimishafeedback', $unit->id)}}" class="btn btn-outline-info"> <i class="fa fa-eye">&nbsp;{{count($unit->discussions)}} posts</i></a></td>
<td> <a href="{{route('elimisha', $unit->id)}}" class="btn btn-outline btn-info"> <i class="fa fa-edit">{{$unit->code}}</i></a></td>
<td> <a href="{{route('marksheet', ['id'=>$unit->id, 'class_id'=>$class->id])}}" class="btn btn-outline btn-info"> <i class="fa fa-edit">{{$unit->code}}</i></a></td>
@role('principal|su|hod|registrar')
<td>
        <form action="{{route('marksentry')}}" method="POST">
                @csrf
    <div class="form-row">
        <select v-model="term" name="term" id="term" class="custom-select custom-select-sm col-sm-5">
                <option selected disabled="disabled">Select Term?</option>
                    <option value="term-one">Term One</option>
                    <option value="term-two">Term Two</option>
                    <option value="term-three">Term Three</option>
                </select>
         
            <input type="text" name="unit_id" value="{{$unit->id}}"   hidden>
            <input type="text" name="class_id" value="{{$class->id}}" hidden>

     <button class="btn btn-sm btn-info"> View Entered Marks</button>

            </form>
            </td>
</div>
    @endrole
<td>
</td>

</tr>
@endforeach
</tbody>

</table>
</div>
</div>
</div>
</div>
@endsection
@section('script')
<script>
var app= new Vue({
el:'app',
data:{
    term: ''
}
});
</script>
@endsection