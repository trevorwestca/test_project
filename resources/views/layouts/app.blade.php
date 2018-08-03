<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Test Project - Trevor West</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div class="container-fluid main-content">
        <div class="row header">
            <div class="col-xs-6 col-sm-10">
                <h1 class="logo">
                    <a href="/" title="Home">
                        <span class="title">Lorem</span>
                        <img src="{{ URL::to('/') }}/img/logo.png" alt="Logo">
                    </a>
                </h1>
            </div>
            <div class="col-xs-6 col-sm-2 text-right account">

                @guest
                    @if(Route::current()->getName() != 'login')
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif
                @else
                    <a href="{{ route('logout') }}">{{ __('Logout') }}</a>
                @endguest
            </div>
        </div>
            @yield('content')
    </div>
</body>
</html>
