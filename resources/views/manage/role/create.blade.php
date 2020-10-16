@extends('layouts.manage')
@permission('create-acl')
@section('content')
<div class="container ml-4">
<div class="row">
    <div class="col-md-8">
    <h1>Create Role</h1>
    </div>
</div>
<hr class="mt-0">
<form action="{{route('roles.store')}}" method="POST">
        @csrf
        <div class="form-group row mx-auto">
    <label for="full_name" class="col-sm-2 col-form-label">Full Name</label>
        <input type="text" class="form-control col-sm-10" id="full_name" name='full_name' value="{{old('display_name')}}">
        </div>
        <div class="form-group row mx-auto">
    <label for="name"  class="col-sm-2 col-form-label">Role Abbreviation </label>
    <input type="text" class="form-control col-sm-10 " name="abbreviation" value={{old('name')}}>
        </div>
        <div class="form-group row mx-auto">
            <label for="description"  class="col-sm-2 col-form-label">Description</label>
            <input type="text" class="form-control col-sm-10" value="{{old('description')}}" id="description" name="description">
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
        
            <button class="btn btn-outline-info  the_submit">Create Role</button>
    
    </form>
 
    
</div>
@endsection
@section('script')
<script>
var app= new Vue({
el: '#app',
data:{
'permissionChoosen': []
}
});
</script>
@endsection
@endpermission