<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MobileShop Add To Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="{{ asset('theme/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>MobileShop Team2</title>
</head>
<body>

<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Shopping Cart</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Revmove</th>
                  </tr>
                </thead>
                <tbody>
                @php $total = 0 @endphp
                @php $tq =0 @endphp
                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                        @php 
                          $total += $details['price'] * $details['quantity']                      
                        @endphp     
                        @php
                          $tq += $details['quantity']   
                        @endphp              
                  <tr data-id="{{ $id }}">
                    <td data-th="Product" class="p-4" >
                      <div class="media align-items-center">
                        <img src="{{ asset('/image/'.$details['image'] ) }}" class="d-block ui-w-40 ui-bordered mr-4" alt="" width="300" height="300">
                        <div class="media-body">
                          <a href="#" class="d-block text-dark">{{ $details['name'] }}</a>
                          <small>
                            <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#e81e2c;"></span> &nbsp;
                          </small>
                        </div>
                      </div>
                    </td>

                    <td data-th="Price" class="text-right font-weight-semibold align-middle p-4">${{ $details['price'] }}</td>

                    <td data-th="Quantity" class="align-middle p-4"><input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart">
                    
                  </td>
                    <td data-th="Subtotal" class="text-right font-weight-semibold align-middle p-4">${{ $details['price'] * $details['quantity'] }}</td>

                    <td class="text-center align-middle px-0" class="actions" >
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa-trash-o"></i></button>
                    </td>
                  </tr>
                @endforeach
                @endif
                </tbody>
              </table>
            </div>
            <!-- / Shopping cart table -->

            @if($tq <= 10 && $tq > -1)
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
              <div class="mt-4">
                <label class="text-muted font-weight-normal">Promocode</label>
                <input type="text" placeholder="ABC" class="form-control">
              </div>
              <div class="d-flex">
                <div class="text-right mt-4 mr-5">
                  <label class="text-muted font-weight-normal m-0">Discount</label>
                  <div class="text-large"><strong>$0</strong></div>
                </div>
                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Total price</label>
                  <div class="text-large"><h4><strong>${{ $total }}</strong></h4></div>
                </div>
              </div>
            </div>
        
            <div class="float-right">
              <a href="{{ url('/') }}" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                @php
                    $id = Auth::user()-> id;
                @endphp
                <a href="{{ url("/checkout/{$id}") }}" class="btn btn-lg btn-primary mt-2"><i class="fa fa-angle-right"></i> Checkout</a>
                @else
                <div class="alert alert-danger" role="alert">
											Total Quantity must in range from 1 - 10. <br>
                      For ordering more products please contact us at 19001821.
                </div>
                @endif
               
          </div>
        
          </div>
      </div>
  </div>


<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@include('userLayout.footer')
</body>
</html>