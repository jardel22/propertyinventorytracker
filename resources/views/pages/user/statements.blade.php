@extends('layouts.userapp')

@section('content')
<div style="margin:10px 10px 10px 10px">
{{Breadcrumbs::render('statements')}}
</div>

<div style="margin:10px 10px 10px 10px">
    <div class="card">
        <div class="card-header" style="text-align:center; text-transform:capitalize"><strong>My Details</h1></strong></div>

        
        <div class="table-responsive-md" style="margin:10px 10px 10px 10px"> 

            <table class="table table-bordered">
            <thead>
            <tr>
            <th>Ref No.</th>
            <th>Booking Ref.</th>
            <th>Date</th>
            <th>Job Type</th>
            <th>Price</th>
            <th>Paid</th>
            <th>Outstanding</th>
            </tr>
            </thead>

            <tbody>
            @forelse($bookings as $booking)
            <tr>
                <th scope="row"></td>
                <td>{{$booking->bookingId}}</td>
                <td>{{$booking->startTime}} To {{$booking->bookingId}}</td>
                <td>{{$booking->jobType}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            

            @empty
            <h4>No Bookings</h4>
            @endforelse
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection