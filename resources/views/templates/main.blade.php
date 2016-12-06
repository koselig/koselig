<!DOCTYPE html>
<html {{ get_language_attributes() }}>
    <head>
        <meta charset="{{ get_bloginfo('charset') }}">
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
        <nav class="navbar navbar-fixed-top navbar-light bg-faded">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation"></button>

            <div class="collapse navbar-toggleable-md" id="navbarResponsive">
                <a class="navbar-brand" href="{{ route('home') }}">{{ get_bloginfo('name') }}</a>

                <ul class="nav navbar-nav">
                    {{-- Unfortunetly Bootstrap only has documentation for 1 level subnavs --}}
                    @foreach(($menu = menu('primary_navigation', 0)) as $item)
                        @if($menu->callHasChildren())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ $item->url }}"
                                   id="navbar-dropdown-{{ $item->ID }}" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    {{ $item->title }}
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbar-dropdown-{{ $item->ID }}">
                                    @foreach($menu->callGetChildren() as $child)
                                        <a class="dropdown-item" href="{{ $child->url }}">{{ $child->title }}</a>
                                    @endforeach
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $item->url }}">{{ $item->title }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </nav>

        <div id="app" role="document">
            @yield('body')
        </div>

        <script src="{{ elixir('js/app.js') }}"></script>
        @wpfooter
    </body>
</html>
