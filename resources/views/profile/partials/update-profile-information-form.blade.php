<section class="container mt-5">
    <header class="mb-4">
        <h2 class="fw-bold">Profile Information</h2>
        <p>Update your account's profile information and email address.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}"
                   required autofocus autocomplete="name">
            @error('name')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}"
                   required autocomplete="username">
            @error('email')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3">
                    <p class="text-warning">Your email address is unverified.</p>

                    @include('shared/_button', ['label' => 'Click here to re-send the verification email', 'colorClass' => 'primary', 'iconClass' => 'envelope-arrow-up-fill', 'form' => 'send-verification'])

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success">A new verification link has been sent to your email address.</p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Save Button -->
        <div class="d-flex justify-content-between align-items-center">

            @include('shared/_button', ['label' => 'save', 'colorClass' => 'primary', 'iconClass' => 'floppy-fill'])

            @if (session('status') === 'profile-updated')
                <p class="text-success mb-0">Saved.</p>
            @endif
        </div>
    </form>
</section>
