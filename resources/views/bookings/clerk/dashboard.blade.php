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
                            <th>Booking Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Approved</th>
                            <th>Confirm</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse($bookings as $booking)
                    <tr style="text-align:center">
                        <td>{{$booking->date}}</td>
                        <td>{{$booking->startTime}}</td>
                        <td>{{$booking->endTime}}</td>

                        <td>
                            <form method="POST" action="{{route ('clerk.bookings.dashboard.approve') }}" > 
                           @csrf 

                                <input
                                    type="checkbox" class="form-control" name="approve"
                                @if($booking -> approved == 1)
                                    {{__('checked')}}
                                @endif>

                                <input type="hidden" name="bookingId" value="{{$booking->id}}">
                                <input type="hidden" name="status" value="{{$booking->status}}">
                                <td><input type="submit" name="submit" class="btn btn-primary" value="Done">
                                </td>
                            </form>
                        </td>
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