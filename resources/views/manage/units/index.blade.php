@extends('layouts.manage')
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-7">
        <h2>Manage Units </h2>
    </div>
    <div class="col-md-5 d-flex justify-content-between align-items-start">
        <form action="{{route('units.search')}}" method="POST" role="search">
            {{csrf_field()}}
         <div class="input-group">
             <input type="text" class="form-control" name="search_item" placeholder="search">
             <span class="input-group-btn">
                 <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
             </span>
         </div>
        </form>
    <a href="{{route('units.create')}}" class="btn btn-info">Create </a>
    </div>
</div>
<hr>
@if(count($units)>0)
<div class="card">
    <div class="card-content">
<table class="table table-sm">
<thead class="thead-light">
    <th>Name</th>
    <th>Unit Code</th>
    <th>Description</th>
    <th>Class</th>
    <th>View</th>
    <th>Edit</th>
    <th>Delete</th>
</thead>
<tbody>
    @foreach($units as $unit)
    <tr>
<td>{{$unit->name}}</td>
<td>{{$unit->code}}</td>
<td>{{$unit->description}}</td>
<td>{{$unit->class->class_name}}</td>
<td><a href="{{route('units.show', $unit->id)}}" class="btn btn-outline-info"> <i class="fa fa-binoculars"></i></a></td>
<td><a href="{{route('units.edit', $unit->id)}}"  class="btn btn-outline-info"> <i class="fa fa-edit"></i></a></td>
    <td>
        @permission('delete-units')
        <form action="{{route('units.destroy', $unit->id)}}" method="POST">
    <input type="hidden" name="_method" value="DELETE">
    {{csrf_field()}}
    <button type="submit" class="btn btn-outline-info"><i class="fa fa-trash"></i></button>
    </form>
    @endpermission</td>
    </tr>
    @endforeach
</tbody>
</table>

    </div>
    {{$units->links()}}
</div>
@else
<div class="text-danger">No units found!</div>
@endif

</div>
@endSection