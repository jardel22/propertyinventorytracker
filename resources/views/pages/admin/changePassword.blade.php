@extends('layouts.adminapp')

@section('content')
{{Breadcrumbs::render('adminChangePassword')}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center; text-transform:capitalize"><strong>My Details</h1></strong>
                </div>
    
                <div style="text-align:center">
                @forelse($admins as $admin)
                <div class="container" style="margin:10px 10px 10px 10px"><span style='color:green'>{{$admin->adminFirstname}} {{$admin->adminLastname}}</span>, Update your Password</div>
                </div>

                {!! Form::open(['action' => ['AdminPasswordChangeController@updatePassword'], 'method' => 'POST', 'class' => 'pull-right']) !!}


                <div class="container" style="margin:10px 10px 10px 10px" >


                    <div class="form-group row">

                        <div class="form-group col-md-5">
                            <label for="oldPassword">Current Password</label>
                            <input class="form-control" type="password"  name="oldPassword">
                            <span style="color:red">{{ $errors->first('old_password') }}</span>

                            <br>

                            <label for="newPasswor" >New Password</label>
                            <input class="form-control" type="password"  name="newPassword">
                            <span style="color:red">{{ $errors->first('newPassword') }}</span>

                            <br>

                            <label for="confirmPassword" >Confirm Password</label>
                            <input class="form-control" type="password"  name="confirmPassword">
                            <span style="color:red">{{ $errors->first('confirmPassword') }}</span>

                            <br>
                            <input type="submit" value="Update Password" class="btn btn-primary" style="float: right">
                            
                        </div>




                    </div>

                </div>

                {!! Form::close() !!}

                 
            </div>
        </div>

                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection