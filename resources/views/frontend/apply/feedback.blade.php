@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row">
        <div class="jumbotron">
            <h4 class="mt-50">
        {{$student->full_name}}, we congratulate you for this far, kindly check your <b>email </b>we have sent:
            </h4>
            <p>
            A <b>username</b> and a <b>password</b> you will use to get to the student portal to get your admission letter, course requirements and fees structure
            </p>
        </div>    
    </div>
</div>

@endsection