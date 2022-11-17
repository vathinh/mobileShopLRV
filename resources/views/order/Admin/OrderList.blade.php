@extends('theme.app')

@section('content')
    <section class="content">
    <a class="btn btn-primary" href="{{ url("admin/order/list") }}">Back to Orders List</a>
  
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders List</h3>

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
                        
                            <th style="text-align: center;">Order ID</th>
                            <th style="text-align: center;">User Name</th>                                                     
                            <th style="text-align: center;">Phone </th>
                            <th style="text-align: center;">Order Method</th>
                            <th style="text-align: center;">Order Status</th>
                            <th style="text-align: center;">Order Date</th>
                            <th style="text-align: center;">Action</th>

                           
                            
                        </tr>
                  </thead>
                  <tbody
                    @foreach($rs as $data)
                        <tr>
                            <td style="text-align: center;"> {{ $data -> O_id }}</td>
                            <td style="text-align: center;"> {{ $data -> name }}</td>
                            <td style="text-align: center;"> {{ $data -> O_phone }}</td>
                            <td style="text-align: center;"> {{ $data -> O_method == '1' ? 'card':'cash' }}</td>
                            <td style="text-align: center;"> 
                              <span
                              class="{{  $data -> O_status == 0 ? 'role user' : ($data -> O_status == 1 ? 'role member' : ($data -> O_status == 2 ? 'role admin' : '')) }}" 
                              >{{  $data -> O_status == 0 ? 'Pending' : ($data -> O_status == 1 ? 'Shipping' : 'Cancel') }}</span></td>
                            <td style="text-align: center;"> {{ $data -> created_at }}</td>                          
                            <td style="text-align: center;">
                              @if($data -> O_status == 0)
                              <a class="btn btn-success" href="{{ url("/admin/order/acceptstatus/{$data -> O_id}") }}">accept status</a>
                              <a onclick="return confirm('Are you sure you want to decline this order?')"  class="btn btn-danger" href="{{ url("/admin/order/declinestatus/{$data -> O_id}") }}">decline order</a>
                              @endif
                              @if($data -> O_status == 1)
                              <a onclick="return confirm('Are you sure you want to decline this order?')"  class="btn btn-danger" href="{{ url("/admin/order/declinestatus/{$data -> O_id}") }}">decline order</a>
                              @endif

                              @if($data -> O_status == 2)
                              <a class="btn btn-success" href="{{ url("/admin/order/acceptstatus/{$data -> O_id}") }}">accept status</a>
                              @endif
                          </td>
                          <td>
                          <a class="btn btn-primary" href="{{ url("/admin/order/showDetails/{$data -> O_id}") }}">Show more </a>
                          </td>
                            
                          
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
       
    </section>

    @endsection