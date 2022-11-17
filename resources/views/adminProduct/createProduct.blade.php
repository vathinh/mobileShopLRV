@extends('theme.app')

@section('content')
<div>
    <button><a href="{{ url("admin/home") }}">Back to dashboard</a></button> <br>
    <button><a href="{{ url('/admin/product/readCategory') }}">Go to Category</a></button> <br>
    <button><a href="{{ url('/admin/product/readproduct') }}">List of Products</a></button>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 style="text-align: center;">Create New Product</h3>
    </div>
    <div class="card">
        <div class="card-body card-block">
            <form method="POST" enctype="multipart/form-data" class="form-horizontal" action="{{ url("/admin/product/createproductProcess") }}">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Category ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="txtC_id" name="txtC_id" placeholder="type: 1-Iphone, 2-Ipad, 3-Macbook " class="form-control" required pattern="[1,2,3]">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">Product Name </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="txtName" name="txtName" class="form-control" required placeholder="Name of product">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">Product Price </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" min="0" step="1" id="txtPrice" name="txtPrice" class="form-control" required placeholder="Price of product">
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
                                    <input type="radio" id="64Gb" name="Storage" value="64" class="form-check-input">64Gb
                                </label>
                            </div>
                            <div class="radio">
                                <label for="radio2" class="form-check-label ">
                                    <input type="radio" id="256Gb" name="Storage" value="128" class="form-check-input" checked>128Gb
                                </label>
                            </div>
                            <div class="radio">
                                <label for="radio3" class="form-check-label ">
                                    <input type="radio" id="256Gb" name="256Gb" value="256" class="form-check-input">256Gb
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">Quantity </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" min="0" step="1" id="txtQty" name="txtQty" placeholder="Quantity: 1,2,3 ..." class="form-control" required>
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
                                    <input type="radio" id="red" name="Color" value="Red" class="form-check-input">Red
                                </label>
                            </div>
                            <div class="radio">
                                <label for="radio2" class="form-check-label ">
                                    <input type="radio" id="blue" name="Color" value="Blue" class="form-check-input" checked>Blue
                                </label>
                            </div>
                            <div class="radio">
                                <label for="radio3" class="form-check-label ">
                                    <input type="radio" id="green" name="Color" value="Green" class="form-check-input">Green
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Image </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-input" name="image" class="form-control-file">
                        <label for="picture" class="form-control" id="pictureLabel"></label>
                    </div>
                </div>
                <div class="card-footer" style="text-align: center;">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection