<!-- calendar.blade.php -->
@extends('layouts.clerkapp')

@section('content')
<div style="margin:10px 10px 10px 10px">
{{Breadcrumbs::render('clerkHome')}}
</div>

<div style="margin:10px 10px 10px 10px">
    <div class="card">
        <div class="card-header" style="text-align:center; text-transform:capitalize"><strong>Approved Bookings</h1></strong></div>
        <div style="margin:10px 10px 10px 10px">
          <div id='calendar'></div> {{--To show Calendar--}}
            
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

{{-- {!! $calendar->script() !!} --}}

{{-- actual script for calendar --}}
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
<table class="table table-striped">
  <thead>
      <tr style="text-align:center">
          <th>Address</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Clerk Assigned</th>
          <th>Price</th>
          <th>More Info</th>
      </tr>
  </thead>
  
  <tbody>
  @forelse($bookings as $booking)
  <?php $ldate = date('Y-m-d H:i:s'); ?>
  @if ($booking->startTime > $ldate && Auth::user()->clerkId == $booking->clerk_id )

  <tr style="text-align:center; background-color:#70AADD; color:white">
      <td>{{$booking->addressLine1}}</td>
      <td>{{$booking->startTime}}</td>
      <td>{{$booking->endTime}}</td>
      <td>{{$booking->clerkFirstname}} {{$booking->clerkLastname}}</td>
      <td>{{$booking->price}}</td>
      <td> <a href="/bookings/{{$booking->bookingId}}" class="btn btn-primary btn-sm">View</a></td>
  </tr>
  @elseif($booking->startTime > $ldate)
  <tr style="text-align:center; background-color:#E2ECF5; color:black">
      <td>{{$booking->addressLine1}}</td>
      <td>{{$booking->startTime}}</td>
      <td>{{$booking->endTime}}</td>
      <td>{{$booking->clerkFirstname}} {{$booking->clerkLastname}}</td>
      <td>{{$booking->price}}</td>
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
<br>
<br>


@endsection