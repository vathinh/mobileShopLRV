@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>Welcome Admin !</h4>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Auth::user()->name }}
                    <br>
                    {{$msg}} 
                    <h1><a href="{{ url("admin/user/readUser") }} >User Management</a></h1>
                    <br>
                    
                </div>
                <div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    

</div>
@endsection