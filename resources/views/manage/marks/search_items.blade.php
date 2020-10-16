@extends('layouts.manage')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-5">
<h2>Manage marks</h2>
</div>
<div class="col-md-7 d-flex align-items-end justify-content-start">
    
<form action="{{route('search.class.marks')}}" method="POST">
    {{csrf_field()}}
    <div class="input-group">
    <input type="text" name="search_item" placeholder="search" class="form-control">
    <span class="input-group-btn">
        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
    </span>
</div>
</form>

</div>
</div>
<hr>
@if(count($search_items)>0)
<div class="card  mb-5">
<div class="card-content">
    <div class="table-responsive">
<table class="table table-sm">
<thead class="thead-light">
<tr>
<th>Name</th>
<th>Code</th>
<th>Description</th>
<th>Year</th>
<th>Course</th>
</tr>
</thead>
<tbody>
@foreach($search_items as $class)
<tr>
<td>{{$class->class_name}}</td>
<td> <a href="{{route('marks.show', $class->id)}}" class="btn btn-outline btn-info"> <i class="fa fa-edit">{{$class->code}}</i></a></td>
<td>{{$class->description}}</td>
<td>{{$class->year}}</td>
<td>{{$class->course->name}}</td>
<td>
</td>

</tr>
@endforeach
</tbody>

</table>
</div>
{{$search_items->links()}}
</div>
</div>
@else
<div class="text-danger">No class found!</div>
@endif
</div>
@endsection
