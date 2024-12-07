<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Garage</title>

    <!-- Styles -->
   
   <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pagination.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    
</head>
<body>
    <!-- Start Bar -->
    <div class="bar">
      <div class="container">
        <div class="row ">
          <div class="col-md-8 text-md-left ">
                <a href="{{route('welcome')}}">
                    <img class="logo-img" src="{{ asset('img/logo.png') }}" width=180 alt="">
                </a>  
          </div>
          <div class="col-md-4 text-md-right login-txt">
                    <!-- Authentication Links -->
                @if (Auth::guest())
                    <a href="{{ route('login') }}">Login</a>
                @else
                You are logged as [{{ Auth::user()->name }}] 
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <b>Logout</b>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endif
          </div>
        </div>
      </div>
    </div>
    <style>
        .padding{
            padding-bottom: 70px;
        }
    </style>
    <!-- End Bar -->
    <div id="app" class="padding">
        <a href="javascript:history.back()">
            <img src="{{url('img/back-icon.png')}}" width="80" alt="">
        </a>
        <a href="{{route('home')}}">
            <img src="{{url('img/home-icon.png')}}" width="80" alt="">
        </a>
        
        @yield('content')
    </div>
    <!-- Start Copyright -->
    <div class="copyright">
      <div class="container ">
        <div class="row" style="text-align: right;display: block;">
            <small >abualmuneeb@gmail.com</small>
        </div>
      </div>
    </div>
    <!-- End Copyright -->
    <!-- Scripts -->
    
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    @yield('check-vin')
    @yield('js-show-stauts')
</body>
</html>
