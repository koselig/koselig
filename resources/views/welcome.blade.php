@extends('templates.main')

@section('body')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="header">
                <rabbit></rabbit>
                <h1>It's working - congratulations!</h1>
            </div>

            <div class="clearfix"></div>

            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Koselig</div>
                <div class="panel-body">
                    You should probably go and have a look at the
                    <a href="https://koselig.co/getting-started.html" target="_blank">documentation</a> if you
                    haven't already!
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Posts</div>
                <div class="panel-body">
                    <ul>
                        @loop
                            <li><a href="{{ Loop::link() }}">{{ Loop::title() }}</a> - {{ Loop::get()->author->display_name }}</li>
                        @endloop
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
