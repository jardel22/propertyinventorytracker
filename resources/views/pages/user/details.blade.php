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
                <h3 style="text-align:center"> Name: {{$client->clientFirstname}} {{$client->clientLastname}}
                    <br><br>                
                    Email Address: {{$client->email}} 
                    <br><br>
                    <a href="/details/update-password"> Click here to update password</a>
                </h3>
                </p>

                 
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection