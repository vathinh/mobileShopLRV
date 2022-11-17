@extends('userLayout.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@yield('content')
            <form method="POST" action="{{ url("/admin/category/updateProcess/{$rs -> C_id}") }}">
                @csrf
                <table class="table table-hover text-nowrap" border="1">
                    <tr>
                        <td>ID</td>
                        <td><input type="text" name="txtID" readonly value="{{ $rs -> C_id }}"></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="txtCName" value="{{ $rs ->C_name }}"> <br></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><input type="text" name="txtDesc" value="{{ $rs ->C_desc }}"> <br></td>
                    </tr>
                    
                </table>
                <input type="submit" value="Update" onclick="return confirm('Are you sure to update this category?')">
            </form>
@endsection