@extends('feedback.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New Feedback</div>
  <div class="card-body">
       
      <form action="{{ url('/admin/product/feedback') }}" method="post">
        {!! csrf_field() !!}
        <label>Product Id</label></br>
        <input type="text" name="P_id" id="P_id" class="form-control"></br>
        <label>Name</label></br>
        <input type="text" name="guestName" id="name" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="guestEmail" id="email" class="form-control"></br>
        <label>Subject</label></br>
        <input type="text" name="subject" id="subject" class="form-control"></br>
        <label>Comment</label></br>
        <input type="text" name="comment" id="comment" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop