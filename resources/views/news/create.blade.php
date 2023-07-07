@extends ('layouts.master')

@section('title', 'Create News')

@section('content')
    <form method="POST" action="/news">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" />
        </div>


        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" rows="20" class="form-control"></textarea>
        </div>

        <div>
            @foreach ($teams as $team)
                <div class="form-group form-check">
                    <input type="checkbox" value="{{ $team->id }}" class="form-check-input" name="team_ids[]"
                        id="team_{{ $team->id }}" />
                    <label for="team_{{ $team->id }}" class="form-check-label">{{ $team->name }}</label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
