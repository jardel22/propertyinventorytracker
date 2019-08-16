@extends('layouts.clerkapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="text-transform:capitalize">
                @forelse($bookings as $booking)
                <div class="card-header" style="text-align:center"><strong>{{$booking->clientFirstname }}'s Bookings</strong></div>
                <table class="table table-striped">
                        <tr style="text-align:left">
                        <th>Clients Name:</th>     
                        <td>{{$booking->clientFirstname}} {{$booking->clientLastname}}</td> 
                        </tr>

                        <tr style="text-align:left">
                        <th>Booking Type:</th>     
                        <td>{{$booking->jobType}}</td>
                        </tr>

                        <tr style="text-align:left">
                        <th>Price:</th>     
                        <td>{{$booking->price}}</td>
                        </tr>

                        <tr style="text-align:left">
                        <th>Address Line 1:</th>     
                        <td>{{$booking->addressLine1}}</td> 
                        </tr>

                        <tr style="text-align:left">
                        <th>City:</th>     
                        <td>{{$booking->city}}</td>
                        </tr>

                        <tr style="text-align:left">
                        <th>Postcode:</th>     
                        <td>{{$booking->postcode}}</td>
                        </tr>


                        <tr style="text-align:left">
                        <th>Has this booking been approved?:</th>     
                        <td>@if($booking -> approved == 0)
                                {{__('Booking Not Approved Yet')}}
                            @endif
                            @if($booking -> approved == 1)
                                {{__('Booking Approved')}}
                            @endif
                        </td>
                        </tr>

                        
                        <tr style="text-align:left">
                        <th>Number of bedrooms:</th>     
                        <td>{{$booking->bedrooms}}</td>
                        </tr>

                        <tr style="text-align:left">
                        <th>Does the property have a garage?:</th>     
                        <td>{{$booking->garage}}</td>
                        </tr>

                        <tr style="text-align:left">
                        <th>Is the property furnished?:</th>     
                        <td>{{$booking->furnished}}</td>
                        </tr>

                        <tr style="text-align:left">
                        <th>Gas Meter Location:</th>     
                        <td>{{$booking->gasMeterLocation}}</td>
                        </tr>

                        <tr style="text-align:left">
                        <th>Electricity Meter Location:</th>     
                        <td>{{$booking->electricityMeterLocation}}</td>
                        </tr>

                        <tr style="text-align:left">
                        <th>Water Meter Location:</th>     
                        <td>{{$booking->waterMeterLocation}}</td>
                        </tr>

                        <tr style="text-align:left">
                        <th>Purchase Order Number:</th>     
                        <td>{{$booking->purchaseOrderNumber}}</td>
                        </tr>

                        <tr style="text-align:left">
                        <th>Special Instructions:</th>     
                        <td>{{$booking->specialInstructions}}</td>
                        </tr>

                    @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection