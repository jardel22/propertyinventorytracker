@extends('layouts.userapp')

@section('content')
<div style="margin:10px 10px 10px 10px">
{{Breadcrumbs::render('details')}}
</div>

<div style="margin:10px 10px 10px 10px">
    <div class="card">
        <div class="card-header" style="text-align:center; text-transform:capitalize"><strong>My Details</h1></strong></div>

        
        <div class="table-responsive-md" style="margin:10px 10px 10px 10px">   
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
@endsection