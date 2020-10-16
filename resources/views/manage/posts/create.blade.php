@extends('layouts.manage')
@permission('create-posts')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h3>Create a new Post</h3>
        </div>
        <div class="col-md-7">
            <small>
                Once you have created like 10 posts for gallery (sliding images in home page) you may want to be editing those instead of creating new ones.
                Note also Announcement which appears on the home page may or may not contain an attachment file

            </small>
        </div>
    </div>
    <hr class="mb-o">
<form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group row mx-auto">
        <label for="type" class="col-form-label col-sm-2 ">Post Type</label>
            <select name="type" id="type" class="custom-select col-sm-10">
                <option selected disabled="disabled">Select Post</option>
                <option value="Announcement">Announcement [announcements that will appear in home page, immediate 3]</option>
                <option value="Gallery">Gallery [images that will appear in home page]</option>
                <option value="Other">Other [first post in this category should be fees structure]</option>
            </select>
       
    </div>

<div class="form-group row mx-auto">
    <label for="posts_title" class="col-form-label col-sm-2 ">Post Title</label>
    <textarea class="form-control col-sm-10" id="posts_title" name="title"></textarea>
</div>
<div class="form-group row mx-auto">
        <label for="posts_description" class="col-form-label col-sm-2 ">Description</label>
        <textarea class="form-control col-sm-10" id="posts_description" name="description"></textarea>
    </div>

            <input type="file"  name="image_uploaded">
        
       
<button class="btn btn-outline-info the_submit">Create Post</button>
</form>

</div>
@endsection
@endpermission