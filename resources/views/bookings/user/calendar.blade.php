<!-- calendar.blade.php -->
@extends('layouts.userapp')

@section('content')
<div class="container">
@if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
   <div class="panel panel-default">
        <div class="panel-heading">
            <h2>PropertyInventoryTracker Booking Calendar</h2>
        </div>
        <div class="panel-body" >
          <div id='calendar'></div> {{--To show Calendar--}}
            {{-- {!! $calendar->calendar() !!} --}}
        </div>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

{{-- {!! $calendar->script() !!} --}}

{{-- actual script for calendar --}}
<script>
$(document).ready(function() {
    // page is now ready, initialize the calendar...
  $('#calendar').fullCalendar({
        // put your options and callbacks here
  defaultView: 'agendaWeek',
    events : [
      @foreach($bookings as $booking)
        {
          title : '{{ $booking->clientFirstname . ' ' . $booking->clientLastname }}',
          start : '{{ $booking->startTime }}',
          @if ($booking->endTime)
            end: '{{ $booking->endTime }}',
          @endif
        },
      @endforeach
    ],

    dayClick: function (start, allDay, jsEvent, view) {
    alert('You clicked me!');
}

  });
});
</script>

<br>
<br>
<div class="container">
<table class="table table-striped">
  <thead>
      <tr style="text-align:center">
          <th>Address</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Clerk Assigned</th>
          <th>Price</th>
          <th>Status</th>
          <th>More Info</th>
          
      </tr>
  </thead>
  
  <tbody>
  @forelse($bookings as $booking)
  <?php 
  date_default_timezone_set('Europe/London')
  $ldate = date('Y-m-d H:i:s'); ?>
  @if ($booking->startTime > $ldate && Auth::user()->clientId == $booking->clientId )

  <tr style="text-align:center">
      <td>{{$booking->addressLine1}}</td>
      <td>{{$booking->startTime}}</td>
      <td>{{$booking->endTime}}</td>
      <td>{{$booking->clerkFirstname}} {{$booking->clerkLastname}}</td>
      <td>{{$booking->price}}</td>
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
<br>
<br>


@endsection