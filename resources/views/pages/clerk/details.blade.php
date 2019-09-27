@extends('layouts.clerkapp')

@section('content')
<div style="margin:10px 10px 10px 10px">
{{Breadcrumbs::render('clerkDetails')}}
</div>

<div style="margin:10px 10px 10px 10px">
    <div class="card">
        <div class="card-header" style="text-align:center; text-transform:capitalize"><strong>My Details</h1></strong></div>

        
        <div class="table-responsive-md" style="margin:10px 10px 10px 10px"> 
                @forelse($clerks as $clerk)
                <p>
                <div><strong>Account Name:</strong> {{$clerk->clerkFirstname}} {{$clerk->clerkLastname}}
                    <br><br>                
                    <strong>Email Address:</strong> <a style="text-decoration:underline">{{$clerk->email}}</a> 
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