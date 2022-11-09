@extends('theme.app')

@section('content')
<div class="card card-primary">
    <div class="card-header">
    <button><a href="{{ url("admin/home") }}">Back to dashboard</a></button>
        <h3 class="card-title">Create new Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ url("/admin/product/createCategoryProcess") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <table class="table table-hover text-nowrap" border="1">
            <tr>
                <td>C_name</td>
                <td><input type="text" name="txtC_name"> <br></td>
            </tr>
            <tr>
                <td>C_desc</td>
                <td><input type="text" name="txtC_desc"> <br></td>
            </tr>
        </table>
        <input type="submit" value="Add New Category">
    </form>
</div>
<!-- /.card -->

@endsection