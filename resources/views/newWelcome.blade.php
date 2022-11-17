@extends('userLayout.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

    @yield('content')
    <div class="row justify-content-center">
    @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="card text-black">
            <img src="{{ asset('/image/'.$product-> P_imgPath) }}" style="width: 400px;height: 250px ;"
                class="card-img-top" alt="Apple Computer" />
            <div class="card-body">
                <div class="text-center">
                <h5 class="card-title"><a href="{{ url("/user/productDetails/{$product -> P_id}") }}">{{ $product->P_name }}</a></h5>
                <p class="text-muted mb-4"><strong>Price: </strong> {{ $product->P_price }}$</p>
                <p class="btn-holder"><a href="{{ route('add.to.cart', $product->P_id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                </div>
            </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection

