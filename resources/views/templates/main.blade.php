<!DOCTYPE html>
<html {!! get_language_attributes() ?: 'lang="' . app()->getLocale() . '"' !!}>
    <head>
        <meta charset="{{ get_bloginfo('charset') ?: 'utf-8' }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @wphead

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link href="//fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    </head>

    <body class="{{ $post->classes ?? '' }}">
        <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
            <a class="navbar-brand" href="{{ route('home') }}">{{ get_bloginfo('name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mr-auto">
                    {{-- Unfortunately Bootstrap only has documentation for 1 level subnavs --}}
                    @foreach($menu as $item)
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

        <script src="{{ mix('/js/manifest.js') }}"></script>
        <script src="{{ mix('/js/vendor.js') }}"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
        @wpfooter
    </body>
</html>
