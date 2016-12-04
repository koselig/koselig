@extends('templates.main')

@section('body')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            @if($post->thumbnail)
                <div class="panel panel-default">
                    <div class="panel-heading">Thumbnail</div>
                    <div class="panel-body">
                        <div class="text-center">
                            <img src="{{ $post->thumbnail }}" width="150">
                        </div>
                    </div>
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">{{ $post->title }}</div>
                <div class="panel-body">
                    {!! wp_kses_post($post->content) !!}
                </div>
                <div class="panel-footer">
                    - <a href="{{ $post->author->link() }}">{{ $post->author->display_name }}</a>
                    ({{ $post->categories->keyBy('name')->keys()->implode(', ') }})
                </div>
            </div>

            @unless($post->comments->isEmpty())
                <div class="panel panel-default">
                    <div class="panel-heading">Comments</div>
                    <div class="panel-body">
                        @foreach($comments as $child)
                            <blockquote style="margin-left: {{ $comments->getDepth() * 20 }}px" class="clearfix">
                                <div style="float: left; margin-right: 20px;">
                                    <img src="{{ $child->avatar(['size' => 50]) }}" class="img-circle">
                                </div>
                                {!! wp_kses_data($child->content) !!}
                                <footer>{{ $child->comment_author }}</footer>
                            </blockquote>
                        @endforeach
                    </div>
                </div>
            @endunless
        </div>
    </div>
@stop
