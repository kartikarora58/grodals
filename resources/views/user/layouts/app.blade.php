<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  

  <!-- Custom fonts for this template-->
  <link href="{{asset('/public/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('/public/css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-light navbar-expand-sm fixed-top" id="mypage" style="background-color: white;">
    <img src="{{asset('/public/image/grod.jpg')}}" width="100px" height=auto>
    <!-- for navbar collapsing -->
    <button type="button"class="navbar-toggler" data-toggle="collapse" data-target="#demo1">
    <span class="navbar-toggler-icon"></span></button>

    <!-- for rest navbar -->
    <div class="collapse navbar-collapse" id="demo1">

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="{{url('/')}}" class="nav-link"> Home</a>
        </li>
        <li class="nav-item">
          <a href="{{url('/listing')}}" class="nav-link">Listing</a>
        </li>
        <li class="nav-item">
          <a href="{{url('/contact')}}" class="nav-link">Contact Us</a>
        </li>
         <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{route('user.home')}}" class="dropdown-item">Dashboard</a>

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
      </ul>
    </div>
  </nav>
  <br>
  <br>
  <br>
  <br>
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
