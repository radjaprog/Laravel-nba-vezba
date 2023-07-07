@extends('layouts.master')

@section('title', 'Single Team')

@section('content')
    <a href="/">Go To All teams</a>
    <div>
        Name: {{ $team->name }}
    </div>
    <div>
        Address: {{ $team->address }}
    </div>
    <div>
        Email: {{ $team->email }}
    </div>
    <div>
        City: {{ $team->city }}
    </div>

    <br>
    Players:
    <br>
    {{--  @foreach ($players as $player)  --}}
    @foreach ($team->players as $player)
        {{-- $team mi dovlaci playere, ti playeri ce nam se nalaziti na samom objektu tima pod nazivom f-je koja predstavlja relaciju. --}}
        {{-- // znaci $team je objekat, a naziv f-je je players , i da bi dovlacio nesto iz niza koristimo foreach petlju. --}}
        {{-- <li>   
                <a href="{{ route('singlePlayer', ['id' => $player->id]) }}">
                    {{ $player->first_name . $player->last_name }}
                </a>
            </li> --}} {{-- ovo pod <li>-jem sam odradio sa Nikolom K. gde smo jos uvek koristili sve kao (Team $team) --}}
        <div>
            <a href="{{ route('singlePlayer', ['id' => $player->id]) }}">
                {{ $player->first_name }}
            </a>
        </div>
    @endforeach
    @foreach ($team->comments as $comment)
        <div>
            {{ $comment->content }}
        </div>
        <div>
            Author: {{ $comment->user->name }}
        </div>
    @endforeach

    <form action='/teams/{{ $team->id }}/comments' method='POST'>
        @csrf
        <label for="content">Add content</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <button type="submit">Submit Comment:</button>
    </form>
@endsection
