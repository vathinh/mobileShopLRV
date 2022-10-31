
@extends('userLayout.app')

@section('content')


<div class="card">
    <div class="card-header">
        <strong>Basic Form</strong> Elements
    </div>
    <div class="card-body card-block">
        <form method="post" action="{{ url("/user/userDetailsUpdate/{$rs -> id}") }}" enctype="multipart/form-data" class="form-horizontal">
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
            </div>

            
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Update Informations
        </button>
        <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Reset
        </button>
        <button class="btn btn-success btn-sm">
            <a href="{{ url("/user/change-password") }}">Change Password</a>
        </button>

    </div>
</div>



   
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
    
endsection