@extends('theme.app')

@section('content')
    <section class="content">
    <button><a href="{{ url("admin/home") }}">Back to dashboard</a></button> <br>
  <button><a href="{{ url('/admin/product/readCategory') }}">Go to Category</a></button> <br>
  <button><a href="{{ url('/admin/product/createproduct') }}">Create New Product</a></button>
    <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" $product as $product>
                <table> 
                  <div style="text-align: center;"><h3>Product Info</h3></div>
                  <tr>
                    <td><h5>Name </h5></td>
                    <td><h5><a href="<a href="{{ url("/admin/product/a_productDetails/{$product -> P_id}") }}">{{ $product -> P_name }}</a></h5></td>
                  </tr>
                  <tr>
                    <td><h5>ID </h5></td>
                    <td><h5>{{ $product -> P_id }}</h5></td>
                  </tr>
                  <tr>
                    <td><h5>Price</h5></td>
                    <td><h5>{{ $product -> P_price }}</h5></td>
                  </tr>
                  <tr>
                    <td><h5>Color</h5></td>
                    <td><h5>{{ $product -> P_color }}</h5></td>
                  </tr>
                  <tr>
                    <td><h5>Quantity</h5></td>
                    <td><h5>{{ $product -> P_quantity }}</h5></td>
                  </tr>
                  <tr>
                    <td><h5>Action </h5></td>
                    <td><h5><a href="{{ url("/admin/product/updateProduct/{$product -> P_id}") }}">Update</a></h5></td>
                  </tr>
                  <tr>
                    <td><h5>Image</h5> </td>
                    <td><p><img src=" {{ asset('/image/'.$product-> P_imgPath) }} " alt="" style="width:260px;height: 260px;"></p></td>
                  </tr>
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
