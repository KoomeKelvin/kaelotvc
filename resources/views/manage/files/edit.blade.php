@extends('layouts.manage')
@permission('update-files')
@section('content')
<div class="container">
    <div class="row">
            <h3>Edit File </h3>
    </div>
    <hr class="mb-o">
<form action="{{route('files.update', $file->id)}}" method="POST" enctype="multipart/form-data">
@csrf
{{method_field('PUT')}}
<div class="form-group row mx-auto">
        <label for="file_description" class="col-form-label col-sm-2 ">File Description</label>
<textarea class="form-control col-sm-10" id="file_description" name="file_description">{{$file->file_description}}</textarea>
    </div>

<input type="file"  name="file_uploaded"><em>{{$file->file_path}}</em>
        
       
<button class="btn btn-outline-info the_submit">Upload</button>
</form>

</div>
@endsection
@endpermission