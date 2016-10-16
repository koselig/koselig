@extends('templates.main')

@section('body')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $post->post_title }}</div>
                <div class="panel-body">
                    {!! $post->post_content !!}
                </div>
                <div class="panel-footer">- <a href="{{ $post->author->link() }}">{{ $post->author->display_name }}</a></div>
            </div>
        </div>
    </div>
@stop
