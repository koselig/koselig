@extends('templates.main')

@section('body')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $user->display_name }}'s profile</div>
                <div class="panel-body">
                    This user registered {{ $user->user_registered->diffForHumans() }} and has {{ $user->posts->count() }} contributions.
                </div>
            </div>
        </div>
    </div>
@stop
