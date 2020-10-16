@extends('layouts.manage')
@permission('read-acl')
@section('content')
<div class="container ml-4">
<div class="row">
    <div class="col-md-8">
    <h1>{{$role->name}} <small class="mx-3"><em>[ {{$role->display_name}} ]</em></small></h1>
    <h3>{{$role->description}}</h3>
    </div>
    <div class="col-md-4 d-flex justify-content-end align-items-start">
    <a href="{{route('roles.edit', $role->id)}}" class="btn btn-outline-info"><i class="fa fa-edit"></i>Edit Role</a>
    </div>
</div>
<hr class="mt-0">
 <div class="row">
  <div class="card">
        <div class="card-header font-weight-bold">Permissions:</div>
       <ul>
              @foreach($role->permissions as $r)
        <li>{{$r->display_name}} <em class="mx-3">[  {{$r->description}} ]</em></li>
        @endforeach
        </ul>
    </div> 
</div>
</div>
@endsection
@endpermission