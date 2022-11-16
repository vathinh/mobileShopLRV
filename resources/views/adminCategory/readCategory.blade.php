@extends('theme.app')

@section('content')
    <section class="content">
    <button><a href="{{ url("admin/home") }}">Back to dashboard</a></button> <br>
    <button><a href="{{ url('/admin/product/createCategory') }}">Create New Category</a></button> <br>
    <button><a href="{{ url("/admin/product/readproduct") }}">Go to Product Management</a></button>
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <h3 style="text-align: center">List of Categories</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" border="1">
                  <thead>
                        
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Action</th>
                            <th style="text-align: left;">Description</th>                           
                        </tr>
                  </thead>
                  <tbody>
                    @foreach($category as $cat)
                        <tr>
                            <td style="text-align: center;"> {{ $cat -> C_id }}</td>
                            <td style="text-align: center;"> {{ $cat -> C_name }}</td>                      
                            <td style="text-align: center;">  
                              <a href="{{ url("/admin/category/update/{$cat -> C_id}") }}">Update</a>
                            </td>
                            <td style="text-align: center;"> {{ $cat -> C_desc }}</td>
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
