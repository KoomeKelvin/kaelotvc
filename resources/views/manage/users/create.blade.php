@extends('layouts.manage')
@permission('create-users')
@section('content')

    <div class="container ml-4">
<div class="row">
 <h1>Create a new User</h1>
</div>
<hr>
<form action="{{route('users.store')}}" method="POST">
    @csrf
    <div class="form-group row">
<label for="name" class="col-sm-2">Name</label>
<input type="text" class="form-control col-sm-10" id="name" name='name' placeholder="Koome">
    </div>
    <div class="form-group row">
<label for="email"  class="col-sm-2">Email</label>
<input type="email" class="form-control col-sm-10" placeholder="kelvinkoomeh@gmail.com" id="email" name="email">
    </div>
    <div class="form-group row">
<label for="password"class="col-sm-2">Password</label>
<input type="password"  class="form-control col-sm-10" id="password" name="password" v-if="!autogen">
    </div>
    <div class="custom-control-lg custom-switch">
            <input class="custom-control-input" type="checkbox" v-model="autogen" value="" id="autogenerate_password">
            <label class="custom-control-label" for="autogenerate_password">
           Autogenerate Password
            </label>
        </div>
        <button class="btn btn-outline-info  the_submit">Create</button>

</form>

    </div>
@endsection
@section('script')
<script>
var app= new Vue({
el: '#app',
data:{
    autogen: true
}

});
</script>

@endsection
@endpermission