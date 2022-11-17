@extends('feedback.layout')
@section('content')

<div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content py-md-5 px-md-4 p-sm-3 p-4">
        
        <h3>Thank you for your feedback</h3>
            <i class="fa fa-bell"></i>
            <p class="r3 px-md-5 px-sm-1">We will check and reply to you soon</p>
    
            <div class="text-center mb-3"> <button class="btn btn-primary w-50 rounded-pill b1"><a style="color:white" href="{{ url("/") }}">Back to Home page</a></button> </div>
        </div>
  </div>
@stop