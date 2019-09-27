{{-- if more than one error is found use the alert alert-danger class and display the error --}}
@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

{{-- if the task is successful and success is called, use the alert alert-success bootstrap class to display success message --}}
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

{{-- if there is an error use the alert alert-danger class and display the error --}}
@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif