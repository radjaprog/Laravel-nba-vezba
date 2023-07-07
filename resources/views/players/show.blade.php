@extends('layouts.master')

@section('title', 'Single Player')

@section('content')
    <div>
        First Name: {{ $player->first_name }}
    </div>
    <div>
        Last Name: {{ $player->last_name }}
    </div>
    <div>
        Email: {{ $player->email }}
    </div>
    <br>
    Team -
    <a href="{{ route('singleTeam', ['id' => $player->team->id]) }}">
        {{ $player->team->name }}
    </a>
@endsection
