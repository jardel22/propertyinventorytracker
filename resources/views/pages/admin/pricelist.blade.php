@extends('layouts.adminapp')

@section('content')
{{Breadcrumbs::render('adminPricelist')}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center; text-transform:capitalize"><strong>Pricelist</h1></strong></div>
    
                <div style="margin:10px 10px 10px 10px;text-decoration:underline">
                <p><strong><mark>INVENTORY REPORT</mark></strong></p>
                </div>
                
                    <table class="table table-bordered">
                    <thead>
                    <tr>
                    <th>Property Type</th>
                    <th>Studio</th>
                    <th>1 Bed</th>
                    <th>2 Bed</th>
                    <th>3 Bed</th>
                    <th>4 Bed</th>
                    <th>5 Bed</th>
                    <th>6 Bed</th>
                    </tr>
                    </thead>

                    <tbody>

                    <tr>
                        <th scope="row">UNFURNISHED</td>
                        <td>45</td>
                        <td>50</td>
                        <td>65</td>
                        <td>75</td>
                        <td>100</td>
                        <td>120</td>
                        <td>140</td>
                    </tr>

                    <tr>
                        <th scope="row">FURNISHED</td>
                        <td>50</td>
                        <td>60</td>
                        <td>85</td>
                        <td>120</td>
                        <td>150</td>
                        <td>170</td>
                        <td>200</td>
                    </tr>
                    
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection