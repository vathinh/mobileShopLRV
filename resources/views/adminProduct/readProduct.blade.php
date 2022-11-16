@extends('theme.app')

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">
  {{ session('success')}}
</div>
@endif
<section class="content">
  <button><a href="{{ url("admin/home") }}">Back to dashboard</a></button> <br>
  <button><a href="{{ url('/admin/product/readCategory') }}">Go to Category</a></button> <br>
  <button><a href="{{ url('/admin/product/createproduct') }}">Create New Product</a></button>
  <div>
    <h3 style="text-align: center">List of Products</h3>
  </div>

</section>
<div class="row m-t-30">
  <div class="col-md-12">
    <!-- DATA TABLE-->
    <div class="table-responsive m-b-40">
      <table class="table table-borderless table-data3">
        <thead>
          <tr>
            <th style="text-align: center;">ID</th>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Price</th>
            <th style="text-align: center;">Type</th>
            <th style="text-align: center;">Action</th>
          </tr>
        </thead>

        <tbody>
          @foreach($rs as $product)
          <tr>
            <td style="text-align: center;"> {{ $product -> P_id }}</td>
            <td style="text-align: center;"><a href="{{ url("/admin/product/a_productDetails/{$product -> P_id}") }}">{{ $product -> P_name }}</a></td>
            <td style="text-align: center;"> {{ $product -> P_price }}</td>
            <td style="text-align: center;"> {{ $product -> C_name }}</td>
            <td class="card-body" style="text-align:center">
             
                <a href="{{ url("/admin/product/updateProduct/{$product -> P_id}") }}">
                  <button type="button" class="btn btn-success">Update</button>
                </a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- END DATA TABLE-->
  </div>
</div>

@endsection