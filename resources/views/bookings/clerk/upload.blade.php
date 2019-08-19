@extends('layouts.clerkapp')

@section('content')
<div class="container">
    
    @forelse($bookings as $booking)
      <div class="container">

        
        <button class="btn btn-primary btn-lg" href="{{route ('createWord', $booking->bookingId) }}" style="display:inline-block;color:black">
            <i class="material-icons" style="font-size:20px;color:black">get_app</i>
            <span style="font-size:21px;color:black">Download Files</span> 
        </button> 

        {{--This bottom one is for user  --}}
        {{-- <button class="btn btn-primary btn-lg" href="/download/TestWordFile.docx" style="display:inline-block;color:black">
            <i class="material-icons" style="font-size:20px;color:black">get_app</i>
            <span style="font-size:21px;color:black">Download Files</span> 
        </button>  --}}
        
        </div>  
        
        <br><br>
        
        <div class="row justify-content-center">
        <form method="post" action="{{action ('WordCreationController@storeFile', $booking->bookingId) }}" class="form-horizontal" style="text-align:center" enctype="multipart/form-data">
        {{csrf_field()}}
            <input type="file" name="file">
            <br><br>
            <input type="submit" class="btn btn-info">
            <input type="hidden" value="{{$booking->clientFirstname}}" name="clientFirstname">
            <input type="hidden" value="{{$booking->clientLastname}}" name="clientLastname">
            <input type="hidden" value="{{$booking->bookingId}}" name="bookingId">
            <input type="hidden" value="{{$booking->jobType}}" name="jobType">
        </form>
    </div>
    
</div>
    @empty
    @endforelse
@endsection