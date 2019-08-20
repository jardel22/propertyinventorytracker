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
                <br><br>
                {{-- This bottom one is for user --}}
                <h5><strong>1. Click the button below to download and view the report for this property created by {{$booking->clientFirstname}} {{$booking->clientLastname}}</strong></h5>
                <div style="text-align:center">
                <button class="btn btn-primary btn-lg" style="display:inline-block;color:black">
                <i class="material-icons" style="font-size:20px;color:white">get_app</i>
                <a href="/download/{{$booking->clientFirstname}} {{$booking->clientLastname}} {{$booking->bookingId}} {{$booking->jobType}} Report" style="font-size:21px;color:white">Download Files</a> 
                </button> 
                </div>
                <br><br>
                <h5><strong>2. In the text box below please write any comments on the document regarding the inspection</strong> <br><br>
                <small>Please label each comment with the corresponding number from the document</small></h5>

                <form method="post" action="{{action ('BookingsController@updatePortal', $booking->bookingId) }}">
                {{csrf_field()}}
                    <div class="form-group">
                        <textarea class="form-control" id="textarea" name="comments" rows="7"></textarea>
                    </div>

                    <input type="hidden" value="{{$booking->propertyId}}" name="propertyId">
                    <input type="submit" class="btn btn-primary btn-lg" name="submit">
                </form>

                    
                    
                </div>
            @empty
            @endforelse
            </div>
        </div>
    </div>
</div>
@endsection