@extends('templates.main')

@section('body')
    <div class="container">
        <article class="card mt-3">
            <header class="card-header d-flex">
                <span class="mr-auto">{{ $post->title }}</span>
                <time datetime="{{ $post->post_date->format('c') }}">{{ $post->post_date->format(Wordpress::option('date_format')) }}</time>
            </header>

            <section class="card-body">
                {!! wp_kses_post($post->content) !!}
            </section>

            <footer class="card-footer">
                By <a href="{{ $post->author->link() }}" rel="author" class="fn">{{ $post->author->display_name }}</a>
            </footer>
        </article>

        @unless($post->comments->isEmpty())
            <section class="mt-3">
                <h2 class="h3">{{ $post->comments->count() }} responses to {{ $post->title }}</h2>

                <div class="card">
                    <ul class="list-group list-group-flush">
                        @foreach($comments as $child)
                            <li class="list-group-item {{ $comments->getDepth() ? 'border-top-0' : ''    }}">
                                <span style="width: {{ $comments->getDepth() * 25 }}px" class="h-100 bg-dark"></span>

                                <blockquote style="margin-left: {{ $comments->getDepth() * 25 }}px" class="blockquote clearfix">
                                    <div style="float: left; margin-right: 20px;">
                                        <img src="{{ $child->avatar(['size' => 50]) }}" class="img-circle">
                                    </div>

                                    <p class="mb-0">{!! wp_kses_data($child->content) !!}</p>
                                    <footer class="blockquote-footer">{{ $child->comment_author }}</footer>
                                </blockquote>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        @endunless
    </div>
@stop
