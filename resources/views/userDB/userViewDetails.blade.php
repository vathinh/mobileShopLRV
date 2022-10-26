<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View user info</title>
</head>
<body>
   
    <form method="post" action="{{ url("/user/userDetailsUpdate/{$rs -> id}") }}" class="form">
    @csrf
        <table class="table table-hovered">
          

            <tr>
                <td>Name:</td>
                <td><input type="text" name="txtName" value="{{ $rs -> name }}" ></td>
            </tr>

            <tr>
                <td>Surname:</td>
                <td><input type="text" name="txtSurname" value="{{ $rs -> surname }}" ></td>
            </tr>

            <tr>
                <td>Address:</td>
                <td><input type="text" name="txtAddress" value="{{ $rs -> address }}" ></td>
            </tr>

            <tr>
                <td>Phone:</td>
                <td><input type="text" name="txtPhone" value="{{ $rs -> phone }}" ></td>
            </tr>

            <tr>
                <td>Email:</td>
                <td><input type="email" name="txtEmail" value="{{ $rs -> email }}" ></td>
            </tr>

            

            <tr>
                <td></td>
                <td><input type="submit" value="Update" ></td>
            </tr>
            <tr>
                <td></td>
                <td>
                
                    <a href="{{ url("/user/change-password") }}">Change Password</a>
                   
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>