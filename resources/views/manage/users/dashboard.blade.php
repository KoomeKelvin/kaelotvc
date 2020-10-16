@extends('layouts.manage')
@section('content')
<div class="container ml-4">
    <div class="row">
<div class="col md-8">
<h1>Manage Users</h1>
</div>
<div class="col-md-4 d-flex align-items-start justify-content-end">
<a href="{{route('users.create')}}" class="btn btn-info">Create User</a>
</div>
</div>
<hr class="mt-0">
<div class="card" style="margin-bottom:5px">
    <div class="card-content">
        <div class="table-responsive">
<table class="table table-sm">
<thead class="thead-light">
    <tr>
        <th>id</th>
        <th> Name</th>
        <th>Email</th>
        <th>Created At</th>
        <th>Edit</th>
        <th>View</th>
        <th>Delete</th>
</thead>
<tbody>
@foreach($users as $user)
@if($user->id== '5')
@role('su')
<tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->created_at->toFormattedDateString()}}</td>
    <td><a href="{{route('users.edit', $user->id)}}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a></td>
    <td><a href="{{route('users.show', $user->id)}}" class="btn btn-outline-info"> <i class="fa fa-binoculars"></i></a></td>
    <td>
        @permission('delete-users')
    <form action="{{route('users.destroy', $user->id)}}" method="POST">
        {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE">
    <button class="btn btn-outline-info" type="submit"><i class="fa fa-trash"></i></button>
    </form>
    @endpermission
    </td>
    </tr>
@endrole
@else
<tr>
<td>{{$user->id}}</td>
<td>{{$user->name}}</td>
<td>{{$user->email}}</td>
<td>{{$user->created_at->toFormattedDateString()}}</td>
<td><a href="{{route('users.edit', $user->id)}}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a></td>
<td><a href="{{route('users.show', $user->id)}}" class="btn btn-outline-info"> <i class="fa fa-binoculars"></i></a></td>
<td>
    @permission('delete-users')
<form action="{{route('users.destroy', $user->id)}}" method="POST">
    {{csrf_field()}}
<input type="hidden" name="_method" value="DELETE">
<button class="btn btn-outline-info" type="submit"><i class="fa fa-trash"></i></button>
</form>
@endpermission
</td>
</tr>
@endif
@endforeach

</tbody>
</table>
</div>
</div>
</div>
{{$users->links()}}
</div>
@endsection