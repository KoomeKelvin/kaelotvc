@extends('layouts.manage')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Manage Posts</h3>
        </div>
        <div class="col-md-4 d-flex justify-content-end align-items-start">
        <a href="{{route('posts.create')}}" class="btn btn-info"><i class="fa fa-user-plus"></i>Create</a>
        </div>
    </div>
    <hr class="mb-0">
    <div class="card mb-5">
        <div class="card-content">
<table class="table table-sm">
    <thead class="thead-light">
        <tr>
       <th>Id</th>
       <th>Type </th>
       <th>Title</th>
       <th>Description</th>
       <th>Image Uploaded</th>
       <th>view</th>
       <th>Edit</th>
       <th>Delete</th>
     
    </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
        <td>{{$post->id}}</td> 
        <td>{{$post->type}}</td> 
        <td>{{strip_tags($post->title)}}</td>
        <td>{{strip_tags($post->description)}}</td> 
        <td>{{$post->image_uploaded}}</td> 
        <td><a href="{{route('posts.show', $post->id)}}" class="btn btn-outline-info"><i class="fa fa-binoculars"></i></a></td> 
        <td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a></td>
        <td>
            @permission('delete-posts')
        <form action="{{route('posts.destroy', $post->id)}}"method="POST">
        <input type="hidden" name="_method" value="DELETE">
        {{csrf_field()}}
        <button type="submit" class="btn btn-outline-info"><i class="fa fa-trash"></i></button>
        </form>
            @endpermission
        </td>    
    
    </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
{{$posts->links()}}
</div>


@endSection