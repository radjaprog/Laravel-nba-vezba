@extends('layouts.master')

@section('title', 'NBA')

@section('content')
    <ul class="list-group">
        @foreach ($teams as $team)
            <li class="list-group-item">
                <a href="{{ route('singleTeam', ['id' => $team->id]) }}">
                    {{ $team->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
