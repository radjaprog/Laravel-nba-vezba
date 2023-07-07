@extends('layouts.master')

@section('title', 'Single News')

@section('content')
    <a href="/news">Back to all news</a>
    <div>
        Title: {{ $news->title }}
    </div>
    <div>
        Content: {{ $news->content }}
    </div>
    <br>
    Author: {{ $news->user->name }}

    @foreach ($news->teams as $team)
        <div>
            <a href="{{ route('singleTeam', ['id' => $team->id]) }}">
                {{ $team->name }}
            </a>
        </div>
    @endforeach
@endsection
