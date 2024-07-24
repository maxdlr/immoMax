<section>
    <header>
        <h2>Profile Information</h2>

        <p>Update your account's profile information and email address.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div>
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus
                   autocomplete="name">
            @error('name')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                   autocomplete="username">
            @error('email')
            <div>{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p>Your email address is unverified.</p>

                    <button form="send-verification">
                        Click here to re-send the verification email.
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p>A new verification link has been sent to your email address.</p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <button type="submit">Save</button>

            @if (session('status') === 'profile-updated')
                <p>Saved.</p>
            @endif
        </div>
    </form>
</section>
