@extends('layouts.userapp')

@section('content')
{{Breadcrumbs::render('details')}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center; text-transform:capitalize"><strong>My Details</h1></strong></div>
    
                @forelse($clients as $client)
                <p>
                <h3><span style='color:green'>{{$client->clientFirstname}} {{$client->clientLastname}}</span>, Update your Password</h3>

                {!! Form::open(['action' => ['ClientController@updatePassword'], 'method' => 'POST', 'class' => 'pull-right']) !!}


                <div class="container" >


                    <div class="form-group row">

                        <div class="form-group col-md-5">
                            <label for="example-text-input">Current Password</label>
                            <input class="form-control" type="password"  name="oldPassword">
                            <span style="color:red">{{ $errors->first('old_password') }}</span>

                            <br>

                            <label for="example-text-input" >New Password</label>
                            <input class="form-control" type="password"  name="newPassword">
                            <span style="color:red">{{ $errors->first('newPassword') }}</span>

                            <br>

                            <label for="example-text-input" >Confirm Password</label>
                            <input class="form-control" type="password"  name="confirmPassword">
                            <span style="color:red">{{ $errors->first('confirmPassword') }}</span>

                            <br>
                            <div align="right"> <input type="submit" value="Update Password" class="btn btn-primary"></div>
                        </div>




                    </div>

                </div>

                {!! Form::close() !!}
                </p>

                 
            </div>
        </div>

                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection