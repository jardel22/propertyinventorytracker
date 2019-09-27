@extends('layouts.userapp')

@section('content')
<div style="margin:10px 10px 10px 10px">
{{Breadcrumbs::render('bookings')}}
</div>

<div style="margin:10px 10px 10px 10px">
    <div class="card">
        <div class="card-header" style="text-align:center; text-transform:capitalize"><strong>Your Bookings Dashboard</h1></strong></div>

        
        <div class="table-responsive-md" style="margin:10px 10px 10px 10px">
            <table class="table table-bordered">
            <thead>
                        <tr style="text-align:center">
                            <th>Address</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th>More Info</th>
                            <th>Delete</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                    @forelse($bookings as $booking)

                    @if($booking->status === 'Check in portal')

                    <tr style="text-align:center">
                        <td>{{$booking->addressLine1}}</td>
                        <td>{{$booking->startTime}}</td>
                        <td>{{$booking->endTime}}</td>
                        <td><a href="/bookings/{{$booking->bookingId}}/portal" class="btn btn-danger btn-sm">{{$booking->status}}</a></td>
                        <td> <a href="/bookings/{{$booking->bookingId}}/show" class="btn btn-primary btn-sm">View</a> </td>
                        <td>
                        {!!Form::open(['action' => ['BookingsController@destroy', $booking->bookingId], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                        {!!Form::close()!!}
                        </td>
                    </tr>

                    @elseif($booking->status === 'Completed')

                    <tr style="text-align:center">
                        <td>{{$booking->addressLine1}}</td>
                        <td>{{$booking->startTime}}</td>
                        <td>{{$booking->endTime}}</td>
                        <td><span class="badge badge-success">{{$booking->status}}</span></td>
                        <td> <a href="/bookings/{{$booking->bookingId}}/show" class="btn btn-primary btn-sm">View</a></td>
                        <td>
                        {!!Form::open(['action' => ['BookingsController@destroy', $booking->bookingId], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                        {!!Form::close()!!}
                        </td>
                    </tr>

                    @else
                    <tr style="text-align:center">
                        <td>{{$booking->addressLine1}}</td>
                        <td>{{$booking->startTime}}</td>
                        <td>{{$booking->endTime}}</td>
                        <td>{{$booking->status}}</td>
                        <td> <a href="/bookings/{{$booking->bookingId}}" class="btn btn-primary btn-sm">View</a></td>
                        <td>
                        {!!Form::open(['action' => ['BookingsController@destroy', $booking->bookingId], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
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