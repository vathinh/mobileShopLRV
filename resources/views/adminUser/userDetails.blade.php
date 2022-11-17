@extends('theme.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

    @yield('content')
    <div class="section__content section__content">
            <!-- Open Content -->
            <!-- /.card-header -->
            <section class="bg-light">
                <div class="container pb-5">
                    <div class="row">
                        <div class="col-lg-5 mt-5">
                            <div class="card mb-3">
                                <img src=" {{ asset('theme/images/icon/lorem-face-6285.jpg') }} " alt="" style="width:550px;height: 550px;">
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="col-lg-7 mt-5">
                            <div class="card">
                                <div class="card-body">
                                <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h6>Name: </h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <p class="text-muted"><strong>{{ $us -> name }}</strong></p>
                                        </li>
                                    </ul>
                                    <br>

                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h6>Surname: </h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <p class="text-muted"><strong>{{ $us -> surname }}</strong></p>
                                        </li>
                                    </ul>
                                    <br>

                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h6>Email: </h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <p class="text-muted"><strong>{{ $us -> email}}</strong></p>
                                        </li>
                                    </ul>
                                    <br>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h6>Address :</h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <p class="text-muted"><strong> {{$us -> address}}</strong></p>
                                        </li>
                                    </ul>
                                    <br>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h6>Phone :</h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <p class="text-muted"><strong>{{ $us -> phone }}</strong></p>
                                        </li>
                                    </ul>
                                    <br>

                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h6>Role :</h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <span 
                                                class="{{  $us -> role == 'admin' ? 'role admin' : ($us -> role == 'user' ? 'role user' : ($us -> role == 'editor' ? 'role member' : '')) }}" 
                                            >
                                                {{ $us -> role }}
                                            </span>
                                        </li>
                                    </ul>
                                    <br>
                                    
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-primary">
                                <a href="{{ url("admin/user/readUser") }}">
                                    <i class="fa fa-arrow-left"></i>&nbsp; Back To User Lists
                                </a>
                            </button>
                            
                            <button type="button" class="btn btn-outline-success">
                            <a  onclick="return confirm('Are you sure to reset this password?')"  href="{{ url("admin/user/resetPwd/{$us -> id}") }}" > 
                                <i class="fa fa-repeat"></i> </i>&nbsp; Reset Password
                            </a>
                            </button>

                            <button type="button" class="btn btn-outline-danger">
                            <a onclick="return confirm('Are you sure to delete this user?')" href="{{ url("admin/user/deleteUser/{$us -> id}") }}" > 
                                <i class="zmdi zmdi-delete"></i></i>&nbsp; Delete User
                            </a> 
                            </button>
                        </div>
                        
                    </div>
                </div>
            </section>

                <!-- /.card-body -->
            </div>
            

            
        </div>
    </div>
</div>
@endsection