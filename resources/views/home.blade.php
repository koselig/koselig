@extends('templates.main')

@section('body')
    <div class="container">
        @include('partials.search')

        @if(Query::hasPosts())
            @loop
                <article>
                    <header>
                        <h2><a href="{{ $post->link }}">{{ $post->title }}</a></h2>
                        <time datetime="{{ $post->post_date->format('c') }}">{{ $post->post_date->format(Wordpress::option('date_format')) }}</time>

                        <p>
                            By <a href="{{ $post->author->link() }}" rel="author" class="fn">{{ $post->author->display_name }}</a>
                        </p>
                    </header>

                    <p>{{ $post->excerpt }}</p>
                </article>
            @endloop
        @else
            <div class="alert alert-warning">
                Sorry, no results were found!
            </div>
        @endif
    </div>
@stop
