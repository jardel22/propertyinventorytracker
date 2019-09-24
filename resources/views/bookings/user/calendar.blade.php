{{-- extending the layout for users (customers) interacting with the system --}}
@extends('layouts.userapp')

@section('content')
<div class="container">
  @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br/>
  @endif
  <div class="panel panel-default">
    <div class="panel-heading">
        <h2>PropertyInventoryTracker Booking Calendar</h2>
      </div>
      <div class="panel-body" >
        <div id='calendar'></div>
      </div>
    </div>
  </div>

{{-- scripts used to display the calendar --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

{{-- script for content shown within the calendar view --}}
<script>
$(document).ready(function() {
  var calendar = $('#calendar').fullCalendar({
      editable:false,
      header:{
      left:'prev,next today',
      center:'title',
      right:'month,agendaWeek,agendaDay'
      },
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
      selectable:true,
      selectHelper:true,
      editable:false,
      
      
  });
  });

</script>

<br>
<br>
<div class="container">
{{-- display a table under the calendar which will have information regarding confirmed bookings --}}
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
  {{-- set the timezone to London because the during daylight saving the clocks change. This change is not done automatically within the system without the timezone being set --}}
  <?php 
  date_default_timezone_set('Europe/London');
  $ldate = date('Y-m-d H:i:s'); ?>

  {{-- if the bookings start time is more than the current date and time and the users id is equal to the id of the client that requested the booking do what it written below --}}
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
  <tr>No Bookings</tr>
  
  @endforelse

  </tbody>


</table>
</div>
<br>
<br>


@endsection