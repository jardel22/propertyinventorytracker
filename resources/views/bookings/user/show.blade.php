@extends('layouts.userapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$booking->date}} {{$booking->startTime}} until {{$booking->endTime}}</div>
                <small>Booking request made on {{$booking->created_at}}</small>
                <div>
                    {{$booking->id}}
                    {{$booking->date}}
                    {{$booking->startTime}}
                    {{$booking->endTime}}
                    {{$booking->users->firstname}}
                    {{$booking->users->lastname}}
                    {{$booking->properties->addressLine1}}
                    {{$booking->properties->city}}
                    {{$booking->properties->postcode}}
                    {{$booking->properties->parameters->bedrooms}}
                    {{$booking->properties->parameters->garage}}
                    {{$booking->properties->parameters->gasMeterLocation}}
                    {{$booking->properties->parameters->waterMeterLocation}}
                    {{$booking->properties->parameters->gasMeterLocation}}
                    {{$booking->properties->parameters->specialInstruction}}
                    {{$booking->properties->parameters->purchaseOrderNumber}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection