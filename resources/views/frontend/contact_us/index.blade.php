@extends('layouts.frontend')
@section('content')
<!-- contact section -->
<div class="container">
    <div class="row">
        <div class="col-md-10 d-flex justify-content-center">
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.742044729967!2d37.94591634033785!3d0.3542865097033954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x412b2dae98ce1d7e!2sKAELO%20TECHNICAL%20TRAINING%20INSTITUTE!5e0!3m2!1sen!2ske!4v1602141361639!5m2!1sen!2ske" width="600" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-md-10">
            <p class="list-header d-flex justify-content-center">SEND US A FEEDBACK / ENQUIRY</p>
        <form action="{{route('frontend.feedback')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-form-label col-md-2">
                        Name
                    </label>
                    <input type="text" name="name" id="name" class="form-control col-md-10">
                </div>
                <div class="form-group row">
                    <label for="email" class="col-form-label col-md-2">
                        Email
                    </label>
                    <input type="email" id="email" name="feedback_email" class="form-control col-md-10">
                </div>
                <div class="form-group row">
                    <label for="subject" class="col-form-label col-md-2">
                        Subject
                    </label>
                    <input type="subject" id="subject" name="subject" class="form-control col-md-10">
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-2" for="message">Message</label>
                    <textarea name="message" class="form-control col-md-10" id="message" cols="30" rows="10">
                    </textarea>
                </div>
                <div class="form-group row justify-content-center">
                    <button class="btn btn-outline-info">Send</button>
                </div>


            </form>
        </div>
    </div>
</div>
</div>
@endSection