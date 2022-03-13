<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <!--This is the app name which is configured from .env file on APP_NAME.
These ouble double braces you see  work as echo, in laravel we do'nt use echo but we use those braces with in
 them, are your output.
 Also note that doing 'app.name','Bruno demo' we are like testing a condition forexample if app.name 
 not existing out put Bruno demo.
-->
<title>{{ config('app.name', 'Laravel') }}</title>


<!--You can create your own custom js and css files in /public/js/custom.js  or  
/public/css/custom.css and reference them here as well-->
<!--contains required bootstrap js files-->
    <!-- Scripts -->
  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/shoppingstyle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ionicons/css/ionicons.min.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Bruno demo') }}
                    <span id="countvisitsbadge" class="badge btn btn-danger">5</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    <li class="nav-item">
        <a class="nav-link" href="/">Home</a><!--route in routes->web.php-->
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/services">Services</a><!--route in routes->web.php-->
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about">About</a><!--route in routes->web.php-->
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/posts">Posts</a><!--route in routes->web.php-->
      </li>


      <li class="nav-item">
        <a class="nav-link" href="/todo">Ajax example</a><!--route in routes->web.php-->
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/products">E-cormerce demo</a><!--route in routes->web.php-->
      </li>

      <li class="nav-item">
      <a href="{{route('download','1')}}"  class="nav-link btn btn-primary btn-sm" style="color:#fff">Dynamic Download</a>
      </li>

    &nbsp;&nbsp;&nbsp;&nbsp;

      <li class="nav-item">
        <a class="nav-link btn btn-primary btn-sm" href="/filedownload" style="color:#fff">Direct Download</a><!--route in routes->web.php-->
      </li>

     
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
      </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-12">
        <main class="py-4">
            @yield('content')
        </main>
        </div>
        </div>
        </div>

    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <script src="{{ asset('js/todo.js') }}" defer></script>
    <script src="{{ asset('js/shopping.js') }}" defer></script>

</body>
</html>
