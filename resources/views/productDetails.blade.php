@extends('userLayout.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

    @yield('content')
    <div class="section__content section__content">
            <!-- Open Content -->
            <!-- /.card-header -->
            <section class="bg-light">
                <div class="container pb-5">
                    <div class="row">
                        <div class="col-lg-5 mt-5">
                            <div class="card mb-3">
                                <img src=" {{ asset('/image/'.$product-> P_imgPath) }} " alt="" style="width:550px;height: 550px;">
                            </div>
                            <div class="row">
                                <!--Start Controls-->
                                <div class="col-1 align-self-center">

                                </div>
                                <!--End Controls-->
                                <!--Start Carousel Wrapper-->
                                <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                                    <!--Start Slides-->
                                    <div class="carousel-inner product-links-wap" role="listbox">

                                        <!--First slide-->
                                        <div class="carousel-item active">
                                            <div class="row">
      
                                            </div>
                                        </div>
                                        <!--/.First slide-->

                                        <!--/.Second slide-->

                                        <!--Third slide-->
                                        <div class="carousel-item">
                                            <div class="row">
 
                                            </div>
                                        </div>
                                        <!--/.Third slide-->
                                    </div>
                                    <!--End Slides-->
                                </div>
                                <!--End Carousel Wrapper-->
                                <!--Start Controls-->
                                <div class="col-1 align-self-center">
  
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

            <div class="card-header">
                        <h2>Feedback Review</h2>
                    </div>
            <div class="card" class="table-responsive" >
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Comment</th>
                                        <th>FeedBack Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($feedback as $item)
                                    <tr>
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
            <section>
            <div class="container my-5 py-5 text-dark">
                <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6">
                    <div class="card">
                    <div class="card-body p-4">
                        <div class="d-flex flex-start w-100">
                        <div class="w-100">
                            <h5>Add a comment</h5>
                            <div class="card-body">
                            <form action="{{ url('/product/feedback/') }}" method="post">
                                @csrf
                                <label>Product Id</label></br>
                                <input type="text" name="P_id" id="P_id" value="{{ $product -> P_id }}" readonly class="form-control"></br>
                                <label>Name</label></br>
                                <input type="text" name="guestName" id="name" class="form-control" value="{{ Auth::user()->name }}" readonly required></br>
                                <label>Email</label></br>
                                <input type="text" name="guestEmail" id="email" class="form-control" value="{{ Auth::user()->email }}" readonly required></br>
                                <label>Subject</label></br>
                                <input type="text" name="subject" id="subject" class="form-control" required></br>
                                <div class="form-outline">
                                <label class="form-label" for="textAreaExample">What is your view?</label>
                                <textarea class="form-control" name="comment" id="comment" required rows="4"></textarea>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                <input type="submit" value="Send" class="btn btn-success">
                                </button>
                                </div>
                            </div>
                            </form> 
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>
            @else
            <section>
            <div class="container my-5 py-5 text-dark">
                <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6">
                    <div class="card">
                    <div class="card-body p-4">
                        <div class="d-flex flex-start w-100">
                        <div class="w-100">
                            <h5>Add a comment</h5>
                            <div class="card-body">
                            <form action="{{ url('/product/feedback/') }}" method="post">
                                @csrf
                                <label>Product Id</label></br>
                                <input type="text" name="P_id" id="P_id" value="{{ $product -> P_id }}" readonly class="form-control"></br>
                                <label>Name</label></br>
                                <input type="text" name="guestName" id="name" class="form-control" required></br>
                                <label>Email</label></br>
                                <input type="text" name="guestEmail" id="email" class="form-control" required></br>
                                <label>Subject</label></br>
                                <input type="text" name="subject" id="subject" class="form-control" required></br>

                                <div class="form-outline">
                                <label class="form-label" for="textAreaExample">What is your view?</label>
                                <textarea class="form-control" name="comment" id="comment" required rows="4"></textarea>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                <input type="submit" value="Send" class="btn btn-success">
                                </button>
                                </div>
                            </div>
                            </form> 
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>
            @endauth
            @endif
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection