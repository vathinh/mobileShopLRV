<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
</head>
<body>
    <button><a href="{{ url("admin/home") }}">Back to dashboard</a></button>
    <h1>List of User</h1>
    <h3><a href="{{ url('admin/user/createUser') }}">Create new User</a> </h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>

        @foreach($rs as $data)
        <tr>
            <td>{{ $data -> id }}</td>
            <td>{{ $data -> name }}</td>
            <td>{{ $data -> email }}</td>
            <td>{{ $data -> role }}</td>
            <td>
                <a href="{{ url("admin/user/updateUser/{$data -> id}") }}">Update</a>
                <a href="{{ url("admin/user/deleteUser/{$data -> id}") }}">Delete</a>

            </td>
        </tr>
        @endforeach
    </table>


</body>
</html>