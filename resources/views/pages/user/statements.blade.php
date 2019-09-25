@extends('layouts.userapp')

@section('content')
{{Breadcrumbs::render('statements')}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center; text-transform:capitalize"><strong>Statements</h1></strong></div>
    
                <p>This is the Statements page</p>
            </div>
        </div>
    </div>
</div>
@endsection