@extends('layouts.userapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center; text-transform:capitalize"><strong>{{ Auth::user()->clientFirstname }}'s Bookings</strong></div>

                <table class="table table-striped">
                    <thead>
                        <tr style="text-align:center">
                            <th>Address</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th>More Info</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                    @forelse($bookings as $booking)

                    @if($booking->status === 'Check in portal')

                    <tr style="text-align:center">
                        <td>{{$booking->addressLine1}}</td>
                        <td>{{$booking->startTime}}</td>
                        <td>{{$booking->endTime}}</td>
                        <td><a href="/bookings/{{$booking->bookingId}}/portal" class="btn btn-danger btn-sm">{{$booking->status}}</a></td>
                        
                        <td> <a href="/bookings/{{$booking->bookingId}}/show" class="btn btn-primary btn-sm">View</a></td>
                    </tr>

                    @else
                    <tr style="text-align:center">
                        <td>{{$booking->addressLine1}}</td>
                        <td>{{$booking->startTime}}</td>
                        <td>{{$booking->endTime}}</td>
                        <td>{{$booking->status}}</td>
                        <td> <a href="/bookings/{{$booking->bookingId}}" class="btn btn-primary btn-sm">View</a></td>
                    </tr>
                    @endif

                    @empty
                    <h4>No Bookings</h4>
                    @endforelse

                    </tbody>


                </table>

            </div>
        </div>
    </div>
</div>
@endsection