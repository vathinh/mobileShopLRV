
@extends('userLayout.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div> 
    @endif

    @yield('content')
    <div class="section__content section__content">
        <div class="container-fluid">
            <div class="row" $rs as $product>
                
                    <div class="col-xs-18 col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <div>image: <img src="{{ $product ->P_imgPath }}" alt=""></div>
                            <div class="caption">
                                <h4><a href="{{ url("/user/productDetails/{$product -> P_id}") }}">{{ $product->P_name }}</a></h4>
                                <p><strong>Price: </strong> {{ $product->P_price }}$</p>
                                <p class="btn-holder"><a href="{{ route('add.to.cart', $product->P_id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Price</th>
                            <th style="text-align: center;">Storage</th>
                            <th style="text-align: center;">Color</th>

                            <th style="text-align: center;">Function</th>
                            </tr>
                        </thead>
                        <tbody $product as $product>
                        <tr>
                            <td style="text-align: center;"> {{ $product -> P_name }}</td>
                            <td style="text-align: center;"> {{ $product -> P_price }}</td>
                            <td style="text-align: center;"> {{ $product -> P_storage }}</td>
                            <td style="text-align: center;"> {{ $product -> P_color }}</td>

                            <td style="text-align: center;">
                                <p class="btn-holder"><a href="{{ route('add.to.cart', $product->P_id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <br><br>

            `<!-- Open Content -->
            <section class="bg-light">
                <div class="container pb-5">
                    <div class="row">
                        <div class="col-lg-5 mt-5">
                            <div class="card mb-3">
                                <img class="card-img img-fluid" src="{{ $product->P_imgPath }}" alt="Card image cap" id="product-detail" height="100">
                            </div>
                            <div class="row">
                                <!--Start Controls-->
                                <div class="col-1 align-self-center">
                                    <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                        <i class="text-dark fas fa-chevron-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </div>
                                <!--End Controls-->
                                <!--Start Carousel Wrapper-->
                                <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                                    <!--Start Slides-->
                                    <div class="carousel-inner product-links-wap" role="listbox">

                                        <!--First slide-->
                                        <div class="carousel-item active">
                                            <div class="row">
                                                <div class="col-4">
                                                    <a href="#">
                                                        <img class="card-img img-fluid" src="{{ $product->P_imgPath }}" alt="Product Image 1">
                                                    </a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="#">
                                                        <img class="card-img img-fluid" src="{{ $product->P_imgPath }}" alt="Product Image 2">
                                                    </a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="#">
                                                        <img class="card-img img-fluid" src="{{ $product->P_imgPath }}" alt="Product Image 3">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.First slide-->

                                        <!--Second slide-->
                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-4">
                                                    <a href="#">
                                                        <img class="card-img img-fluid" src="assets/img/product_single_04.jpg" alt="Product Image 4">
                                                    </a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="#">
                                                        <img class="card-img img-fluid" src="assets/img/product_single_05.jpg" alt="Product Image 5">
                                                    </a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="#">
                                                        <img class="card-img img-fluid" src="assets/img/product_single_06.jpg" alt="Product Image 6">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.Second slide-->

                                        <!--Third slide-->
                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-4">
                                                    <a href="#">
                                                        <img class="card-img img-fluid" src="assets/img/product_single_07.jpg" alt="Product Image 7">
                                                    </a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="#">
                                                        <img class="card-img img-fluid" src="assets/img/product_single_08.jpg" alt="Product Image 8">
                                                    </a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="#">
                                                        <img class="card-img img-fluid" src="assets/img/product_single_09.jpg" alt="Product Image 9">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.Third slide-->
                                    </div>
                                    <!--End Slides-->
                                </div>
                                <!--End Carousel Wrapper-->
                                <!--Start Controls-->
                                <div class="col-1 align-self-center">
                                    <a href="#multi-item-example" role="button" data-bs-slide="next">
                                        <i class="text-dark fas fa-chevron-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <!--End Controls-->
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="col-lg-7 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="h2">{{ $product -> P_name }}</h1>
                                    <p class="h3 py-2">{{ $product -> P_price }}</p>

                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h6>Brand:</h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <p class="text-muted"><strong>{{ $product -> C_name }}</strong></p>
                                        </li>
                                    </ul>
                                    <br>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h6>Avaliable Color :</h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <p class="text-muted"><strong>{{ $product -> P_color }}</strong></p>
                                        </li>
                                    </ul>
                                    <br>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h6>Storage :</h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <p class="text-muted"><strong>{{ $product -> P_storage }}</strong></p>
                                        </li>
                                    </ul>
                                    <br>
                                    <form action="" method="GET">
                                        <input type="hidden" name="product-title" value="Activewear">
                                        <div class="row pb-3">
                                            <div class="col d-grid">
                                                <button type="submit">
                                                    <a href="{{ route('add.to.cart', $product->P_id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection