@extends('theme.app')

@section('content')
    <section class="content">
    <a class="btn btn-primary" href="{{ url("admin/order/list") }}">Back to Orders List</a>
  
    <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Orders Details List</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <h6>Name : </h6>
                            
                        </div>
                        <div class="input-group input-group-sm">
                                <h6>Address: {{$ro -> O_delieveryAddress}}</h6>
                        </div>

                        <div class="input-group input-group-sm">
                                <h6>Phone: {{$ro -> O_phone}}</h6>
                        </div>

                        <div class="input-group input-group-sm">
                                <h6>Order Date: {{$ro -> created_at}}</h6>
                        </div>
                        

                        <div class="input-group input-group-sm">
                                <h6>Order Method: {{ $ro -> O_method == '1' ? 'card':'cash' }}</h6>
                        </div>

                        <div class="input-group input-group-sm">
                                <h6>Order Status: <span
                              class="{{  $ro -> O_status == 0 ? 'role user' : ($ro -> O_status == 1 ? 'role member' : ($ro -> O_status == 2 ? 'role admin' : '')) }}" 
                              >{{  $ro -> O_status == 0 ? 'Pending' : ($ro -> O_status == 1 ? 'Shipping' : 'Cancel') }}</span></h6>
                        </div>


                     </div>
                </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                        
                            <th style="text-align: center;">Order Detail ID</th>
                            <!-- <th style="text-align: center;">User Name</th>                                                      -->
                            <!-- <th style="text-align: center;">Order DelieveryAddress</th> -->
                            <!-- <th style="text-align: center;">Phone </th> -->
                            <!-- <th style="text-align: center;">Order Method</th> -->
                            <!-- <th style="text-align: center;">Order Status</th> -->
                            <!-- <th style="text-align: center;">Order Date</th> -->
                            <th style="text-align: center;">Product Image</th>
                            <th style="text-align: center;">Product Name</th>
                            <th style="text-align: center;">Quantity</th>
                            <th style="text-align: center;">Price</th>




                           
                            
                        </tr>
                  </thead>
                  <tbody
                    @foreach($rs as $data)
                    
                        <tr>
                            <td style="text-align: center;"> {{ $data -> OD_id }}</td>
                            <td style="text-align: center;"><img src="{{ asset('/image/'.$data-> P_imgPath)  }}" alt="" style="width: 20%"> </td>
                            <td style="text-align: center;"> {{ $data -> P_name }}</td>
                            <td style="text-align: center;"> {{ $data -> quantity }}</td>
                            <td style="text-align: center;"> {{ $data -> P_price }}</td>
                           
                            
                          
                            
                        </tr>
                    @endforeach
                    <tr>
        
                    <td style="text-align: center;">
                              @if($ro -> O_status == 0)
                              <a  class="btn btn-success" href="{{ url("/admin/order/acceptstatus/{$ro -> O_id}") }}">accept status</a>
                              <a onclick="return confirm('Are you sure you want to decline this order?')" class="btn btn-danger" href="{{ url("/admin/order/declinestatus/{$ro -> O_id}") }}">decline order</a>
                              @endif
                              @if($ro -> O_status == 1)
                              <a  onclick="return confirm('Are you sure you want to decline this order?')"  class="btn btn-danger" href="{{ url("/admin/order/declinestatus/{$ro -> O_id}") }}">decline order</a>
                              @endif

                              @if($ro -> O_status == 2)
                              <a class="btn btn-success" href="{{ url("/admin/order/acceptstatus/{$ro -> O_id}") }}">accept status</a>
                              @endif
                    </td>
                         
                    </tr>
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