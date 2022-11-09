@extends('userLayout.app')

@section('content')
    <section class="content">
    <button><a href="{{ url("admin/home") }}">Back to home</a></button>
    <h1>List of Orders</h1>
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

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
                            
                            <th style="text-align: center;">Product Image</th>
                            <th style="text-align: center;">Product Name</th>
                            <th style="text-align: center;">Order Date</th>                           
                            <th style="text-align: center;">Order Quantity</th>
                            <th style="text-align: center;">Product Price</th>
                            <th style="text-align: center;">Order Status</th>
                        </tr>
                  </thead>
                  <tbody
                    @foreach($rs as $data)
                        <tr>
                            <td style="text-align: center;"> {{ $data -> O_id }}</td>
                           
                            <td style="text-align: center;"><img src="{{ asset('/image/'.$data-> P_imgPath)  }}" alt=""> </td>
                            <td style="text-align: center;"> {{ $data -> P_name }}</td>
                            <td style="text-align: center;"> {{ $data -> created_at }}</td>
                            <td style="text-align: center;"> {{ $data -> QD_quantity }}</td> 
                            <td style="text-align: center;"> {{ $data -> P_price }}</td>
                            <td style="text-align: center;"> {{  $data -> O_status == 0 ? 'Pending' : ($data -> O_status == 1 ? 'Shipping' : 'Cancel') }}</td>
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