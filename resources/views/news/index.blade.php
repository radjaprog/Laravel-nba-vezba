@extends('layouts.master')

@section('title', 'News')

@section('content')
    @foreach ($news as $singleNews)
        <div>
            <a href="{{ route('singleNews', ['id' => $singleNews->id]) }}">
                {{ $singleNews->title }}
            </a>
        </div>
    @endforeach

    {{ $news->links() }}
@endsection
