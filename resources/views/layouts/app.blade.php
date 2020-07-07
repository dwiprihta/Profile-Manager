<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    <!-- #Region Navbar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                 <span>ProfilManager</span>   
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
                    <!-- #Region Left Slide Navbar -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link p-4 active">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link p-4 ">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link p-4 ">Article</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link p-4 ">Gallery</a>
                            </li>
                        </ul>
                    <!-- #Endregion Left Slide Navbar -->

                    <!-- #Region Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- #Region Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link btn btn-warning" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-success ml-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </ul>
                    <!-- #Endregion Right Side Of Navbar -->
                </div>
            </div>
        </nav>
    <!-- #Endregion Navbar -->

     <!-- #Region Content -->
        <main>
            @yield('content')
        </main>
     <!-- #Region Content -->
    

    <!-- #Region Footer -->
        <footer class="text-white bg-primary py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 text-center text-md-left">
                    <a href="index.html">
                        <img src="{{ asset('img/ilkoom_logo.png') }}" style="height: 60px;">
                    </a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Aperiam cumque, esse modi maxime veniam nulla delectus dolorem
                    </p>
                    </div>
               
                <div class="col-md-3 text-left">
                    <h2>Community</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Activity</a></li>
                        <li><a href="#" class="text-white">Member</a></li>
                        <li><a href="#" class="text-white">Groub</a></li>
                        <li><a href="#" class="text-white">Groub</a></li>
                    </ul>
                </div>

                <div class="col-md-3 text-left">
                    <h2>Our Service</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Our Vision</a></li>
                        <li><a href="#" class="text-white">Our Mission</a></li>
                        <li><a href="#" class="text-white">Privacy Police</a></li>
                        <li><a href="#" class="text-white">Terms & Condition</a></li>
                    </ul>
                </div>

                <div class="col-md-3 text-left">
                    <h2>Our Service</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">prihtapambudi@gmail.com</a></li>
                        <li><a href="#" class="text-white">082382611951</a></li>
                        <li><a href="#" class="text-white">www.dwiprihta.github.io</a></li>
                        <li><a href="#" class="text-white">Karanganyar, Indonesia</a></li>
                    </ul>
                </div>
                </div><hr style="border-color:#fff;">
                <div class="row mt-3 mt-md-0">
                    <div class="col-md-3 mr-md-auto text-center text-md-left">
                        <p>Create dwi prihtapambudi</p>
                    </div>
                    <div class="col-md-3 text-right text-md-right">
                        <p>2020</p>
                    </div>
                </div>
            </div>
        </footer>   
    <!-- #Endregion Footer -->

    </div>
</body>
</html>
