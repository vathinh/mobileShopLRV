@extends('theme.app')

@section('content')

<div>
    <button><a href="{{ url("admin/home") }}">Back to dashboard</a></button> <br>
    <button><a href="{{ url('/admin/product/readCategory') }}">Go to Category Management</a></button> <br>
    <button><a href="{{ url('/admin/product/readproduct') }}">List of Products</a></button>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 style="text-align: center;">Create New Category</h3>
    </div>
    <div class="card">
        <div class="card-body card-block">
            <form method="POST" enctype="multipart/form-data" class="form-horizontal" action="{{ url("/admin/product/createCategoryProcess") }}">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Category Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="txtC_name" name="txtC_name" placeholder="Iphone, Ipad, Macbook, ..." class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Category Description</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="txtC_desc" name="txtC_desc" placeholder="Description of category" class="form-control" required>
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