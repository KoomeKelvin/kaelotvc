@extends('layouts.manage')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Manage Files or Photos</h3>
        </div>
    </div>
    <hr class="mb-0">
    <div class="card mb-5">
        <div class="card-content">
<table class="table table-sm">
    <thead class="thead-light">
        <tr>
       <th>Id</th>
       <th>Unit</th>
       <th>Topic</th>
       <th>Download</th>
       <th>Edit</th>
       @permission('delete-discussions')
       <th>Delete</th>
       @endpermission
     
    </tr>
    </thead>
    <tbody>
        @foreach($discussions as $discussion)
        <tr>
        <td>{{$discussion->id}}</td> 
        <td>{{$discussion->unit->name}}</td> 
        <td>{{$discussion->title}}</td> 
        <td> 
            @foreach($discussion->files as $file)
            <a href="/storage/AandStaff/{{$file->file_path}}" target="_blank">{{substr($discussion->title, 0, 20)}} <i class="fa fa-download"></i></a>
            @endforeach
        </td>
        <td><a href="{{route('discussion.edit', $discussion->id)}}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a></td>
        <td>
            @permission('delete-discussions')
        <form action="{{route('discussion.destroy', $discussion->id)}}"method="POST">
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
{{$discussions->links()}}
</div>


@endSection