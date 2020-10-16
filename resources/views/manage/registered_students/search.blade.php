@extends('layouts.manage')
@section('content')
<div class="container">
    @if(isset($students))
    <div class="row">
        <div class="col-md-6 d-flex justify-content-between align-items-center">
            <h3><em class="text-danger">{{count($students)}}  Students </em></h3>
            <a href="{{route('search.export')}}" class="btn btn-sm btn-primary m-2"> <i class="fa fa-download">Download Excel</i></a>
        </div>
        <div class="col-md-6 d-flex justify-content-between align-items-center">
    <form action="{{route('registered.search')}}" method="POST" role="search">
        {{csrf_field()}}
        <div class="input-group">
         <input type="text" class="form-control" name="the_search" placeholder="search">
         <span class="input-group-btn">
             <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
         </span>
        </div>
    </form>
        <a href="#" class="btn btn-info"><i class="fa fa-user-plus"></i>Create</a>
        </div>
    </div>
    <hr class="mb-0">
    <div class="card mb-5">
        <div class="card-content">
            <div class="table-responsive">
<table class="table table-sm">
    <thead class="thead-light">
        <tr>
       <th>National ID</th>
       <th>Passport</th>
       <th>Full Name </th>
       <th>Gender</th>
       <th>Phone Number</th>
       <th>Email</th>
       <th>Course Registered</th>
       <th>Registered On</th>
       <th>County</th>
       <th>Intake</th>
       <th>K.C.S.E Year</th>
       <th>K.C.S.E Grade</th>
       <th> View</th>
       <th>Edit</th>
    </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
        <td>{{$student->id_no}}</td> 
        <td><img src="/storage/student/passport/{{$student->passport}}"  style="height:40px; width:auto;" alt="No passport"></td>
        <td>{{$student->full_name}}</td> 
        <td>{{$student->gender}}</td>
        <td>{{$student->phone_no}}</td> 
        <td>{{$student->email}}</td> 
        <td>{{$student->course->name}}</td> 
        <td>{{$student->created_at}}</td>
        <td>{{$student->county}}</td>
        <td>{{$student->intake}}</td>
        <td>{{$student->kcse_year}}</td>
        <td>{{$student->kcse_meangrade}}</td>
        <td> {{$student->class->code? $student->class->code : 'No assigned!' }}</td>
        <td><a href="{{route('students.show', $student->id)}}"><i class="fa fa-binoculars"></i></a></td> 
        <td><a href="{{route('students.edit', $student->id)}}"><i class="fa fa-edit"></i></a></td>
    
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>
{{$students->links()}}
@else
<h3 class="text-danger"><em>{{$message}}</em></h3>
@endif
</div>
@endSection