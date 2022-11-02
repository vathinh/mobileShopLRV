@extends('theme.app')

@section('content')
    <section class="content">
    <button><a href="{{ url("admin/home") }}">Back to dashboard</a></button>
    <h1>List of User</h1>
    <h3><a href="{{ url('/admin/product/createproduct') }}">Create New Product</a></h3>
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
                        
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Price</th>
                            <th style="text-align: center;">Storage</th>
                            <th style="text-align: center;">Color</th>
                            <th style="text-align: center;">Quantity</th>
                            <th style="text-align: center;">Type</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                  </thead>
                  <tbody
                    @foreach($rs as $data)
                        <tr>
                            <td style="text-align: center;"> {{ $data -> P_id }}</td>
                            <td style="text-align: center;"> {{ $data -> P_name }}</td>
                            <td style="text-align: center;"> {{ $data -> P_price }}</td>
                            <td style="text-align: center;"> {{ $data -> P_storage }}</td>
                            <td style="text-align: center;"> {{ $data -> P_color }}</td>
                            <td style="text-align: center;"> {{ $data -> P_quantity }}</td>
                            <td style="text-align: center;"> {{ $data -> C_name }}</td>
                            <td style="text-align: center;">
                                <a href="{{ url("/admin/product/updateProduct/{$data -> P_id}") }}">Update</a>
                                <!-- <a href="{{ url("/admin/product/deleteProduct/{$data -> P_id}") }}">Delete</a> -->
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
