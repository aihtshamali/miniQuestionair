<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/main.css">
    <!-- Bootstrap -->
    {{-- <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="{{URL::asset('bootstrap/dist/css/bootstrap.min.css')}}"> --}}

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                </div>
                <div class="" style="">
                  @include('partials\header')
                </div>
                <br>
                <div class="collapse navbar-collapse" id="app-navbar-collapse" >
                  <div class="full-height" id="body">
                    @yield('content')
                  </div>
                </div>

    <!-- Scripts -->
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> --}}
    <script src="{{asset('js/jquery/dist/jquery.min.js')}}">  </script>
    <script src="/js/main.js"></script>
<script>
      </script>
</body>
</html>
