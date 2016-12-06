@extends('templates.main')

@section('body')
    <div class="container">
        <article>
            <header>
                <h1>{{ $post->title }}</h1>
                <time datetime="{{ $post->post_date->format('c') }}">{{ $post->post_date->format(Wordpress::option('date_format')) }}</time>
                <p>
                    By <a href="{{ $post->author->link() }}" rel="author" class="fn">{{ $post->author->display_name }}</a>
                </p>
            </header>

            {!! wp_kses_post($post->content) !!}
        </article>

        @unless($post->comments->isEmpty())
            <section>
                <h2>{{ $post->comments->count() }} responses to {{ $post->title }}</h2>

                <div class="panel-body">
                    @foreach($comments as $child)
                        <blockquote style="margin-left: {{ $comments->getDepth() * 25 }}px" class="blockquote clearfix">
                            <div style="float: left; margin-right: 20px;">
                                <img src="{{ $child->avatar(['size' => 50]) }}" class="img-circle">
                            </div>

                            <p class="mb-0">{!! wp_kses_data($child->content) !!}</p>
                            <footer class="blockquote-footer">{{ $child->comment_author }}</footer>
                        </blockquote>
                    @endforeach
                </div>
            </section>
        @endunless
    </div>
@stop
