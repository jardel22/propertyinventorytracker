@extends('layouts.clerkapp')

@section('content')
<div class="container">
    
    @forelse($bookings as $booking)
      <div class="container">


    <br>
    <div class="" style="text-align:center">
    <h5 style="text-transform:capitalize">
    <strong>1. Download {{$booking->clientFirstname}} {{$booking->clientLastname}}'s report by clicking the download button below</strong> 
    <br><br>

    <button class="btn btn-primary btn-lg"  style="display:inline-block;color:black">
        <i class="material-icons" style="font-size:20px;color:white">get_app</i>
        <a href="{{route ('createWord', $booking->bookingId) }}" style="font-size:21px;color:white">Download Files</a> 
    </button> 
    <br><br><br>

    
    

        <div class="container" >
            <form method="post" action="{{action ('WordCreationController@storeFile', $booking->bookingId) }}" class="form-horizontal" style="text-align:center" enctype="multipart/form-data">
            {{csrf_field()}}
           
           <div class="form" style="text-align:center">
            <label for="file"><strong>2. Complete the document in microsoft word and then Upload the file using the upload button provided</strong> </label>
                <input type="file" name="file" class="btn btn-default">
           </div>
           <br>

                <br>
    <label for="submit"> <strong>3. Click the Sumbit button to save submitted file and send to {{$booking->clientFirstname}} {{$booking->clientLastname}}'s portal for review.</strong></label><br><br>
    
                <input type="submit" class="btn btn-primary btn-lg" name="submit">

                <input type="hidden" value="{{$booking->clientFirstname}}" name="clientFirstname">
                <input type="hidden" value="{{$booking->clientLastname}}" name="clientLastname">
                <input type="hidden" value="{{$booking->bookingId}}" name="bookingId">
                <input type="hidden" value="{{$booking->jobType}}" name="jobType">
            </form>
        </div>

    <br><br>


    </h5>
    </div>
    
        
        

        {{--This bottom one is for user  --}}
        {{-- <button class="btn btn-primary btn-lg" href="/download/TestWordFile.docx" style="display:inline-block;color:black">
            <i class="material-icons" style="font-size:20px;color:black">get_app</i>
            <span style="font-size:21px;color:black">Download Files</span> 
        </button>  --}}
        
        </div>  
        
        <br><br>
        
    
</div>

    @empty
    @endforelse
@endsection