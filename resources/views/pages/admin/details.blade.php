@extends('layouts.adminapp')

@section('content')
{{Breadcrumbs::render('adminDetails')}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center; text-transform:capitalize"><strong>My Details</h1></strong></div>
    
                @forelse($admins as $admin)
                <p>
                <div><strong>Account Name:</strong> {{$admin->adminFirstname}} {{$admin->adminLastname}}
                    <br><br>                
                    <strong>Email Address:</strong> <a style="text-decoration:underline">{{$admin->email}}</a> 
                    <br><br>
                    <a href="/admin/details/update-password"> Click here to update password</a>
                </div>
                </p>

                 
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection