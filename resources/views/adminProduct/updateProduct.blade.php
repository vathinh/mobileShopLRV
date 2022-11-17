@extends('theme.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@yield('content')
<button><a href="{{ url("admin/home") }}">Back to dashboard</a></button> <br>
<button><a href="{{ url('/admin/product/readCategory') }}">Go to Category</a></button> <br>
<button><a href="{{ url('/admin/product/createproduct') }}">Create New Product</a></button>
<div>
    <h3 style="text-align: center;">Update Product Infomation</h3>
</div>
<div class="card">
    <div class="card-body card-block">
        <form method="POST" enctype="multipart/form-data" class="form-horizontal" action="{{ url("/admin/product/updateProductProcess/{$rs -> P_id}") }}">
            @csrf
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">ID</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="txtID" name="txtID" readonly value="{{ $rs -> P_id }}" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="email-input" class=" form-control-label">Product Name: </label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="txtName" name="txtName" value="{{ $rs ->P_name }}" class="form-control" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="email-input" class=" form-control-label">Product Price: </label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="number" min="0" step="1" id="txtPrice" name="txtPrice" value="{{ $rs ->P_price }}" class="form-control" required>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">Storage</label>
                </div>
                <div class="col col-md-9">
                    <div class="form-check">
                        <div class="radio">
                            <label for="radio1" class="form-check-label ">
                                <input type="radio" id="radio1" name="Storage" value="64" class="form-check-input" {{ ($rs->P_storage=="64")? "checked" : "" }}>64Gb
                            </label>
                        </div>
                        <div class="radio">
                            <label for="radio2" class="form-check-label ">
                                <input type="radio" id="256Gb" name="Storage" value="128" class="form-check-input" {{ ($rs->P_storage=="128")? "checked" : "" }}>128Gb
                            </label>
                        </div>
                        <div class="radio">
                            <label for="radio3" class="form-check-label ">
                                <input type="radio" id="256Gb" name="256Gb" value="256" class="form-check-input" {{ ($rs->P_storage=="256")? "checked" : "" }}>256Gb
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="email-input" class=" form-control-label">Quantity: </label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="number" min="0" step="1" id="txtQty" name="txtQty" placeholder="1,2,3 ..." value="{{ $rs ->P_quantity }}" class="form-control" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">Color</label>
                </div>
                <div class="col col-md-9">
                    <div class="form-check">
                        <div class="radio">
                            <label for="radio1" class="form-check-label ">
                                <input type="radio" id="red" name="Color" value="Red" class="form-check-input" {{ ($rs->P_color=="Red")? "checked" : "" }}>Red
                            </label>
                        </div>
                        <div class="radio">
                            <label for="radio2" class="form-check-label ">
                                <input type="radio" id="blue" name="Color" value="Blue" class="form-check-input" {{ ($rs->P_color=="Blue")? "checked" : "" }}>Blue
                            </label>
                        </div>
                        <div class="radio">
                            <label for="radio3" class="form-check-label ">
                                <input type="radio" id="green" name="Color" value="Green" class="form-check-input" {{ ($rs->P_color=="Green")? "checked" : "" }}>Green
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="file-input" class=" form-control-label">Image: </label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="file-input" name="image" class="form-control-file">
                    <label for="picture" class="form-control" id="pictureLabel">{{ $rs-> P_imgPath ? $rs->P_imgPath : "Choose Picture" }}</label>
                </div>
            </div>
            <div class="card-footer" style="text-align: center;">
                <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure to update this product?')">
                    <i class="fa fa-dot-circle-o"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection