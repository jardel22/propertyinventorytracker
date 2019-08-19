@extends('layouts.adminapp')

@section('content')
@forelse($bookings as $booking)
<span class="m-5 pb-5">
<div class="card-body">
<div class="container" style="text-transform:capitalize">
  {{-- <div id="accordian">
    <div class="card">
      <div class="card-header">
        <a class="card-link" data-toggle="collapse" href="#collapseOne"><h5 class="text-center">
          <strong>Click To View The Current Values Of The Editable Sections
          </strong>
        </a>
      </div>
      <div id="collapseOne" class="collapse">
        <div class="card-body">
        <strong><u>Start Time:</u></strong> {{$booking->startTime}}  <br><br>
        <strong><u>End Time:</u></strong> {{$booking->endTime}} <br><br>
        <strong><u>Clerk Assigned:</u></strong> 
            @if($booking -> clerk_id == NULL)
                {{__('No Clerk Assigned, Please Assign a Clerk Below')}}
            @else
                {{$booking->clerkFirstname}} {{$booking->clerkLastname}} {{__('has been assigned to this booking. to change please select the new clerk from the dropbox below')}}
            @endif <br><br>
        <strong><u>Approved:</u></strong> 
          @if($booking -> approved == 0)
              {{__('This Booking Has Not Been Approved Yet')}}
          @endif
          @if($booking -> approved == 1)
              {{__('This Booking Has Been Approved. Click the checkbox below to undo this decision')}}
          @endif
        </div>
      </div>
  </div> --}}
<br>
<form method="post" action="
{{action ('AdminBookingsController@update', $booking->bookingId) }}" >
    {{csrf_field()}}

        <input type="hidden" name="_method" value="PATCH"/>
        
      {{-- <div class="form-group row" style="position:relative">
        
        <div class="col-sm-6" >
            <label for="time"><strong>Start Time</strong></label>
            <input type="dateTime-Local" id="startTime" name="startTime" class="form-control datepicker-lg" value="{{$booking->startTime}}">
        </div>

        <div class="col-sm-6">
            <label for="time"><strong>End Time</strong></label>
            <input type="dateTime-Local" id="endTime" name="endTime" class="form-control datepicker-lg" value="{{$booking->endTime}}">
        </div>
        
      </div> --}}
        

  <div class="form-group">
        <label for="clerk"><strong>Assign a Clerk to the Booking</strong></label>
        <select name="clerk" id="clerk" class="form-control" title="Assign a Clerk to the Booking">
         
          @foreach ($clerkname_array as $data)
          <option value="{{$data->clerkId}}">
            {{$data->clerkFirstname}} {{$data->clerkLastname}}
          </option>
          @endforeach

        </select>
  </div>

  <div class="custom-control custom-checkbox lg-3">
      <input 
      @if($booking -> approved == 1)
          {{__('checked')}}
      @endif type="checkbox" class="custom-control-input" id="customCheck" name="approve">
      <label class="custom-control-label" for="customCheck"><strong>click to approve this booking request</strong></label>
  </div>
  <br>                       
  <div class="form-group">
      <input type="submit" name="submit" value="Submit" class="btn btn-primary" value="Edit"/>
  </div>
    </form>
@empty
    <h4><strong>No Bookings</strong></h4>
@endforelse
</div>
</div>
</span>
@endsection