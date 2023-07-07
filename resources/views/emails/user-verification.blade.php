<p>Hello, {{ $user->name }}</p>

<p>You have registered successfully.
    <a href="{{ route('verify', $user->id) }}">
        Click here to verify email and login.
    </a>
</p>
