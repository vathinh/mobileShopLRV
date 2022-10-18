<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <span><a href="{{ url('/admin/product/createproduct') }}">Create New Product</a></span>
                    <!--Chèn đoạn mả <table></table vào đây-->
                    <table class="table table-hove table-bordered">
                        <tr>
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Price</th>
                            <th style="text-align: center;">Storage</th>
                            <th style="text-align: center;">Color</th>
                            <th style="text-align: center;">Quantity</th>
                            <th style="text-align: center;">Function</th>
                        </tr>
                        @foreach($rs as $data)
                        <tr>
                            <td style="text-align: center;"> {{ $data -> p_id }}</td>
                            <td style="text-align: center;"> {{ $data -> p_name }}</td>
                            <td style="text-align: center;"> {{ $data -> p_price }}</td>
                            <td style="text-align: center;"> {{ $data -> p_storage }}</td>
                            <td style="text-align: center;"> {{ $data -> p_color }}</td>
                            <td style="text-align: center;"> {{ $data -> p_qty }}</td>
                            <td style="text-align: center;">
                                <a href="{{ url("/admin/product/updateProduct/{$data -> p_id}") }}">Update</a>|
                                <a href="{{ url("/admin/product/deleteProduct/{$data -> p_id}") }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</html>