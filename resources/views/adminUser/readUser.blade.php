@extends('adminLayouts.app')

@section('content')
    <section class="content">
    <button><a href="{{ url("admin/home") }}">Back to dashboard</a></button>
    <h1>List of User</h1>
    <h3><a href="{{ url('admin/user/createUser') }}">Create new User</a> </h3>
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($rs as $data)
                    <tr>
                        <td>{{ $data -> id }}</td>
                        <td>{{ $data -> name }}</td>
                        <td>{{ $data -> email }}</td>
                        <td>{{ $data -> role }}</td>
                        <td>
                            <a href="{{ url("admin/user/updateUser/{$data -> id}") }}">Update</a> |
                            <a href="{{ url("admin/user/deleteUser/{$data -> id}") }}">Delete</a> |
                            <a href="{{ url("admin/user/resetPwd/{$data -> id}") }}">Reset Password</a>

                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
       
    </section>

    @endsection


