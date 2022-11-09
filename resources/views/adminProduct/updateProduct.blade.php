@extends('userLayout.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@yield('content')
<form method="POST" enctype="multipart/form-data" action="{{ url("/admin/product/updateProductProcess/{$rs -> P_id}") }}">
    @csrf
    <table class="table table-hover text-nowrap" border="1">
        <tr>
            <td>ID</td>
            <td><input type="text" name="txtID" readonly value="{{ $rs -> P_id }}"></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="txtName" value="{{ $rs ->P_name }}"> <br></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="text" name="txtPrice" value="{{ $rs ->P_price }}"> <br></td>
        </tr>
        <tr>
            <td>Storage</td>
            <td>
                <input type="radio" id="64Gb" name="Storage" value="64">
                <label for="64">64Gb</label>
                <input type="radio" id="128Gb" name="Storage" value="128">
                <label for="128">128Gb</label>
                <input type="radio" id="256Gb" name="Storage" value="256">
                <label for="256">256Gb</label>
            </td>
        </tr>
        <tr>
            <td>Color</td>
            <td>
                <input type="radio" id="red" name="Color" value="Red">
                <label for="red">Red</label>
                <input type="radio" id="blue" name="Color" value="Blue">
                <label for="blue">Blue</label>
                <input type="radio" id="green" name="Color" value="Green">
                <label for="green">Green</label>
            </td>
        </tr>
        <tr>
            <td>Quantity</td>
            <td><input type="text" placeholder="1,2,3 ..." name="txtQty"></td>
        </tr>
        <tr>
            <td>Image</td>
            <td><input type="file" name="image"></td>
        </tr>
    </table>
    <input type="submit" value="Update">
</form>
@endsection