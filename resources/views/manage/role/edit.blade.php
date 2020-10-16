@extends('layouts.manage')
@permission('update-acl')
@section('content')
<div class="container ml-4">
<div class="row">
    <div class="col-md-8">
    <h1>Edit {{$role->display_name}}</h1>
    </div>
</div>
<hr class="mt-0">
<form action="{{route('roles.update', $role->id)}}" method="POST">
        @csrf
        {{method_field('PUT')}}
        <div class="form-group row mx-auto">
    <label for="full_name" class="col-sm-2 col-form-label">Full Name</label>
        <input type="text" class="form-control col-sm-10" id="full_name" name='full_name' value="{{$role->display_name}}">
        </div>
        <div class="form-group row mx-auto">
    <label for="name"  class="col-sm-2 col-form-label">Role Abbreviation [not editable]</label>
    <input type="text" class="form-control col-sm-10 " value={{$role->name}} disabled>
        </div>
        <div class="form-group row mx-auto">
            <label for="description"  class="col-sm-2 col-form-label">Description</label>
            <input type="text" class="form-control col-sm-10" value={{$role->description}} id="description" name="description">
                </div>
                <input type="text" :value="permissionChoosen" name="permission_choosen" hidden>
                <div class="row">
                        <div class="card">
                                <div class="card-header font-weight-bold">Permissions:</div>
                             <ul>
                                    @foreach($permissions as $permission)
                                    <div class="custom-control custom-switch">
                                    <input type="checkbox"  v-model="permissionChoosen" class="custom-control-input" value="{{$permission->id}}" id="{{$permission->id}}">
                                    <label for="{{$permission->id}}" class="custom-control-label">{{$permission->display_name}}
                                    <em>{{$permission->description}}</em>
                                    </label>
                                </div>
                              @endforeach
                              </ul>
                          </div> 
                      </div>
        
            <button class="btn btn-outline-info  the_submit">Save Update</button>
    
    </form>
 
    
</div>
@endsection
@section('script')
<script>
var app= new Vue({
el: '#app',
data:{
'permissionChoosen': {!!$role->permissions->pluck('id') !!}
}
});
</script>
@endsection
@endpermission