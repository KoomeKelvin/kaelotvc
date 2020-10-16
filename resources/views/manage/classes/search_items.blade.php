@extends('layouts.manage')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-8">
<h2>Manage Classes</h2>
</div>
<div class="col-md-4 d-flex align-items-start justify-content-between">
    <form action="{{route('classes.search')}}" method="POST" role="search">
        {{csrf_field()}}
     <div class="input-group">
         <input type="text" class="form-control" name="search_item" placeholder="search">
         <span class="input-group-btn">
             <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
         </span>
     </div>
    </form>
<a href="{{route('theclasses.create')}}" class="btn btn-info">Create Class</a>
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
<th>View</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
@foreach($search_items as $class)
<tr>
<td>{{$class->class_name}}</td>
<td>{{$class->code}}</td>
<td>{{$class->description}}</td>
<td>{{$class->year}}</td>
<td>{{$class->course->name}}</td>
<td>
<a href="{{route('theclasses.show', $class->id)}}" class="btn btn-outline-info"><i class="fa  fa-binoculars"></i></a> 
</td>
<td> 
<a href="{{route('theclasses.edit', $class->id)}}" class="btn btn-outline-info"> <i class="fa  fa-edit"></i></a>
</td>
<td>
    @permission('delete-classes')
<form action="{{route('theclasses.destroy', $class->id)}}" method="POST">
    <input name="_method" type="hidden" value="DELETE">
    {{ csrf_field() }}
    <button type="submit" class="btn btn-outline-info"><i class="fa  fa-trash"></i></button>
</form>
@endpermission
</td>
</tr>
@endforeach
</tbody>

</table>
</div>
</div>
</div>
{{$search_items->links()}}
@else
<div class="text-danger">No results found!</div>
@endif
</div>
@endsection
