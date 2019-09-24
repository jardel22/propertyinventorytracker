@extends('layouts.userapp')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Create a Booking</div>
    </div>
    <br>
<?php header('Access-Control-Allow-Origin: *'); ?>

    {!! Form::open(['action' => 'BookingsController@store', 'class' => 'create', 'method' => 'POST']) !!}
        
        <fieldset>
        <div class="form-group">
            {{Form::label('jobType', 'What Services Do You Require?')}}
            {{Form::select('jobType', array(
                'Inventory Check' => 'Inventory Check',
                'Check Out' => 'Check Out',
                'Interim' => 'Interim',
                'Update' => 'Update'),'', ['class' => 'form-control'] )}}
        </div>
        
        <div class="form-group">
            {{Form::label('date', 'What date would you like to book?')}} <br>
            {{Form::date('date', 'What date would you like to book?', ['class'=>'form-control datepicker-lg'])}}
        </div>

        <div class="form-group">
            {{Form::label('time', 'What time would you like to book?')}} <br>
            {{Form::time('time', 'What time would you like to book?', ['class'=>'form-control timepicker-lg'])}}
        </div>


        
        <div class="form-group">
            {{Form::label('addressLine1', 'What is the first line of your address?')}}
            {{Form::text('addressLine1', '', ['class'=>'form-control', 'placeholder' => 'Address Line 1'])}}
        </div>

        <div class="form-group">
            {{Form::label('city', 'Please enter the city of the property')}}
            {{Form::text('city', '', ['class'=>'form-control', 'placeholder' => 'City'])}}
        </div>

        <div class="form-group">
            {{Form::label('county', 'Please enter the county of the property')}}
            {{Form::text('county', '', ['class'=>'form-control', 'placeholder' => 'County'])}}
        </div>

<script>
    //call geocode
    
    geocode();
    function geocode(){
        var postcode = 'b47et';
        axios.get('https://api.postcodes.io/postcodes/'+postcode)
        .then(function(response){
            console.log(response);
        })
        .catch(function(error){
            console.log(error);
        })
}
</script>
        
        <div class="form-group">
            {{Form::label('postcode', 'Please enter the postcode of the property')}}
            {{Form::text('postcode', '', ['class'=>'form-control', 'id'=>'postcode', 'placeholder' => 'Postcode'])}}
        </div>

        <div class="form-group">
            {{Form::label('bedrooms', 'Number of bedrooms')}}
            {{Form::select('bedrooms', array(
                'Studio' => 'Studio',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '7',
                '8' => '8',
                '9' => '9',
                '10' => '10'),'', ['class' => 'form-control'] )}}
        </div>  

        <div class="form-group">
            {{Form::label('garage', 'Does this property have a garage?')}}
            {{Form::select('garage', array(
                'Yes' => 'Yes',
                'No' => 'No' ),'', ['class' => 'form-control'] )}}
        </div>

        <div class="form-group">
            {{Form::label('furnished', 'Is this property furnished?')}}
            {{Form::select('furnished', array(
                'Yes' => 'Yes',
                'No' => 'No' ),'', ['class' => 'form-control'] )}}
        </div>

        <div class="form-group">
            {{Form::label('electricityMeterLocation', 'Please enter the location of the electricity meter')}}
            {{Form::text('electricityMeterLocation', '', ['class'=>'form-control', 'placeholder' => 'Electricity Meter Location'])}}
        </div>

        <div class="form-group">
            {{Form::label('gasMeterLocation', 'Please enter the location of the gas meter')}}
            {{Form::text('gasMeterLocation', '', ['class'=>'form-control', 'placeholder' => 'Gas Meter Location'])}}
        </div>

        <div class="form-group">
            {{Form::label('waterMeterLocation', 'Please enter the location of the water meter')}}
            {{Form::text('waterMeterLocation', '', ['class'=>'form-control', 'placeholder' => 'Water Meter Location'])}}
        </div>

        <div class="form-group">
            {{Form::label('purchaseOrderNumber', 'Please enter the purchase order number')}}
            {{Form::text('purchaseOrderNumber', '', ['class'=>'form-control', 'placeholder' => 'Purchase Order Number'])}}
        </div>

        <div class="form-group">
            {{Form::label('specialInstructions', 'Please enter any special instructions')}}
            {{Form::text('specialInstructions', '', ['class'=>'form-control', 'placeholder' => 'Special Instructions: e.g. alarm code'])}}
        </div>


        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        </fieldset>
    {!! Form::close() !!}
</div>

@endsection