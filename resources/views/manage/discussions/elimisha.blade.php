
@extends('layouts.manage')
@permission('create-discussions')
@section('content')
<div class="container">
    <div class="row">
    <h3> Discussion / Assignment for {{$unit->code}} <em>{{$unit->name}}</em> [{{$unit->class->code}}]</h3>
    </div>
    <hr class="mb-o">
<form action="{{route('discussion.store')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group row mx-auto">
    <label for="title" class="col-form-label col-sm-2 ">Discussion Topic / Title</label>
    <input type="text" class="form-control col-sm-10" v-model="title" id="title" name="title">
</div>

<input type="text" value="{{$unit->id}}" name="unit_id" hidden>
<input type="text" :value="slug" name="slug" hidden>
<div class="form-group row mx-auto">
    <label for="" class="col-form-lable col-sm-2">Unique Shareable link</label>
    <slug :title="title" directory={{url('/')}} subdirectory="notes" @slug-modified="modifiedSlug"></slug>
</div>
<div class="form-group row mx-auto">
        <label for="discussionbody" class="col-form-label col-sm-2 ">Content</label>
        <textarea class="form-control col-sm-10" id="discussionbody" name="discussionbody"></textarea>
    </div>

    <div class="form-group row mx-auto">
        <label for="notes" class="col-form-label col-sm-2 ">Upload Notes/ Assignment </label>
        <input type="file"  name="file_uploaded" id="notes" class="col-sm-10">
    </div>
    <div class="row justify-content-center align-items-center">
    <button class="btn btn-outline-info the_submit">Send Content</button>
    </div>

</form>

</div>
@endsection
@endpermission
@section('script')
<script>
var app= new Vue({
el: '#app',
data:{
    title:'',
   api_token: '{{Auth::user()->api_token}}',
   slug:''
},
methods:{
    modifiedSlug:function(val){
        this.slug=val
    }
}
});
</script>

@endsection