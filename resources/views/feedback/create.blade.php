@extends('feedback.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  {{ csrf_field() }}
  <div class="card-header">Thank you for your feedback</div>
  <div class="card-body">
  <button><a href="{{ url("/") }}">Back to Home page</a></button>
  </div>
</div>
  
@stop