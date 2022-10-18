@extends('adminLayouts.app')

@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create new  Users</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ url('admin/user/createUserProc') }}">
              @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputId">ID </label>
                        <input type="text" class="form-control" id="exampleInputId" placeholder="Enter ID" name="txtID">
                    </div>
                  <div class="form-group">
                        <label for="exampleInputName">Name </label>
                        <input type="text" class="form-control" id="exampleInputId" placeholder="Enter Name" name="txtName">
                  </div>
                  <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"name="txtEmail">
                  </div>
                  <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"name="txtPwd">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
   
@endsection
