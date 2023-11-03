<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MOTOS-EX</title>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}"/>


        
    </head>
    <body>
    <nav class="navbar navbar-dark bg-dark">    
        <div class="container-fluid">
            <a href="{{ url('/') }}" class="navbar-brand"><h1>MOTOS - EX</h1></a>
            
    
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/') }}" class="navbar-brand">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="navbar-brand">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 navbar-brand">Register</a>
                        @endif
                    @endauth
                        <a href="{{ route('myCar') }}">
                            <i class="fa-solid fa-cart-arrow-down" style="color:white"></i>
                        </a>
                </div>
            @endif
               
          
        </div>
    </nav>  
        <div class="mt-5">
            @yield('content')
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        <script type="text/javascript" src="{{asset('js/slick.js')}}"></script>
        <script type="text/javascript" src="{{asset('fontawesome-free-6.1.1-web/js/all.js')}}"></script>
	    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script type="text/javascript" src="{{asset('js/own/car.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/own/viewMyCar.js')}}"></script>
        
        <script type="text/javascript" src="{{asset('js/own/sliderProps.js')}}"></script>

    </body>
    
</html>