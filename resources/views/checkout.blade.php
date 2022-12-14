<!DOCTYPE html>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.containerr {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<h2>Responsive Checkout Form</h2>
<p>Resize the browser window to see the effect. When the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other.</p>
<div class="row">
  <div class="col-75">
    <div class="containerr">
      <form action="{{ url("user/createOrderProc/{$od -> O_id}") }}" method="POST">
      @csrf
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Name</label>
            <input type="text" id="fname" name="txtName" placeholder="John M. Doe" value="{{ Auth::user()->name }}">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="txtEmail" placeholder="john@example.com" value="{{ Auth::user()->email }}">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="txtAddress" placeholder="542 W. 15th Street" value="{{ Auth::user()->address }}">
            <label for="city"><i class="fa fa-institution"></i> Phone</label>
            <input type="text" id="city" name="txtPhone" placeholder="0123456789" value="{{ Auth::user()->phone }}">

      
          </div>

          
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Continue to checkout" class="btn">
     
    </div>
  </div>

  <div class="col-25">
    <div class="containerr">
        <!-- TOP CAMPAIGN-->
        <div class="top-campaign">
            <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{ count((array) session('cart')) }}</b></span></h4>
            <div class="table-responsive">
                <table class="table table-top-campaign">
                    <thead>
                      <tr>
                        <td><b>Order Id</b></td>   
                        <td>
                          <h4><b>{{ $od -> O_id}}</b></h4>
                        </td>
                      </tr>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>                       
                    </thead>
                    <tbody>
                    @php $total = 0 @endphp
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        <tr>
                           
                          <td>
                            <p>{{ $details['name'] }}</p>
                            <!-- <input type="text" name="txtProductName" value="{{ $details['name'] }}" readonly> -->
                            </td>

                            <td>
                            <p>{{ $details['quantity'] }}</p>
                              <!-- <input type="text" name="txtProductQuantity" value="{{ $details['quantity'] }}" readonly> -->
                            </td>

                            <td>
                            <p>${{ $details['price'] * $details['quantity'] }}</p>
                              <!-- <input type="text" name="txtProductPrice" value="${{ $details['price'] * $details['quantity'] }}" readonly> -->
                            </td>
                        </tr>
                        @endforeach
                     @endif
               
                    </tbody>
                    <tfoot>
                    <hr>
                        <tr>
                          
                            <td>
                              
                                <p>Total</p>
                            </td>
                            <td>

                            </td>
                            <td>
                               <p>${{ $total }}</p>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            </form>
        </div>
        <!--  END TOP CAMPAIGN-->
     
    </div>
  </div>
  
</div>
@include('userLayout.footer')
</body>
</html>
