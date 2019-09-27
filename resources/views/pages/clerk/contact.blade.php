@extends('layouts.clerkapp')

@section('content')
<div style="margin:10px 10px 10px 10px">
{{Breadcrumbs::render('clerkContact-us')}}
</div>

<div style="margin:10px 10px 10px 10px">
    <div class="card">
        <div class="card-header" style="text-align:center; text-transform:capitalize"><strong>Contact Us</h1></strong></div>

        
        <div class="table-responsive-md" style="margin:10px 10px 10px 10px"> 

                <strong>
                Office Details for Property Inventory Tracker:</strong>
                    <div style="text-align:right;margin-right:10px">
                    Office 2
                    <br>
                    Beechwood House
                    <br>
                    1 Courtney Gardens
                    <br>
                    Birmingham
                    <br>
                    B43 6LJ
                    </div>
                    {{-- CHANGE ONCE AN ADDRESS FIELD HAS BEEN ADDED TO CLERKS TABLE IN THE DATABASE --}}
                <div style="margin-left:10px">
                <strong>Contact Name:</strong> Suki Tiwana
                </div>
                <br>
                <div style="margin-left:10px">
                <strong>Telephone Number:</strong> 03333 448158
                </div>
                <br>
                <div style="margin-left:10px">
                <strong>Email Address:</strong> info@propertyinventorytracker.com
                </div>
                <br>
                
            </div>
        </div>
    </div>
</div>
@endsection