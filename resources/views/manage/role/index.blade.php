@extends('layouts.manage')
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h3>Manage Roles</h3>
    </div>
    <div class="col-md-4 d-flex justify-content-end align-items-start" >
        <a href="{{route('roles.create')}}" class="btn btn-outline-info"><i class="fa fa-user-plus"></i>Create Role</a>
    </div>
</div>
<hr class="mb-0">
<div class="row">
@foreach($roles as $role)
@if($role->name=='su')
@role('su')
<div class="col-md-4">
    <div class="card mx-2 my-2">
            <div style="background-color: hsl(230, 32%, 73%);" class="card-header text-white py-2 text-uppercase text-center">
                <h3>{{$role->name}}</h3>
            </div>
        <h5 class="card-title text-center my-1">{{$role->display_name}}</h5>
            <p class="card-text">
               {{$role->description}}
            </p>
            <div class="card-footer d-flex justify-content-around">
            <a href="{{route('roles.show', $role->id)}}">
                            <i class="fa-2x text-dark fa fa-binoculars"></i>
                        </a>
                        <a href="{{route('roles.edit', $role->id)}}">
                                <i class="fa-2x text-dark fa fa-edit"></i>
                            </a>
                            @permission('delete-acl')
                            <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                {{csrf_field()}}
                                <button type="submit" ><i class="fa fa-trash"></i></button>
                            </form>
                          @endpermission
        
            </div>
    </div>
</div>
@endrole
@else
<div class="col-md-4">
    <div class="card mx-2 my-2">
            <div style="background-color: hsl(230, 32%, 73%);" class="card-header text-white py-2 text-uppercase text-center">
                <h3>{{$role->name}}</h3>
            </div>
        <h5 class="card-title text-center my-1">{{$role->display_name}}</h5>
            <p class="card-text">
               {{$role->description}}
            </p>
            <div class="card-footer d-flex justify-content-around">
            <a href="{{route('roles.show', $role->id)}}">
                            <i class="fa-2x text-dark fa fa-binoculars"></i>
                        </a>
                        <a href="{{route('roles.edit', $role->id)}}">
                                <i class="fa-2x text-dark fa fa-edit"></i>
                            </a>
                            @permission('delete-acl')
                            <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                {{csrf_field()}}
                                <button type="submit" ><i class="fa fa-trash"></i></button>
                            </form>
                          @endpermission
        
            </div>
    </div>
</div>
@endif
@endforeach
</div>
</div>
@endsection