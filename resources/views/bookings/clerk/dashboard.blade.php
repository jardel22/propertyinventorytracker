@extends('layouts.clerkapp')

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
                            <th>Create Report</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @forelse($bookings as $booking)
                        <?php $ldate = date('Y-m-d H:i:s'); ?>
                        @if($booking->startTime < $ldate && Auth::user()->clerkId == $booking->clerk_id)

                        <tr style="text-align:center">
                            <td>{{$booking->startTime}}</td>
                            <td>{{$booking->endTime}}</td>
                            <td>@if($booking -> approved == 0)
                                    {{__('Booking Not Approved Yet')}}
                                @endif
                                @if($booking -> approved == 1 && $booking -> status =  'Check in portal')
                                    {{__('Report Submitted to Client')}}
                                @elseif($booking -> approved == 1)
                                    {{__('Booking Approved')}}
                                @endif
                            </td>
                            <td> <a href="/clerk/bookings/{{$booking->bookingId}}/show" class="btn btn-success btn-sm">View</a></td>
                            <td> <a href="/clerk/bookings/{{$booking->bookingId}}/edit" class="btn btn-primary btn-sm">Update</a></td>
                            <td> <a href="/clerk/bookings/{{$booking->bookingId}}/report" class="btn btn-primary btn-sm">Report</a></td>
                            

                        </tr>

                        @else

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