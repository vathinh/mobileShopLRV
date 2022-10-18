<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
<form action="{{ url("/admin/product/createproductProcess") }}" method="POST">
                        @csrf
                        <table>
                            <tr>
                                <td>ID</td>
                                <td><input type="text" name="txtID"></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="txtName"> <br></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><input type="text" name="txtPrice"> <br></td>
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
                                <td><input type="text" placeholder="1,2,3 ..." name ="txtQty"></td>
                            </tr>
                        </table>
                        <input type="submit" value="Add New Product">
                    </form>
</body>
</html>