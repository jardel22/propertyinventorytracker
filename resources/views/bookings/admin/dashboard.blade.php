@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center"><strong>Bookings Dashboard</strong></div>

                <table class="table table-striped">
                    <thead>
                        <tr style="text-align:center">
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Approved</th>
                            <th>More Info</th>
                            <th>Update</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse($bookings as $booking)
                    <tr style="text-align:center">
                        <td>{{$booking->startTime}}</td>
                        <td>{{$booking->endTime}}</td>
                        <td>@if($booking -> approved == 0)
                                {{__('Booking Not Approved Yet')}}
                            @endif
                            @if($booking -> approved == 1)
                                {{__('Booking Approved')}}
                            @endif
                        </td>
                        <td> <a href="bookings/{{$booking->bookingId}}/show" class="btn btn-success btn-sm">View</a></td>
                        <td> <a href="bookings/{{$booking->bookingId}}/edit" class="btn btn-primary btn-sm">Update</a></td>
                        
                    </tr>
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