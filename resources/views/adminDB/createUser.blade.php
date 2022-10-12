<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <h1>Create new User</h1>

    <form method="post" action="{{ url('admin/user/createUserProc') }}">
        @csrf
        <table>
            <tr>
                <td>ID:</td>
                <td><input type="text" name="txtID"></td>
            </tr>

            <tr>
                <td>Name:</td>
                <td><input type="text" name="txtName"></td>
            </tr>

            <tr>
                <td>Email:</td>
                <td><input type="text" name="txtEmail"></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td><input type="password" name="txtPWd"></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="Add new"></td>
            </tr>

        </table>
    </form>
</body>
</html>