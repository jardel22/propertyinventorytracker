@extends('layouts.userapp')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Create a Booking</div>
    </div>
    <br>

    {{-- <form method="post" action="{{action ('BookingsController@store') }}" >
        <div class="form-group">
            <label for="time">Date and Time</label>
            <input type="dateTime-Local" id="startTime" name="startTime" class="form-control datepicker-lg">
        </div>

        <div class="form-group">
            <label for="address">Address Line 1</label>
            <input type="text" id="addressLine1" name="addressline1" class="form-control">
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" id="city" name="city" class="form-control">
        </div>

        <div class="form-group">
            <label for="postcode">Postcode</label>
            <input type="text" id="postcode" name="postcode" class="form-control">
        </div>

        <div class="form-group">
            <label for="bedrooms">Number of Bedrooms</label>
            <select id="bedrooms" name="bedrooms" class="form-control">
                <option value="studio">Studio</option>
                <option value="1">1</option>    
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>

        <div class="form-group">
            <label for="furnished">Is the property furnished?</label>
            <select id="furnished" name="furnished" class="form-control">
                <option value="no">No</option>
                <option value="yes">Yes</option>    
            </select>
        </div> 
        

        <div class="form-group">
            <label for="garage">Does the property have a garage?</label>
            <select id="garage" name="garage" class="form-control">
                <option value="No">No</option>
                <option value="Yes">Yes</option>  
            </select>  
        </div>
            

        <div class="form-group">
            <label for="gasMeterLocation">Gas meter location</label>
            <input type="text" id="subject" name="gasMeterLocation" placeholder="Write something.." class="form-control">
        </div>

        <div class="form-group">
            <label for="electricityMeterLocation">Electricity meter location</label>
            <input type="text" id="subject" name="electricityMeterLocation" placeholder="Write something.." class="form-control">
        </div>

        <div class="form-group">
            <label for="waterMeterLocation">Water meter location</label>
            <input type="text" id="subject" name="waterMeterLocation" placeholder="Write something.." class="form-control">
        </div>

        
        <div class="form-group">
            <label for="purchaseOrderNumber">Purchase order number</label>
            <input type="text" id="subject" name="purchaseOrderNumber" placeholder="Write something.." class="form-control">
        </div>

        
        <div class="form-group">
            <label for="specialInstructions">Special instructions</label>
            <input type="text" id="subject" name="specialInstructions" placeholder="Write something.." class="form-control">
        </div>

        
        <div class="submit">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </div>
    </form> --}}

    {!! Form::open(['action' => 'BookingsController@store', 'method' => 'POST']) !!}
        
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
            {{Form::label('postcode', 'Please enter the postcode of the property')}}
            {{Form::text('postcode', '', ['class'=>'form-control', 'placeholder' => 'Postcode'])}}
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
    {!! Form::close() !!}
</div>
@endsection