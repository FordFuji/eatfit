<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>EATFIT</title>

    <!-- Favicon icon -->

    <link rel="icon" href="{{asset('/files/backend/assets/images/fav-icon.png')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css"
        href="{{asset('/files/backend/bower_components/bootstrap/css/bootstrap.min.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css"
        href="{{asset('/files/backend/assets/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('/files/backend/assets/icon/icofont/css/icofont.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css"
        href="{{asset('/files/backend/assets/icon/font-awesome/css/font-awesome.min.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('/files/backend/assets/css/style.css')}}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
{{-- custom css --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body style="font-family: 'Kanit', sans-serif;">
    <div id="app">
        
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm "> --}}

            {{-- <div class="container"> --}}
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

                {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
                    <!-- Left Side Of Navbar -->
                    {{-- <ul class="navbar-nav mr-auto">

                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    {{-- <ul class="navbar-nav ml-auto">
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul> --}}
                {{-- </div>
            </div> --}}

        {{-- </nav> --}}

        {{-- <main class="py-4"> --}}
            {{-- เพิ่มเซคชั่น --}}
            <section class="login p-fixed d-flex text-center bg-primary common-img-bg bg-15"> 
                @yield('content')
            </section>
        {{-- </main> --}}
    {{-- </div> --}}
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script  src="{{asset('/files/backend/bower_components/jquery/js/jquery.min.js')}}"></script>
    <script  src="{{asset('/files/backend/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
    <script  src="{{asset('/files/backend/bower_components/popper.js/js/popper.min.js')}}"></script>
    <script  src="{{asset('/files/backend/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script  src="{{asset('/files/backend/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
    <!-- modernizr js -->
    <script  src="{{asset('/files/backend/bower_components/modernizr/js/modernizr.js')}}"></script>
    <script  src="{{asset('/files/backend/bower_components/modernizr/js/css-scrollbars.js')}}"></script>
    <!-- i18next.min.js -->
    <script  src="{{asset('/files/backend/bower_components/i18next/js/i18next.min.js')}}"></script>
    <script  src="{{asset('/files/backend/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}"></script>
    <script  src="{{asset('/files/backend/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}"></script>
    <script  src="{{asset('/files/backend/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}"></script>
    <script  src="{{asset('/files/backend/assets/js/common-pages.js')}}"></script>

    {{-- google font --}}
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
</body>

</html>
