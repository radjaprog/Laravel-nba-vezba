<div>
    <h4>A verification email has been sent to your address.</h4>
    <p>Please click the link in the email to verify your account and gain access to the app.</p>
    <form method="POST" action="{{ route('resend-verification', $user) }}">
        @csrf
        <button type="submit">Resend email</button>
    </form>
</div>
