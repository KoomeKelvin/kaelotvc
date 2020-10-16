@extends('layouts.manage')
@permission('create-units')
@section('content')
<div class="container">
    <div class="row">
            <h3>Create a new Unit</h3>
    </div>
    <hr class="mb-o">
<form action="{{route('units.store')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row justify-content-center align-items-center"><button class="btn btn-outline-info the_submit">Create Unit</button></div>
<div class="row">
    <div class="col-md-6">
<div class="form-group row mx-auto">
    <label for="unit_name" class="col-form-label col-sm-4 ">Unit Name</label>
    <input type="text" class="form-control col-sm-8" id="unit_name" name="unit_name">
</div>
<div class="form-group row mx-auto">
        <label for="code" class="col-form-label col-sm-4 ">Unit Code</label>
        <input type="text" class="form-control col-sm-8" id="code" name="code">
    </div>
    <div class="form-group row mx-auto">
            <label for="description" class="col-form-label col-sm-4 ">Description</label>
            <input type="text" class="form-control col-sm-8" id="description" name="description">
        </div>
    </div>
        <div class="col-md-6">
            <input type="text" :value="the_class" name="theclass" hidden>
@foreach($classes as $class)
<div class="custom-control custom-radio">
<input type="radio" value="{{$class->id}}" name="the_class"  v-model="the_class" id="{{$class->id}}" class="custom-control-input">
<label for="{{$class->id}}" class="custom-control-label">{{$class->class_name}}</label>
</div>
@endforeach
        </div>
    </div>

</form>

</div>
@endsection
@section('script')
<script>
var app= new Vue({
el:'#app',
data:{
the_class: ''
}

})

</script>
@endsection
@endpermission