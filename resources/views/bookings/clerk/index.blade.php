@extends('layouts.clerkapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bookings</div>
                <br>
                <div class="panel panel-primary">
                    <div class="panel-heading">Bookings Calendar</div><br>
                    <div class="panel-body">
                    </div>
                </div>

                <div class="card-body">
                    @if(count($bookings)>0)
                        @foreach($bookings as $booking)
                            <div class="well">
                                <h3><a href="/bookings/{{$booking->id}}">{{$booking->date}} {{$booking->startTime}} until {{$booking->endTime}} </a>
                                </h3>
                            </div>
                        @endforeach
                        {{$bookings->links()}}
                    @else
                        <p>No bookings found</p>
                    @endif
                </div>

                @forelse($bookings as $booking)
                    <p>{{$booking->booking}}</p>
                @empty
                    <h4>No Bookings</h4>
                @endforelse

            </div>
        </div>
    </div>
</div>
@endsection