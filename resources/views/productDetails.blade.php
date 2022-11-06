
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
                            <div><img src="{{ $product ->P_imgPath }}" alt=""></div>
                            <div class="caption">
                                <h4><a href="{{ url("/user/productDetails/{$product -> P_id}") }}">{{ $product->P_name }}</a></h4>
                                <p><strong>Price: </strong> {{ $product->P_price }}$</p>
                                <p class="btn-holder"><a href="{{ route('add.to.cart', $product->P_id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
@endsection