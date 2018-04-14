@extends('templates.main')

@section('body')
    <div class="container">
        @include('partials.search')

        @if(Query::hasPosts())
            @loop
                <article class="card mb-3">
                    <header class="card-header d-flex">
                        <a href="{{ $post->link }}" class="mr-auto">{{ $post->title }}</a>
                        <time datetime="{{ $post->post_date->format('c') }}">{{ $post->post_date->format(Wordpress::option('date_format')) }}</time>
                    </header>

                    <section class="card-body">
                        <p>{{ $post->excerpt }}</p>

                        <div class="blockquote-footer">
                            <a href="{{ $post->author->link() }}" rel="author" class="fn">{{ $post->author->display_name }}</a>
                        </div>
                    </section>

                    <footer class="card-footer bg-white text-right">
                        <a href="{{ $post->link }}">Continue Reading &raquo;</a>
                    </footer>
                </article>
            @endloop
        @else
            <div class="alert alert-warning">
                Sorry, no results were found!
            </div>
        @endif
    </div>
@stop
