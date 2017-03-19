<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link rel="stylesheet" href="/css/main.css">
        <!-- Bootstrap -->
        <link href="{{ asset('../../bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
          <header>
            @include('partials.header')
        </header>

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
                
            </div>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
