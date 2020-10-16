@extends('layouts.manage')
@permission('read-acl')
@section('content')
<div class="container ml-4">
<div class="row">
    <div class="col-md-8">
<h1>Permission Details</h1>
    </div>
    <div class="col-md-4 d-flex justify-content-end align-items-start">
    <a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-info">Edit Permission</a>
    </div>
</div>
<hr class="mt-0">
<form>
    <div class="form-group row align-items">
<label for="abbreviation" class="col-sm-2 col-form-label col-form-label-lg">Permission ShortName</label>
<div class="col-sm-10">
   <p  id="abbreviation" class="font-italic form-control-plaintext form-control-lg">{{$permission->name}}</p>
</div>
    </div>
    <div class="form-group row">
            <label for="display_name" class="col-sm-2 col-form-label col-form-label-lg">Permission Full Name</label>
            <div class="col-sm-10">
               <p  id=" display_name" class="font-italic form-control-plaintext form-control-lg">{{$permission->display_name}}</p>
            </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label col-form-label-lg">Permission Description</label>
                    <div class="col-sm-10">
                       <p id="description" class="font-italic form-control-plaintext form-control-lg">{{$permission->description}}</p>
                    </div>
                        </div>
</form>

</div>
@endsection
@endpermission