
@extends('userLayout.app')

@section('content')
<button><a href="{{ url("/user/home") }}">Back to dashboard</a></button>
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
                                    <h1 class="h2">Active Wear</h1>
                                    <p class="h3 py-2">$25.00</p>
                                    <p class="py-2">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-secondary"></i>
                                        <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                                    </p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h6>Brand:</h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <p class="text-muted"><strong>Easy Wear</strong></p>
                                        </li>
                                    </ul>

                                    <h6>Description:</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse. Donec condimentum elementum convallis. Nunc sed orci a diam ultrices aliquet interdum quis nulla.</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h6>Avaliable Color :</h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <p class="text-muted"><strong>White / Black</strong></p>
                                        </li>
                                    </ul>

                                    <h6>Specification:</h6>
                                    <ul class="list-unstyled pb-3">
                                        <li>Lorem ipsum dolor sit</li>
                                        <li>Amet, consectetur</li>
                                        <li>Adipiscing elit,set</li>
                                        <li>Duis aute irure</li>
                                        <li>Ut enim ad minim</li>
                                        <li>Dolore magna aliqua</li>
                                        <li>Excepteur sint</li>
                                    </ul>

                                    <form action="" method="GET">
                                        <input type="hidden" name="product-title" value="Activewear">
                                        <div class="row">
                                            <div class="col-auto">
                                                <ul class="list-inline pb-3">
                                                    <li class="list-inline-item">Size :
                                                        <input type="hidden" name="product-size" id="product-size" value="S">
                                                    </li>
                                                    <li class="list-inline-item"><span class="btn btn-success btn-size">S</span></li>
                                                    <li class="list-inline-item"><span class="btn btn-success btn-size">M</span></li>
                                                    <li class="list-inline-item"><span class="btn btn-success btn-size">L</span></li>
                                                    <li class="list-inline-item"><span class="btn btn-success btn-size">XL</span></li>
                                                </ul>
                                            </div>
                                            <div class="col-auto">
                                                <ul class="list-inline pb-3">
                                                    <li class="list-inline-item text-right">
                                                        Quantity
                                                        <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                                    </li>
                                                    <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                                    <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                                    <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col d-grid">
                                                <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                                            </div>
                                            <div class="col d-grid">
                                                <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">Add To Cart</button>
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
            <div class="card-header">
                        <h2>Feedback Review</h2>
                    </div>
            <div class="card" class="table-responsive" >
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Comment</th>
                                        <th>FeedBack Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($feedback as $item)
                                    <tr>
                                        <td>{{ $item->P_id }}</td>
                                        <td>{{ $item->guestName }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->comment }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                </div> 
            <!-- /.card -->

            @if(Route::has('login'))
                @auth
                <div class="card" style="margin:20px;">
                    <div class="card-header">Create New Feedback</div>
                    <div class="card-body">
                        
                        <form action="{{ url('/product/feedback/') }}" method="post">
                            <label>Product Id</label></br>
                            <input type="text" name="P_id" id="P_id" value="{{ $product -> P_id }}" readonly class="form-control"></br>
                            <label>Name</label></br>
                            <input type="text" name="guestName" id="name" class="form-control" value="{{ Auth::user()->name }}" readonly required></br>
                            <label>Email</label></br>
                            <input type="text" name="guestEmail" id="email" class="form-control" value="{{ Auth::user()->email }}" readonly required></br>
                            <label>Subject</label></br>
                            <input type="text" name="subject" id="subject" class="form-control" required></br>
                            <label>Comment</label></br>
                            <input type="text" name="comment" id="comment" class="form-control" required></br>
                            <input type="submit" value="Save" class="btn btn-success"></br>
                        </form>
                        
                    </div>
                </div>
            @else
                <div class="card" style="margin:20px;">
                        <div class="card-header">Create New Feedback</div>
                        <div class="card-body">
                            <form action="{{ url('/product/feedback/') }}" method="post">
                                <label>Product Id</label></br>
                                <input type="text" name="P_id" id="P_id" value="{{ $product -> P_id }}" readonly class="form-control"></br>
                                <label>Name</label></br>
                                <input type="text" name="guestName" id="name" class="form-control" required></br>
                                <label>Email</label></br>
                                <input type="text" name="guestEmail" id="email" class="form-control" required></br>
                                <label>Subject</label></br>
                                <input type="text" name="subject" id="subject" class="form-control" required></br>
                                <label>Comment</label></br>
                                <input type="text" name="comment" id="comment" class="form-control" required></br>
                                <input type="submit" value="Save" class="btn btn-success"></br>
                            </form>
                            
                        </div>
                </div>
                @endauth
            @endif
        </div>
    </div>
@endsection