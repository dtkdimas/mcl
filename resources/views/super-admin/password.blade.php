@extends('super-admin.app')
@section('title', 'Super Admin - Change Password')
@section('content')
    <div class="page-inner">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between" role="alert">
                {{ session('success') }}
                <a href="" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between" role="alert">
                {{ session('error') }}
                <a href="" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
                <a href="" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
        @endif

        <div class="card shadow mb-4">
            <h4 class="card-header fw-bold">Change Password</h4>
            <div class="card-body">
                <form action="{{ route('super-admin.settings.password') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="mb-4">
                            <label for="current_password" class="">Current Password</label>
                            <span class="text-danger">*</span>
                            <div class="items-center">
                                <input type="password" name="current_password" id="current_password" class="form-control"
                                    required>
                                <div class="items-center">
                                    <input type="checkbox" id="showPassword" hidden>
                                    <label for="showPassword" class="text-sm cursor-pointer">Show
                                        Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="new_password" class="">New Password</label>
                            <span class="text-danger">*</span>
                            <div class="items-center">
                                <input type="password" name="new_password" id="new_password" class="form-control" required>
                                <div class="items-center">
                                    <input type="checkbox" id="showNewPassword" hidden>
                                    <label for="showNewPassword" class="text-sm cursor-pointer">Show
                                        Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="new_password_confirmation" class="">Confirm New Password</label>
                            <span class="text-danger">*</span>
                            <div class="items-center">
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                    class="form-control" required>
                                <div class="items-center">
                                    <input type="checkbox" id="showConfirmNewPassword" hidden>
                                    <label for="showConfirmNewPassword" class="text-sm cursor-pointer">Show
                                        Password</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        const currentPasswordInput = document.getElementById('current_password');
        const showPasswordCheckbox = document.getElementById('showPassword');

        const newPasswordInput = document.getElementById('new_password');
        const showNewPasswordCheckbox = document.getElementById('showNewPassword');

        const confirmNewPasswordInput = document.getElementById('new_password_confirmation');
        const showConfirmNewPasswordCheckbox = document.getElementById('showConfirmNewPassword');

        showPasswordCheckbox.addEventListener('change', function() {
            currentPasswordInput.type = this.checked ? 'text' : 'password';
        });

        showNewPasswordCheckbox.addEventListener('change', function() {
            newPasswordInput.type = this.checked ? 'text' : 'password';
        });

        showConfirmNewPasswordCheckbox.addEventListener('change', function() {
            confirmNewPasswordInput.type = this.checked ? 'text' : 'password';
        })
    </script>
@endsection
