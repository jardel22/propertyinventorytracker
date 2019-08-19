@extends('layouts.userapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @forelse($bookings as $booking)
                <div class="card-header" style="text-align:center; text-transform:capitalize"><strong>
                {{$booking->clientFirstname}} {{$booking->clientLastname}}'s Portal</strong></div>
                    

                <div class="container" style="text-transform:capitalize">
                    <strong>Booking ID: {{$booking->bookingId}}<br><br>
                    For The Property: <br>
                    <div class="container"><em>
                    {{$booking->addressLine1}} <br>        
                    {{$booking->city}} <br>
                    {{$booking->county}} <br>
                    {{$booking->postcode}} <br>
                    </em></strong></div>
                
                    
                    
                </div>
            @empty
            @endforelse
            </div>
        </div>
    </div>
</div>
@endsection