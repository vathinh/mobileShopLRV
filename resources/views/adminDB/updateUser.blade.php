<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE ITEM</title>
</head>
<body>
    <h1>UPDATE ITEM</h1>
    <form method="post" action="{{ url("/admin/user/updateUserProc/{$rs -> id}") }}" class="form">
    @csrf
        <table class="table table-hovered">
            <tr>
                <td>Code:</td>
                <td><input type="text" name="txtID" value="{{ $rs -> id }}" readonly></td>
            </tr>

            <tr>
                <td>Name:</td>
                <td><input type="text" name="txtName" value="{{ $rs -> name }}" ></td>
            </tr>

            <tr>
                <td>Email:</td>
                <td><input type="email" name="txtEmail" value="{{ $rs -> email }}" ></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="Update" ></td>
            </tr>
        </table>
    </form>
    
</body>
</html>