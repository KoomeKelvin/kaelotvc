@extends('layouts.manage')
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-4">
        <a href="{{route('marks.show', $unit->class->id)}}" class="btn btn-info"><i class="fa fa-arrow-left"> &nbsp; Go Back</i></a>
    </div>
    <div class="col-md-8">
        <h3>Feedback Forum</h3>
    </div>
</div>
<hr>
    @if(!empty($discussions))
    <div class="card mb-5">
        <div class="card-content">
        <table class="table table-sm">
            <thead class="thead-light">
                <tr>
                    <th>Post Title</th>
                    <th>Posted By</th>
                    <th>Total Comments</th>
                    <th>View</th>
                </tr>
                <tbody>
                    @foreach($discussions as $discussion)
                        <tr>
                            <td>{{$discussion->title}}</td>
                            <td>{{$discussion->user->name}} on {{$discussion->updated_at->toFormattedDateString()}}</td>
                            <td>{{count($discussion->comments)}}</td>
                        <td><a href="{{route('elimishacomments', $discussion->id)}}" class="btn btn-outline-info"><i class="fa fa-eye"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </thead>
        </table>
    </div>
    </div>
    @endif
</div>

@endsection