<aside>
    <h5 class="ml-3">Team news</h5>
    <nav>
        <ul class="d-flex flex-column list-group">
            @foreach ($teamsWithNews as $team)
                <li class="list-group-item">
                    <a href="{{ route('newsForTeam', ['teamName' => $team->name]) }}">{{ $team->name }}</a>
                </li>
            @endforeach
        </ul>
    </nav>
</aside>
