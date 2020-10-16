@extends('layouts.manage')
@permission('read-users')
@section('content')
<div class="container ml-4">
<div class="row">
    <div class="col-md-8">
<h1>User Details</h1>
    </div>
    <div class="col-md-4 d-flex justify-content-end align-items-start">
    <a href="{{route('users.edit', $user->id)}}" class="btn btn-info">Edit User</a>
    </div>
</div>
<hr class="mt-0">
<form>
    <div class="form-group row align-items">
<label for="name" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
<div class="col-sm-10">
   <p class="font-italic form-control-plaintext form-control-lg">{{$user->name}}</p>
</div>
    </div>
    <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
            <div class="col-sm-10">
               <p class="font-italic form-control-plaintext form-control-lg">{{$user->email}}</p>
            </div>
                </div>
                {{$user->roles->count() == 0 ? 'This user has no roles': ' '}}
                @foreach($user->roles as $role)
            <div class="form-group row">
                <label for="roles" class="col-sm-2 col-form-label col-form-label-lg">Roles</label>
                <div class="col-sm-10">
                    <p class="font-italic form-control-plaintext form-control-lg">{{$role->display_name}} [ {{$role->description}}]</p>
                </div>
                    </div>
                    @endforeach
                    
</form>

</div>
@endsection
@endpermission