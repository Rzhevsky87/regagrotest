<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Использовались :
                </div>

                <hr class="my-4">

                <div class="links">
                    <a href="https://laravel.com/docs">laravel</a>
                    <a href="https://dev.mysql.com/">mysql</a>
                    <a href="https://laravel.com/docs/7.x/telescope">telescope</a>
                    <a href="http://docs.guzzlephp.org/en/stable/index.html">guzzlephp</a>
                    <a href="https://tech.yandex.ru/maps/geocoder/">yandex geocoder</a>
                    <a href="https://vuejs.org/">vuejs</a>
                    <a href="https://sass-lang.com/">Sass</a>
                    <a href="https://www.npmjs.com/">npmjs</a>
                </div>

                <hr class="my-4">

                <p class="lead m-b-md">
                    Саму таблицу можно увидить после регистрации
                </p>
            </div>
        </div>
    </body>
</html>
