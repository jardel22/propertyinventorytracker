<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts (Making dropdowns clickable)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> --}}
    <script src="{{asset('js/app.js')}}"></script>

    <!-- Styles -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' /> {{--pdated stylesheet ctrl-z a few times to undo--}}
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbars/">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;

        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    
</head>

<body>

<div id="app">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    
    

  


    <div class="collapse navbar-collapse"></div>
        <div class="container-fluid">
                {{-- <div class="navbar-header"> --}}
                <a class="navbar-brand" href="{{ route('clerk.dashboard') }}">{{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample06">
            
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('clerk.dashboard')}}">Home</a>
                </li> --}}
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Bookings<span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('clerk.bookings.dashboard')}}">
                            All Bookings
                        </a>
                        <a class="dropdown-item" href="{{route('clerk.bookings.create')}}">
                            Create a New Booking
                        </a>
                    </div>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('clerk.pricelist')}}">Pricelist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('clerk.details')}}">My Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('clerk.contact')}}">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('clerk.statements')}}">Statements</a>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-transform:capitalize" v-pre>
                        {{ Auth::user()->clerkFirstname }} {{ Auth::user()->clerkLastname }}<span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('clerk.logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('clerk.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>

                </div>
                </div>
                </nav>
                
                
        </div>
        </ul>
        @endguest
    


{{-- <ul class="navbar-nav ml-auto"> --}}
    <!-- Authentication Links -->
    
    

    
        @include('inc.messages')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
