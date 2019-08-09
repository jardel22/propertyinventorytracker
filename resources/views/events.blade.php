@extends('layouts.userapp')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">Booking Calendar</div><br>
            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: #2e6da4; color: white">
                        <h3>Booking Calendar [Full - Calendar]</h3>
                    </div>

                    <div class="panel-body">
                        {!! $calendar->calendar() !!}
                        {!! $calendar->script() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
            