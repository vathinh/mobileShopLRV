@extends('theme.app')

@section('content')
  <!-- DATA TABLE -->
  <h3 class="title-5 m-b-35">data table</h3>
  <div class="table-data__tool">
      <div class="table-data__tool-left">
          <div class="rs-select2--light rs-select2--md">
              <select class="js-select2" name="property">
                  <option selected="selected">All Properties</option>
                  <option value="">Option 1</option>
                  <option value="">Option 2</option>
              </select>
              <div class="dropDownSelect2"></div>
          </div>
          <div class="rs-select2--light rs-select2--sm">
              <select class="js-select2" name="time">
                  <option selected="selected">Today</option>
                  <option value="">3 Days</option>
                  <option value="">1 Week</option>
              </select>
              <div class="dropDownSelect2"></div>
          </div>
          <button class="au-btn-filter">
              <i class="zmdi zmdi-filter-list"></i>filters</button>
      </div>
      <div class="table-data__tool-right">
          <button class="au-btn au-btn-icon au-btn--green au-btn--small">
              <i class="zmdi zmdi-plus"></i>add item</button>
          <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
              <select class="js-select2" name="type">
                  <option selected="selected">Export</option>
                  <option value="">Option 1</option>
                  <option value="">Option 2</option>
              </select>
              <div class="dropDownSelect2"></div>
          </div>
      </div>
  </div>
  <div class="table-responsive table-responsive-data2">
      <table class="table table-data2">
          <thead>
              <tr>
                 
                  <th>ID</th>
                  <th>Name</th>
                  <th>Surname</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Role</th>
                  <th>Action</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
          @foreach($rs as $data)
              <tr class="tr-shadow">
                  <td>{{ $data -> id }}</td>
                  <td>{{ $data -> name }}</td> 
                  <td>{{ $data -> surname }}</td> 
                  <td>
                      <span class="block-email">{{ $data -> email }}</span>
                  </td>
                  <td>{{ $data -> address }}</td> 
                  <td>{{ $data -> phone }}</td> 
                  <td class="desc">{{ $data -> role }}</td> 
                 
                  <!-- icon -->
                  <td>
                      <div class="table-data-feature">
                         
                          <button class="item" data-toggle="tooltip" data-placement="top" title="Reset Password">
                            <a href="{{ url("admin/user/resetPwd/{$data -> id}") }}">
                              <i class="zmdi zmdi-edit"></i>
                            </a>
                             
                          </button>
                          <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                            <a href="{{ url("admin/user/deleteUser/{$data -> id}") }}">
                              <i class="zmdi zmdi-delete"></i>
                            </a> 
                              
                          </button>
                         
                      </div>
                  </td>
              </tr>
              <tr class="spacer"></tr>

              @endforeach
          </tbody>
      </table>
  </div>
  <!-- END DATA TABLE -->


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


