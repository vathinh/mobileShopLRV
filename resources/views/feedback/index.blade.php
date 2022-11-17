@extends('theme.app')
@section('content')
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Feedback Manage</h2>
                    </div>
                    @if(Auth::check() && Auth::user()->role == "admin")
                    <div class="card-body">
                        <!-- <a href="{{ url('/admin/product/feedback/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            Add New
                        </a>
                        <br/>
                        <br/> -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Feedback ID</th>
                                        <th>Product ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Comment</th>
                                        <th>Admin Reply</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($feedback as $item)
                                    <tr>
                                        <td>{{ $item->FB_id }}</td>
                                        <td>{{ $item->P_id }}</td>
                                        <td>{{ $item->guestName }}</td>
                                        <td>{{ $item->guestEmail }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->comment }}</td>
                                        <td style="color: blue;">{{ $item->adminReply }}</td>
                                        <td>
                                            <a href="{{ url('/admin/product/feedback/' . $item->FB_id) }}" title="View Feedback"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/product/feedback/' . $item->FB_id . '/edit') }}" title="Edit Feedback"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Reply</button></a>
  
                                            <form method="POST" action="{{ url('/admin/product/feedback' . '/' . $item->FB_id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Feedback" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Feedback ID</th>
                                        <th>Product ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Comment</th>
                                        <th>Admin Reply</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($feedback as $item)
                                    @if($item->guestEmail == Auth::user()->email)
                                    <tr>
                                        <td>{{ $item->FB_id }}</td>
                                        <td>{{ $item->P_id }}</td>
                                        <td>{{ $item->guestName }}</td>
                                        <td>{{ $item->guestEmail }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->comment }}</td>
                                        <td style="color: blue;">{{ $item->adminReply }}</td>
                                        <td>
                                            <a href="{{ url('/user/product/feedback/' . $item->FB_id) }}" title="View Feedback"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <!-- <a href="{{ url('/admin/product/feedback/' . $item->FB_id . '/edit') }}" title="Edit Feedback"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a> -->
  
                                            <!-- <form method="POST" action="{{ url('/admin/product/feedback' . '/' . $item->FB_id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Feedback" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form> -->
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection