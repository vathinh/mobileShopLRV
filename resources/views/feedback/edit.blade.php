@extends('feedback.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Reply Feedback</div>
  <div class="card-body">
       
      <form action="{{ url('/admin/product/feedback/' .$feedback->FB_id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <label>Feedback Id</label></br>
        <input type="text" name="P_id" id="P_id" value="{{$feedback->FB_id}}" readonly id="id" class="form-control" disabled></br>
        <label>Product Id</label></br>
        <input type="text" name="P_id" id="P_id" value="{{$feedback->P_id}}" readonly id="id" class="form-control"></br>
        <label>Name</label></br>
        <input type="text" name="guestName" id="name" value="{{$feedback->guestName}}" readonly class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="guestEmail" id="email" value="{{$feedback->guestEmail}}" readonly class="form-control"></br>
        <label>Subject</label></br>
        <input type="text" name="subject" id="subject" value="{{$feedback->subject}}" readonly class="form-control"></br>
        <label>Comment</label></br>
        <input type="text" name="comment" id="comment" value="{{$feedback->comment}}" readonly class="form-control"></br>
        <label>Admin Reply</label></br>
        <input type="text" name="adminReply" id="adminReply" value="{{$feedback->adminReply}}" class="form-control"></br>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop