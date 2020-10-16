@extends('layouts.manage')
@permission('update-posts')
@section('content')
<div class="container">
    <div class="row">
            <h3>Edit Post</h3>
    </div>
    <hr class="mb-o">
<form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
@csrf
{{method_field('PUT')}}
<div class="form-group row mx-auto">
        <label for="type" class="col-form-label col-sm-2 ">Post Type</label>
            <select name="type" id="type" class="custom-select col-sm-8">
                <option selected disabled="disabled">Select Post</option>
                <option value="Announcement">Announcement</option>
                <option value="Gallery">Gallery</option>
                <option value="Other">Other</option>
            </select>
        <em>{{$post->type}}</em>
</div>
<div class="form-group row mx-auto">
    <label for="posts_title" class="col-form-label col-sm-2 ">Post Title</label>
    <textarea class="form-control col-sm-8" id="posts_title"  name="title">
        {{strip_tags($post->title)}}
    </textarea>
    
</div>
<div class="form-group row mx-auto">
        <label for="posts_description" class="col-form-label col-sm-2 ">Description</label>
<textarea class="form-control col-sm-8" id="posts_description"  name="description">
{{strip_tags($post->description)}}
</textarea>
    <em></em>
    </div>
    @if(!empty($post->image_uploaded))
    <img style="width:180px; height:120px;" src="/storage/uploads/{{$post->image_uploaded}}" alt="Kaelo Technical and Vocational College">  
            <input type="file"  name="image_uploaded">
    @endif
        
       
<button class="btn btn-outline-info the_submit">Edit Post</button>
</form>

</div>
@endsection
@endpermission