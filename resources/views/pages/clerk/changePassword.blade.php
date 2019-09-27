@extends('layouts.clerkapp')

@section('content')
<div style="margin:10px 10px 10px 10px">
{{Breadcrumbs::render('clerkChangePassword')}}
</div>

<div style="margin:10px 10px 10px 10px">
    <div class="card">
        <div class="card-header" style="text-align:center; text-transform:capitalize"><strong>My Details</h1></strong></div>

        
        <div class="table-responsive-md" style="margin:10px 10px 10px 10px"> 

                @forelse($clerks as $clerk)
                <div style="margin:10px 10px 10px 10px"><span style='color:green'>{{$clerk->clerkFirstname}} {{$clerk->clerkLastname}}</span>, Update your Password</div>
                </div>

                {!! Form::open(['action' => ['ClerkPasswordChangeController@updatePassword'], 'method' => 'POST', 'class' => 'pull-right']) !!}


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
                            <br>
                            <br>    
                        </div>


                {!! Form::close() !!}
                    </div>

                </div>

                 
            </div>
        </div>

    @empty
    @endforelse

</div>
@endsection