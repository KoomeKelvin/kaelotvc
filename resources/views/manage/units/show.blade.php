@extends('layouts.manage')
@permission('read-users')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">

        </div>
        <div class="col-md-4 d-flex justify-content-end align-items-start">
        <a href="{{route('units.edit', $unit->id)}}" class="btn btn-info"><i class="fa fa-edit">Edit</i></a>
        </div>
    </div>
<form>
<div class="form-group row">
    <label for="unit_name" class="col-form-label col-form-label-lg col-sm-2">Unit Name</label>
<p class="form-control form-control-plaintext col-sm-10 form-control-lg" id="unit_name">  <em>[{{$unit->name}}]</em></p>
</div>
<div class="form-group row">
<label for="code" class="col-form-label col-form-label-lg col-sm-2">code</label>
<p class="form-control col-sm-10 form-control-plaintext form-control-lg" id="code"><em>[{{$unit->code}}]</em></p>
</div>
<div class="form-group row">
<label for="description" class="col-form-label col-form-label-lg col-sm-2">Unit Description</label>
<p class="form-control col-sm-10 form-control-plaintext form-control-lg" id="description"><em>[{{$unit->description}}]</em></p>
</div>

</form>

</div>

@endSection
@endpermission