@extends('userLayout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>Welcome User</h4>
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
                    @php
                    $data = Auth::user()->id;
                    @endphp
                    <a href="{{ url("user/userDetails/{$data}") }}">View</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection