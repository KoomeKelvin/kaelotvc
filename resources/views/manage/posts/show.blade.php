@extends('layouts.manage')
@permission('read-posts')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Post Details</h3>
        </div>
        <div class="col-md-4 d-flex justify-content-end align-items-start">
        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>
        </div>
    </div>
    <hr class="mb-0">
    <form>
<div class="form-group row">
    <label for="type" class="col-sm-2 col-form-label col-form-label-lg">Post Type</label>
<p class="form-control-plaintext  col-sm-10 form-control-lg" id="type"><em>{{$post->type}}</em></p>
</div>
<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label col-form-label-lg">Post Title</label>
<p class="form-control form-control-lg col-sm-10 form-control-plaintext" id="title"><em>{!!$post->title!!}</em></p>
</div>
<div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label col-form-label-lg">Description</label>
    <p class="form-control form-control-lg col-sm-10 form-control-plaintext" id="description"><em>{!!$post->description!!}</em></p>
    </div>
   
        <div class="form-group row">
                <label for="subjects_considered" class="col-sm-2 col-form-label col-form-label-lg">Image Uploaded</label>
            <p class="form-control form-control-lg col-sm-10 form-control-plaintext" id="subjects_considered"> 
            <img style="width:180px; height:120px;" src="/storage/uploads/{{$post->image_uploaded}}" alt="samburuTTI">    
            </p>
            </div>



    </form>
</div>

@endSection
@endpermission