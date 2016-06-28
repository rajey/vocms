<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta name="base_url" content="{{ URL::to('/') }}">

    <title>VOCMS</title>
    <link rel="icon" href="{!! asset('images/truck.ico') !!}"/>
    <!--Fonts-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">

    <!--styles-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<body id="app-layout">
  <!-- will be used to show any messages -->
  <div class="text-center" id="message"></div>
    <nav class="navbar navbar-default navbar-fixed-top app-navbar">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" style="margin-top:3%;"class="navbar-toggle collapsed btn" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <div class="navbar-brand app-brand">
                  <a class="btn" href="{{ url('/') }}">
                      <img src="{{asset('images/new-truck.png')}}" alt=""/>
                  </a>
                  <span class="hidden-xs"><strong>VEHICLE OVERLOAD CONTROL MANAGEMENT SYSTEM</strong></span>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid wrapper">
      <div class="row" style="margin-top: 85px; margin-bottom: 20px;">
        <!--sidebar-->
				@include('layouts.sidebar')
        <!--content area-->
        <div class="row content-area">
          <div class="col-sm-12 page">
            @yield('content')
          </div>
        </div>
      </div>
    </div>

    <!---Scripts-->
    <script type="text/javascript" src="{{asset('js/jquery-2.2.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Chart.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/district.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/create.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/company-statistics.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/station-chart.js')}}"></script>
</body>
</html>
