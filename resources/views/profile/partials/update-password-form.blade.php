<section>
    <header>
        <h2>Update Password</h2>

        <p>Ensure your account is using a long, random password to stay secure.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password">Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password"
                   autocomplete="current-password">
            @error('current_password')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="update_password_password">New Password</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password">
            @error('password')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="update_password_password_confirmation">Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                   autocomplete="new-password">
            @error('password_confirmation')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">Save</button>

            @if (session('status') === 'password-updated')
                <p>Saved.</p>
            @endif
        </div>
    </form>
</section>
