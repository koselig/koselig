@extends('templates.main')

@section('body')
    <div class="container">
        {!! wp_kses_post($page->content) !!}
    </div>
@stop
