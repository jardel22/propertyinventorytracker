@extends('layouts.clerkapp')

@section('content')
<div style="margin:10px 10px 10px 10px">
{{Breadcrumbs::render('clerkBookings')}}
</div>

<div style="margin:10px 10px 10px 10px">
    <div class="card">
        <div class="card-header" style="text-align:center; text-transform:capitalize"><strong>Bookings Dashboard</h1></strong></div>

        
        <div class="table-responsive-md" style="margin:10px 10px 10px 10px">
            <table class="table table-bordered">
            <thead>
                        <tr style="text-align:center">
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th>More Info</th>
                            <th>Approve</th>
                            <th>Create Report</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @forelse($bookings as $booking)
                        <?php  
                        date_default_timezone_set('Europe/London');
                        $ldate = date('Y-m-d H:i:s'); ?>
                        
                        @if($booking->startTime < $ldate && Auth::user()->clerkId == $booking->clerk_id)

                        <tr style="text-align:center">
                            <td>{{$booking->startTime}}</td>
                            <td>{{$booking->endTime}}</td>
                            <td>
                            
                                @if($booking -> approved == 0)
                                    {{__('Booking Not Approved Yet')}}
                                @elseif($booking -> approved == 1 && $booking -> status ===  'Check in portal')
                                    {{__('Report Submitted to Client')}}
                                
                                @elseif($booking -> approved == 1 && $booking -> status ===  'Completed')
                                    {{__('Completed and Reviewed by Client')}}
                                
                                @elseif($booking -> approved == 1)
                                    {{__('Booking Conducted')}}
                                @endif

                            </td>
                            <td> <a href="/clerk/bookings/{{$booking->bookingId}}/show" class="btn btn-success btn-sm">View</a></td>
                            <td> <a href="/clerk/bookings/{{$booking->bookingId}}/edit" class="btn btn-primary btn-sm disabled">Approve</a></td>
                            @if($booking->status === 'Completed')
                            <td> <a href="/clerk/bookings/{{$booking->bookingId}}/report" class="btn btn-primary btn-sm disabled">Report</a></td>
                            @else
                            <td> <a href="/clerk/bookings/{{$booking->bookingId}}/report" class="btn btn-primary btn-sm">Report</a></td>
                            @endif
                        
                            <td>
                            {!!Form::open(['action' => ['BookingsController@destroy', $booking->bookingId], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                            </td>
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

                            <td> <a href="bookings/{{$booking->bookingId}}/edit" class="btn btn-primary btn-sm">Approve</a></td>

                            <td> <a href="/
                            clerk/bookings/{{$booking->bookingId}}/report" class="btn btn-primary btn-sm disabled">Report</a></td>
                            <td>
                            {!!Form::open(['action' => ['BookingsController@destroy', $booking->bookingId], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                            </td>
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
@endsection