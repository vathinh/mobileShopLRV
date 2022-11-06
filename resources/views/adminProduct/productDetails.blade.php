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
                <div class="section__content section__content">
                    <div class="container-fluid">
                        <div class="row" >
                        @$rs as $product
                            <div class="col-xs-18 col-sm-6 col-md-3">
                                <div class="thumbnail">
                                    <div><img src="{{ $product->P_imgPath }}" alt=""></div>
                                    <div class="caption">
                                        <h4><a href="{{ url("/user/productDetails/{$product -> P_id}") }}">{{ $product->P_name }}</a></h4>
                                        <p><strong>Price: </strong> {{ $product->P_price }}$</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->

</section>

@endsection