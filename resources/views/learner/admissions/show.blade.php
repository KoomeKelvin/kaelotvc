@extends('layouts.student-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <a href="{{route('admissions.index')}}"><i class="fa fa-arrow-left">Go back</i></a> 
                   &nbsp; Student Dashboard

                </div>
            <a href="/storage/student/paymentreceipt/{{$fee->location}}">View your receipt</a>
                        

            </div>
        </div>
    </div>
</div>
@endsection