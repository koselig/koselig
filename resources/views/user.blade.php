@extends('templates.main')

@section('body')
    <div class="container">
        <h1>{{ $user->display_name }}'s profile</h1>
        <p>
            This user registered {{ $user->user_registered->diffForHumans() }} and has {{ $user->posts->count() }} contributions.
        </p>
    </div>
@stop
