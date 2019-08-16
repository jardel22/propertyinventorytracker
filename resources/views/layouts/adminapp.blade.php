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
    
    

  <div class="collapse navbar-collapse" id="navbarsExample05">


    <div class="collapse navbar-collapse"></div>
        <div class="container-fluid">
                {{-- <div class="navbar-header"> --}}
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('user.dashboard') }}">{{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
            
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
                <ul class="navbar-nav mr-auto">

                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>

                <li class="nav-item"><a class="nav-link" href="/pricelist">Pricelist</a></li>

                <li class="nav-item"><a class="nav-link" href="/contact">Contact Us</a></li>

                <li class="nav-item"><a class="nav-link" href="/statements">Statements</a></li>

                </ul>
                </ul>

                <ul class="nav navbar-nav navbar-right" style="text-align:center">
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">{{ Auth::user()->clientFirstname }} {{ Auth::user()->clientLastname }}
                    </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/details">My Details</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </li>
                        </ul>
                    </li>
                </ul>

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
