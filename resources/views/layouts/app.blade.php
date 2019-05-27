<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/animate-custom.css') }}" type="text/css" media="all"    <link rel="stylesheet" href="{{ asset('css/animate-custom.css') }}" type="text/css" media="all">
    
    <style>
      
    header{
      height: 125px;
    }

    nav{
      height: 75px;
    }

    .top-bar{
      height: 50px;
			color: #fff;
      border-bottom:1px solid #21a46b;

		}

    .top-left{
      padding-bottom: 2.4% 
    }

    .top-login{
      padding-bottom: 19% 
    }

    .top-right{
      padding-bottom: 50%
    }

		.anchor{
			color: #fff;
		}

		.anchor:hover{
			text-decoration: none;
			color: #21a46b
		}

    @media(max-width:853px){
      .top-left{
        display: none;
      }
      .top-login{
        font-size: 18px;
        padding-top: 5%
      }
      .center{
        margin: 0 auto;
      }
    }

    .middle {
      color: white;
      margin: 0;
      transform: translate(-50%, -50%);
      text-align: center;
      position: absolute;
      top: 50%;
      left: 50%;
    }

    </style>

</head>
<body>

  <img hidden id="loader" class="middle" align="middle" src="{{URL::asset('/images/loader.gif')}}" alt="loader">

  <div id="show">
  <header class="header">

		<div class="top-bar bg-dark">
			{{-- <div class="container"> --}}
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
              <div class="container">
                  <div class="top-left">
                      <i class="fas fa-phone-volume"></i>&nbsp;<small>| 0336-XXXXXXX (xxxxxxx) | </small>info@traveloplan.pk
                  </div>
                <div class="center">
                  <ul class="navbar-nav">
                     <!-- Authentication Links -->
                     @if (Auth::guest())
                     <div class="top-login">
                        <li class="nav-item"><a class="anchor" href="{{ route('login') }}">Login</a> /
                        <a class="anchor" href="{{ route('register') }}">Register</a>
                      </div>  
                    @else
                      <li class="nav-item dropdown top-right">
                        <a style="color: #fff" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                      </li>
                    @endif
                  </ul>
                </div>
              </div>
              </nav> 

			</div>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">TraveloPlan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-md-auto">
             <!-- Authentication Links -->
             @if (Auth::guest())
              <li class="nav-item"><a class="nav-link"  href="{{ route('login') }}">Login</a></li>
              <li class="nav-item"><a class="nav-link"  href="{{ route('register') }}">Register</a></li>
            @else
              <li class="nav-item active">
                <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
              </li>
            @endif
          </ul>
        </div>
      </div>
      </nav> 

  </header>
        

        @yield('content')

</div>
        
      <script>
        setTimeout(() => {
          document.getElementById('loader').hidden = true;
          document.getElementById('show').hidden = false;
        }, 1000);
      </script>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
</body>
</html>