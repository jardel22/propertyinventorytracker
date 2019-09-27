@extends('layouts.adminapp')

@section('content')
<div style="margin:10px 10px 10px 10px">
{{Breadcrumbs::render('adminDetails')}}
</div>

<div style="margin:10px 10px 10px 10px">
    <div class="card">
        <div class="card-header" style="text-align:center; text-transform:capitalize"><strong>My Details</h1></strong></div>

        
        <div class="table-responsive-md" style="margin:10px 10px 10px 10px"> 
                @forelse($admins as $admin)
                <p>
                <div><strong>Account Name:</strong> {{$admin->adminFirstname}} {{$admin->adminLastname}}
                    <br><br>                
                    <strong>Email Address:</strong> <a style="text-decoration:underline">{{$admin->email}}</a> 
                    <br><br>
                    <a href="/admin/details/update-password"> Click here to update password</a>
                </div>
                </p>

                 
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection