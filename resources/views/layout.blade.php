<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="{!! asset('validator/dist/jquery.validate.js') !!}"></script>

        <style>
            body {
                background-image: url("{!! asset('img/bg.png') !!}");
            }

            nav {
                background-color: white;
            }

            .table {
                border-radius: 10px;
                background-color: white;
            }

            #content {
                margin-top: 20px;
            }
            .content {
                padding-top: 30px;
                padding-bottom: 30px;

                margin-left: 100px;
                margin-right: 100px;

                border-radius: 10px;
                background-color: rgba(255, 255, 255, 0.8);
            }
        </style>
    </head>
    <body>
        <nav>
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item"><a class="nav-link" href={!! url('/') !!}>Home</a></li>
                <li class="nav-item"><a class="nav-link" href={!! url('/booking') !!}>Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href={!! url('/driver') !!}>Driver Listing</a></li>
            </ul>
        </nav>

        <div id="content" class="container-fluid">
            @include('flash::message')
            @yield('content')
        </div>
    </body>
</html>
