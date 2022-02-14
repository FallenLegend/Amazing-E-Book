<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <title>Amazing E-Book</title>
</head>
<body>
    <!-- Header -->
    <div class="bg-warning d-flex justify-content-between p-3">
        <h1 class="mx-auto"><b>Amazing E-Book</b></h1>
    </div>
    <!-- Menu Bar -->
    <div class="bg-primary">
        @guest
            <div class="d-flex justify-content-between p-3">
                <div></div>
                <div>
                    <a href="{{route('signUp', $lang)}}"><button type="submit" class="btn btn-outline-light">{{__('template.signUp')}}</button></a>
                    <a href="{{route('login', $lang)}}"><button type="submit" class="btn btn-outline-light">{{__('template.login')}}</button></a>
                </div>
            </div>
        @endguest
        @if(isset(Auth::user()->id))
            <div class="d-flex justify-content-between p-3">
                <div>
                    <a href="{{route('home', $lang)}}"><button type="submit" class="btn btn-outline-light"><b>{{__('template.home')}}</b></button></a> 
                    <a class="mx-2" href="{{route('Cart', $lang) }}" style="text-decoration: none; color:white;">{{__('template.cart')}}</a>
                    <a class="mx-2"href="{{route('Profile', $lang)}}" style="text-decoration: none; color: white;">{{__('template.profile')}}</a>
                    @if(Auth::user()->role_id == 1)
                        <a class="mx-2"href="{{route('Account Maintenance', $lang) }}" style="text-decoration: none; color: white;">{{__('template.accountMaintenance')}}</a>
                    @endif
                </div>
                <a class="btn btn-outline-light" href="{{ route('logOut', $lang) }}">{{__('template.logout')}}</a>
            </div>
        @endif
        
    </div>
    <!-- Content -->
    <div class="container-fluid bg-info p-5">
        <div class="container">
            @yield('content')
        </div>
    </div>
    <!-- Footer -->
    <div class="container-fluid bg-primary text-white text-center">
        <small>©Amazing E-Book 2022</small>
    </div> 
</body>
</html>