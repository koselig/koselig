<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @wphead

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link href="//fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script>
            window.Koselig = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!}
        </script>
    </head>

    <body class="{{ $post->classes ?? '' }}">
        <div id="app">
            @yield('body')
        </div>

        <script src="{{ elixir('js/app.js') }}"></script>
        @wpfooter
    </body>
</html>
