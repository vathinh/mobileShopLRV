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
              <div class="card-body table-responsive p-0" $product as $product>
                
                            <h5>Name: <a href="<a href="{{ url("/admin/product/a_productDetails/{$product -> P_id}") }}">{{ $product -> P_name }}</a></h5> <br>
                            <h5>ID: {{ $product -> P_id }} </h5> <br>
                            <h5>Price: {{ $product -> P_price }}</h5> <br>
                            <h5>Color: {{ $product -> P_color }}</h5> <br>
                            <h5>Quantity: {{ $product -> P_quantity }}</h5> <br>
                            <h5>Action: <a href="{{ url("/admin/product/updateProduct/{$product -> P_id}") }}">Update</a></h5> <br>
                            <p>Image: <img src=" {{ asset('/image/'.$product-> P_imgPath) }} " alt="" style="width:260px;height: 260px;"></p>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
       
    </section>

    @endsection
