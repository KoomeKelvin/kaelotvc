@extends('layouts.manage')
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h3>Manage Permission</h3>
    </div>
    <div class="col-md-4 d-flex justify-content-end align-items-start">
    <a href="{{route('permissions.create')}}" class="btn btn-outline-info"><i class="fa fa-user-plus"> Create </i> </a>
    </div>
</div>
<hr class="mb-0">
<div class="card mb-5">
    <div class="card-content">
<table class="table table-sm">
<thead class="thead-light">
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Display Name</th>
    <th>Description</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
</thead>
<tbody>
@foreach($permissions as $permission)
<tr>
<td>{{$permission->id}}</td>
<td>{{$permission->name}}</td>
<td>{{$permission->display_name}}</td>
<td>{{$permission->description}}</td>
<td><a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-outline-info"> <i class="fa fa-edit"></i></a></td>
<td>
@permission('delete-acl')
<form action="{{route('permissions.destroy', $permission->id)}}" method="POST">
<input type="hidden" name="_method" value="DELETE">
{{csrf_field()}}
<button type="submit" class="btn btn-outline-info"><i class="fa fa-trash"></i></button>
</form>
@endpermission
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
{{$permissions->links()}}
</div>


@endsection