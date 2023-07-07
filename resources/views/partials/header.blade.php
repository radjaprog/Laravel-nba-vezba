<header class="mb-5">
    <nav class="d-flex justify-content-between">
        <ul class="d-flex flex-row list-group">
            <li class="list-group-item btn p-3">
                <a href="/">Teams</a>
            </li>
            <li class="list-group-item btn p-3">
                <a href="/news">News</a>
            </li>
            <li class="list-group-item btn p-3">
                <a href="/news/create">Create News</a>
            </li>
        </ul>
        @if (auth()->user())
            <form method='POST' action='/logout' class="ml-auto mt-auto mb-auto">
                @csrf
                <button type=”submit” class="btn btn-primary">Logout</button>
            </form>
        @endif
    </nav>
</header>
