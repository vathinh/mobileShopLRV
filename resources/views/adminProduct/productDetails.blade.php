@extends('theme.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
@yield('content')
<section class="content">
  <button><a href="{{ url("admin/home") }}">Back to dashboard</a></button> <br>
  <button><a href="{{ url('/admin/product/readCategory') }}">Go to Category</a></button> <br>
  <button><a href="{{ url('/admin/product/createproduct') }}">Create New Product</a></button>
  <!-- Open Content -->
  <!-- /.card-header -->
  <section class="bg-light">
    <div class="container pb-5">
      <div>
        <br>
        <h3 style="text-align: center;">Product Infomation</h3>
      </div>
      <div class="row">
        <div class="col-lg-5 mt-5">
          <div class="card mb-3">
            <img src=" {{ asset('/image/'.$product-> P_imgPath) }} " alt="" style="width:400px;height: 400px;">
          </div>
        </div>
        <!-- col end -->
        <div class="col-lg-7 mt-5">
          <div class="card">
            <div class="card-body">
              <ul class="list-inline">
                <li class="list-inline-item">
                  <h6>Product Name:</h6>
                </li>
                <li class="list-inline-item">
                  <p class="text-muted"><strong>{{ $product -> P_name }}</strong></p>
                </li>
              </ul>
              <ul class="list-inline">
                <li class="list-inline-item">
                  <h6>Price: </h6>
                </li>
                <li class="list-inline-item">
                  <p class="text-muted"><strong>{{ $product -> P_price }}</strong></p>
                </li>
              </ul>

              <ul class="list-inline">
                <li class="list-inline-item">
                  <h6>Brand:</h6>
                </li>
                <li class="list-inline-item">
                  <p class="text-muted"><strong>{{ $product -> C_name }}</strong></p>
                </li>
              </ul>

              <ul class="list-inline">
                <li class="list-inline-item">
                  <h6>Color :</h6>
                </li>
                <li class="list-inline-item">
                  <p class="text-muted"><strong>{{ $product -> P_color }}</strong></p>
                </li>
              </ul>

              <ul class="list-inline">
                <li class="list-inline-item">
                  <h6>Storage :</h6>
                </li>
                <li class="list-inline-item">
                  <p class="text-muted"><strong>{{ $product -> P_storage }}</strong></p>
                </li>
              </ul>
              <ul class="list-inline">
                <li class="list-inline-item">
                  <h6>Action :</h6>
                </li>
                <li class="list-inline-item">
                  <a href="{{ url("/admin/product/updateProduct/{$product -> P_id}") }}">
                    <button type="button" class="btn btn-success">Update</button>
                  </a>
                </li>
              </ul>
              <ul class="list-inline">
                <li class="list-inline-item">
                  <h6>Description :</h6>
                </li>
                <li class="list-inline-item">
                  <p class="text-muted">{{ $product -> C_desc }}</p>
                </li>
              </ul>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection