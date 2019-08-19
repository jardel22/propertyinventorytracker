@if (Auth::guard('web')->check())
    <p class="text-success">
        You are Logged in as a <strong>CLIENT</strong>
    </p>
@else
    {{-- <p class="text-danger">
        You are Logged out as a <strong>USER</strong>
    </p> --}}
@endif

@if (Auth::guard('admin')->check())
    <p class="text-success">
        You are Logged in as a <strong>ADMIN</strong>
    </p>
@else
    {{-- <p class="text-danger">
        You are Logged out as a <strong>ADMIN</strong>
    </p> --}}
@endif

@if (Auth::guard('clerk')->check())
    <p class="text-success">
        You are Logged in as a <strong>CLERK</strong>
    </p>
@else
    {{-- <p class="text-danger">
        You are Logged out as a <strong>CLERK</strong>
    </p> --}}
@endif