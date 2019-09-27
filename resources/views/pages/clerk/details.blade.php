@extends('layouts.userapp')

@section('content')
{{Breadcrumbs::render('clerkDetails')}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center; text-transform:capitalize"><strong>My Details</h1></strong></div>
    
                @forelse($clients as $client)
                <p>
                <div><strong>Account Name:</strong> {{$client->clientFirstname}} {{$client->clientLastname}}
                    <br><br>                
                    <strong>Email Address:</strong> <a style="text-decoration:underline">{{$client->email}}</a> 
                    <br><br>
                    <a href="/details/update-password"> Click here to update password</a>
                </div>
                </p>

                 
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection