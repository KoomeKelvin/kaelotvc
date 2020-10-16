@extends('layouts.manage')
@permission('update-users')
@section('content')

    <div class="container ml-4">
<div class="row">
 <h1>Edit User</h1>
</div>
<hr mt-0>
<form action="{{route('users.update', $user->id)}}" method="POST">
    {{method_field('PUT')}}
    @csrf
    <div class="row">
        <div class="col-md-8">
    <div class="form-group row">
<label for="name" class="col-sm-2">Name</label>
    <input type="text" class="form-control col-sm-10" id="name" name='name' value="{{$user->name}}">
    </div>
    <div class="form-group row">
<label for="email"  class="col-sm-2">Email</label>
<input type="email" class="form-control col-sm-10" value={{$user->email}} id="email" name="email">
    </div>
    <div class="form-group row">
            <label for="password"class="col-sm-2 mb-0">Password:</label>
                </div>
  <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" v-model="options" name="options" id="retain" value="retain">
        <label for="retain" class="custom-control-label">Retain old password</label>
    </div>
    <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" v-model="options" name="options" id="auto_password" value="auto_password">
            <label for="auto_password" class="custom-control-label">Automatically generate new password</label>
        </div>
        <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" v-model="options" name="options" id="manual_password" value="manual_password">
                <label for="manual_password" class="custom-control-label">set manually</label>
            </div>
            <input type="password"  class="mt-2 form-control col-sm-10" id="password" name="password" v-if="options=='manual_password'">
        </div>
        <div class="col-md-4">
            <input type="text" :value="roleSelected" name="roles_selected" hidden>
            @foreach($roles as $role)
            @if($role->name == 'su')
            @role('su')
        <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" v-model="roleSelected" value="{{$role->id}}" id="{{$role->id}}">
        <label for="{{$role->id}}" class="custom-control-label">{{$role->name}} [ {{$role->description}} ]</label>
        </div>
        @endrole
        @else
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" v-model="roleSelected" value="{{$role->id}}" id="{{$role->id}}">
            <label for="{{$role->id}}" class="custom-control-label">{{$role->name}} [ {{$role->description}} ]</label>
            </div>
        @endif
        @endforeach

        
    </div>
    </div>
    <hr>
    <div class="row justify-content-center">
            <button class="btn btn-lg btn-outline-info  the_submit" style="width:250px">Edit</button>
    </div>
</form>

    </div>
@endsection
@section('script')
<script>
var app= new Vue({
el: '#app',
data:{
   options : 'auto_password',
   roleSelected: {!! $user->roles->pluck('id')  !!}
}

});
</script>

@endsection
@endpermission