@extends('layouts.student-app')
@section('content')
<div class="container">
<div class="row">
<h2>Check unit codes discussions / Assignments</h2>
</div>
<hr>
@if(count($units)>0)
<div class="card">
    <div class="card-content">
<table class="table table-sm">
<thead class="thead-light">
    <th>Name</th>
    <th>Unit Code</th>
    <th>All Time Discussions</th>
</thead>
<tbody>
    @foreach($units as $unit)
    <tr>
<td>{{$unit->name}}</td>
<td>{{$unit->code}}</td>
    <td> <a href="{{route('discussions.get', $unit->id)}}" class="btn btn-outline-info"> <i class="fa fa-binoculars"></i></a>{{count($unit->discussions) > 0 ? count($unit->discussions) : '' }} </td>

    </tr>
    @endforeach
</tbody>
</table>

</div>
</div>
@else
<div class="text-danger">No units found!</div>
@endif

</div>
@endSection