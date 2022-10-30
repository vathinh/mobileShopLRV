@extends('feedback.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Students Page</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Feedback Id : {{ $feedback->FB_id }}</h5>
        <p class="card-text">Product Id : {{ $feedback->P_id }}</p>
        <p class="card-text">Guest Name : {{ $feedback->guestName }}</p>
        <p class="card-text">Guest Email : {{ $feedback->guestEmail }}</p>
        <p class="card-text">Subject : {{ $feedback->subject }}</p>
        <p class="card-text">Comment : {{ $feedback->comment }}</p>
  </div>
    </hr>
  </div>
</div>