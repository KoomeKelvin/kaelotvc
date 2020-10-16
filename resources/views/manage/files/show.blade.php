@extends('layouts.manage')
@permission('read-files')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>File Details</h3>
        </div>
        <div class="col-md-4 d-flex justify-content-end align-items-start">
        <a href="{{route('files.edit', $file->id)}}" class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>
        </div>
    </div>
    <hr class="mb-0">
    <form>
<div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label col-form-label-lg">Description</label>
    <p class="form-control form-control-lg col-sm-10 form-control-plaintext" id="description"><em>{{$file->file_description}}</em></p>
    </div>
   
        <div class="form-group row">
                <label for="subjects_considered" class="col-sm-2 col-form-label col-form-label-lg">Image Uploaded</label>
            <p class="form-control form-control-lg col-sm-10 form-control-plaintext" id="subjects_considered"> 
            <img style="width:180px; height:120px;" src="/storage/AandStaff/{{$file->file_path}}" alt="samburuTTI">   
            </div>



    </form>
</div>

@endSection
@endpermission