
@extends('userLayout.app')

@section('content')
<button><a href="{{ url("/user/home") }}">Back to dashboard</a></button>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Price</th>
                            <th style="text-align: center;">Storage</th>
                            <th style="text-align: center;">Color</th>

                            <th style="text-align: center;">Function</th>
                            </tr>
                        </thead>
                        <tbody $product as $product>
                        <tr>
                            <td style="text-align: center;"> {{ $product -> P_name }}</td>
                            <td style="text-align: center;"> {{ $product -> P_price }}</td>
                            <td style="text-align: center;"> {{ $product -> P_storage }}</td>
                            <td style="text-align: center;"> {{ $product -> P_color }}</td>

                            <td style="text-align: center;">
                                <p class="btn-holder"><a href="{{ route('add.to.cart', $product->P_id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <br><br>

                <!-- /.card-body -->
            </div>
            <div class="card-header">
                        <h2>Feedback Review</h2>
                    </div>
            <div class="card" class="table-responsive" >
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Comment</th>
                                        <th>FeedBack Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($feedback as $item)
                                    <tr>
                                        <td>{{ $item->P_id }}</td>
                                        <td>{{ $item->guestName }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->comment }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                </div> 
            <!-- /.card -->
            <div class="card" style="margin:20px;">
                <div class="card-header">Create New Feedback</div>
                <div class="card-body">
                    
                    <form action="{{ url('/admin/product/feedback') }}" method="post">
                        {!! csrf_field() !!}
                        <label>Product Id</label></br>
                        <input type="text" name="P_id" id="P_id" value="{{ $product -> P_id }}" disabled class="form-control"></br>
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
        </div>
    </div>
@endsection