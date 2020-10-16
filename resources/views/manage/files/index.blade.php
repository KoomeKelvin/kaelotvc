@extends('layouts.manage')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Manage Files or Photos</h3>
        </div>
        <div class="col-md-4 d-flex justify-content-end align-items-start">
        <a href="{{route('files.create')}}" class="btn btn-info"><i class="fa fa-user-plus"></i>Create</a>
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
       <th>Description</th>
       <th>Download</th>
       <th>Edit</th>
       @permission('delete-files')
       <th>Delete</th>
       @endpermission
     
    </tr>
    </thead>
    <tbody>
        @foreach($files as $file)
        <tr>
        <td>{{$file->id}}</td> 
        <td>{{substr($file->fileable_type, 4)}}</td> 
        <td>{{$file->file_description}}</td>
        <td><a href="/storage/AandStaff/{{$file->file_path}}" target="_blank">{{$file->file_path}} <i class="fa fa-download"></i></a></td>
        <td><a href="{{route('files.edit', $file->id)}}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a></td>
        <td>
            @permission('delete-files')
        <form action="{{route('files.destroy', $file->id)}}"method="POST">
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
{{$files->links()}}
</div>


@endSection