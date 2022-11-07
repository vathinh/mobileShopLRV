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
                
                            <h3>Name: <a href="<a href="{{ url("/admin/product/a_productDetails/{$product -> P_id}") }}">{{ $product -> P_name }}"></a></h3>
                            <h3>ID: {{ $product -> P_id }} </h3>
                            <h3>Price: {{ $product -> P_price }}</h3>
                            <h3>Color: {{ $product -> P_color }}</h3>
                            <h3>Quantity: {{ $product -> P_quantity }}</h3>
                            <h3>Action: <a href="{{ url("/admin/product/updateProduct/{$product -> P_id}") }}">Update</a></h3>
                            <p>Image: <img src=" {{ asset('/image/'.$product-> P_imgPath) }} " alt="" style="width:200px;height: 200px;"></p>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
       
    </section>

    @endsection
