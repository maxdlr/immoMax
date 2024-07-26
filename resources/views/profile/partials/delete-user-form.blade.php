<section class="container mt-5">
    <header class="mb-4">
        <h2 class="fw-bold">Delete Account</h2>
        <p>Once your account is deleted, all of its resources and data will be permanently removed. Before deleting your
            account, please download any data or information that you wish to retain.</p>
    </header>

    @include('shared/_button', ['label' => 'delete account', 'colorClass' => 'danger', 'iconClass' => 'person-x', 'onClick' => 'toggleDeletionConfirmation()'])

    <div id="confirm-user-deletion" class="mt-4" style="display: none;">
        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <h2 class="fw-bold">Are you sure you want to delete your account?</h2>
            <p>Once your account is deleted, all of its resources and data will be permanently removed. Please enter
                your password to confirm you would like to permanently delete your account.</p>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                @error('password')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">

                @include('shared/_button', ['label' => 'cancel', 'colorClass' => 'secondary', 'iconClass' => 'x-circle-fill', 'onClick' => 'toggleDeletionConfirmation()'])
                @include('shared/_button', ['label' => 'delete account', 'colorClass' => 'danger', 'iconClass' => 'person-x'])

            </div>
        </form>
    </div>
</section>

<script>
    function toggleDeletionConfirmation() {
        const confirmationDiv = document.getElementById('confirm-user-deletion');
        confirmationDiv.style.display = confirmationDiv.style.display === 'none' ? 'block' : 'none';
    }
</script>
