
@extends('userLayout.app')

@section('content')


<div class="card">
    <div class="card-header">
        <strong>Change Information</strong> 
    </div>
    <div class="card-body card-block">
        <!-- <form method="post" action="{{ url("/user/userDetailsUpdate/{$rs -> id}") }}" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">Name</label>
                </div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">{{ $rs -> name }}</p>
                </div>

                <div class="col col-md-3">
                    <label class=" form-control-label">Surname</label>
                </div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">{{ $rs -> surname }}</p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Address</label>
                </div>
                <div class="col-12 col-md-9">
                   
                    <input type="text" id="text-input" class="form-control"  name="txtAddress" value="{{ $rs -> address }}" >
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="email-input" class=" form-control-label">Email Input</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="email" name="txtEmail" value="{{ $rs -> email }}" class="form-control" >
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="email-input" class=" form-control-label">Phone </label>
                </div>
                <div class="col-12 col-md-9">
                    
                    <input type="text" name="txtPhone" value="{{ $rs -> phone }}" class="form-control" >
                </div>
            </div> -->

            <form method="post" action="{{ url("/user/userDetailsUpdate/{$rs -> id}") }}" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $rs -> email }}" required autocomplete="email" readonly>

                    
                </div>
            </div>    


            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $rs -> name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="surname" class="col-md-4 col-form-label text-md-end">{{ __('Surname') }}</label>

                <div class="col-md-6">
                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $rs -> surname }}" required autocomplete="surname" autofocus>

                    @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                <div class="col-md-6">
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $rs -> address }}" required autocomplete="address" autofocus>

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="row mb-3">
                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $rs -> phone }}" required autocomplete="phone" autofocus>

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>



           



            <div class="card-footer">

        <button type="button" class="btn btn-outline-primary">
            <a href="{{ url("/user/userDB") }}">
                <i class="fa fa-arrow-left"></i>&nbsp; Back To Dashboard 
            </a>
        </button>

        <button onclick="return confirm('Are you to update your information?')" type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Update Informations
        </button>

        
       
        <button class="btn btn-success btn-sm">
            <a style="color: white;" href="{{ url("/user/change-password") }}">
             <i class="fa fa-repeat"></i> Change Password</a>
        </button>
        </form>
    </div>
        
</div>
  




   
   
    
@endsection