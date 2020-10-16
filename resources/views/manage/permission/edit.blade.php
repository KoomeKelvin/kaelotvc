@extends('layouts.manage')
@permission('update-acl')
@section('content')

    <div class="container ml-4">
<div class="row">
 <h1>Edit User</h1>
</div>
<hr mt-0>
<form action="{{route('permissions.update', $permission->id)}}" method="POST">
    {{method_field('PUT')}}
    @csrf
    <div class="form-group row">
<label for="name" class="col-sm-2">Full Name</label>
    <input type="text" class="form-control col-sm-10" id="full_name" name='full_name' value="{{$permission->display_name}}">
    </div>
    <div class="form-group row">
<label for="name"  class="col-sm-2">Short Name</label>
<input type="text" class="form-control col-sm-10" value={{$permission->name}} disabled>
    </div>
    <div class="form-group row">
        <label for="description"  class="col-sm-2">Description</label>
        <input type="text" class="form-control col-sm-10" value={{$permission->description}} id="description" name="description">
            </div>
    
        <button class="btn btn-outline-info  the_submit">Save Update</button>

</form>

    </div>
@endsection
@endpermission