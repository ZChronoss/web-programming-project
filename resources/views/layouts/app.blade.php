<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Icons --}}
    <script src="https://kit.fontawesome.com/17118d186d.js" crossorigin="anonymous"></script>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav style="background-color: #F3E9DC" class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/navbar-logo.svg" style="max-width: 30px">
                    {{ config('Snapcat', 'Snapcat') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <div>
                                    <li class="nav-item">
                                        <div  class="btn btn-outline-primary btn-nav">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </div>
                                    </li>
                                </div>
                            @endif

                            @if (Route::has('register'))
                                <div class="ms-3">
                                    <li class="nav-item">
                                        <div class="btn btn-nav btn-outline-primary">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </div>
                                    </li>
                                </div>
                            @endif
                        @else
                            <button type="submit" class="btn btn-nav p-0 m-0">
                                <a class="nav-link p-0 m-0 me-5 fw-light" style="text-decoration: none; color: black;" href="explore">Explore</a>
                            </button>

                            <button type="submit" class="btn btn-nav p-0 m-0">
                                <a class="nav-link p-0 m-0 me-5 fw-light" style="text-decoration: none; color: black;" href="home">Profile</a>
                            </button>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">
            @yield('content')
        </main>

        <footer class="container-fluid position-sticky" style="background-color: #5E3023">
            <div class="container text-center p-5">
                <div class="row align-items-start">
                    <div class="col text-end text-light m-0 p-0">
                        <p class="m-0">SnapCat</p>
                    </div>
                    <div class="col-md-1 p-0">
                        <img src="/images/navbar-logo.svg" class="" style="max-width: 3vh">
                    </div>
                    <div class="col text-start text-light m-0 p-0">
                        <p class="m-0">Web Programming Project</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
