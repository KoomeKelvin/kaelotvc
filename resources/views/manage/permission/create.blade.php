@extends('layouts.manage')
@permission('create-acl')
@section('content')
<div class="container">
<div class="row">
 <h3>Create a new Permission</h3>
</div>
<hr class="mb-0">
<form action="{{route('permissions.store')}}" method="POST">
@csrf
<div class="custom-control custom-radio custom-control-inline">
    <input type="radio" name="permissions" v-model="permission_option" id="general" value="general" class="custom-control-input" >
    <label for="general" class="custom-control-label">General Permissions</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" name="permissions" v-model="permission_option" id="crud" value="crud" >
        <label for="crud" class="custom-control-label">Create, Read, Update Permission</label>
    </div>
    <div class="form-group row" v-if="permission_option=='general'">
            <label for="full_name" class="col-sm-2 col-form-label">Permission Full Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="e.g. Update Profile">
            </div>
        </div>
<div class="form-group row" v-if="permission_option=='general'">
    <label for="abbreviation" class="col-sm-2 col-form-label">Permission ShortName</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="abbreviation" name="abbreviation" placeholder="e.g. update-blog">
   </div>
</div>

    <div class="form-group row" v-if="permission_option=='general'">
            <label for="description" class="col-sm-2 col-form-label">Permission Desription</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="description" name="description" placeholder="e.g. Allow users their profile">
        </div>
        </div>
        <div class="form-group row" v-if="permission_option=='crud'">
<label for="privilege" class="col-sm-2 col-form-label" >privilege</label>
<div class="col-sm-10">
    <input type="text" class="form-control" name="privilege" v-model="privilege" id="privilege">
</div>
        </div>
        <div class="form-row" v-if="permission_option=='crud'">
            {{-- start of column md-4 --}}
<div class="col-md-4">
<div class="custom-control custom-switch">
    <input type="checkbox" class="custom-control-input"  v-model="optionChoosen"  id="create" value="create">
    <label for="create" class="custom-control-label">Create</label>
</div>
<div class="custom-control custom-switch">
    <input type="checkbox" class="custom-control-input"  v-model="optionChoosen" id="read" value="read">
    <label for="read" class="custom-control-label">Read</label>
</div>
<div class="custom-control custom-switch">
    <input type="checkbox" class="custom-control-input"  v-model="optionChoosen" id="update" value="update">
    <label for="update" class="custom-control-label"> Update</label>
</div>
<div class="custom-control custom-switch">
    <input type="checkbox" class="custom-control-input"  v-model="optionChoosen"  id="delete" value="delete">
    <label for="delete" class="custom-control-label">Delete</label>
</div>
</div>
{{-- end of column md-4 --}}
<input type="text" :value="optionChoosen" name="option_choosen" hidden>
{{-- start of column md-8 --}}
<div class="col-md-8">
<table class="table table-sm" v-if="privilege.length >=3 && optionChoosen.length > 0" >
<thead>
<th>Permission FullName</th>
<th>Permission ShortName</th>
<th>Permission Description</th>
</thead>
<tbody>
    <tr v-for="item in optionChoosen">
<td v-text="optionFullName(item)"> </td>
<td v-text="optionShortName(item)"> </td>
<td v-text="optionDescription(item)"> </td>
    </tr>
</tbody>
</table>
</div>
{{-- end of the column md-8--}}
        </div>
        {{-- end to the row --}}
<button class="btn btn-lg btn-outline-success">Create Permission</button>
    </form>
</div>
@endsection
@section('script')
<script>
var app= new Vue({
el: '#app',
data:{
    permission_option:'general',
    privilege: '',
    optionChoosen : ['create' , 'read', 'update', 'delete']
},
methods:
{
    optionFullName:function(item){
        // the below code creates a capital letter at the beginning of each word in javascript
        return item.substr(0, 1).toUpperCase()+item.substr(1)+ " "+ app.privilege.substr(0,1).toUpperCase() + app.privilege.substr(1);
    },
    optionShortName:function(item){
        // converts the string to lowercase in javascript
        return item.toLowerCase()+ "-" + app.privilege.toLowerCase();
    },
    optionDescription: function(item){
        return "Permit the user to " + item.toUpperCase() + "a " + app.privilege.substr(0, 1).toUpperCase() + app.privilege.substr(1);

    }
}

});
</script>
@endsection
@endpermission