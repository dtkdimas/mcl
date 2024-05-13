<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    {{-- bootstrap  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />

    {{-- import css --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login-wrapper">
        <div class="login-header">
            <h1 class="card-title">Register</h1>
            <p class="card-subtitle">Register new account</p>
        </div>
        <div class="login-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between"
                    role="alert">
                    {{ session('success') }}
                    <a href="" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between"
                    role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                    <a href="" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" id="name" placeholder="Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" id="email" placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" id="password" placeholder="password" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password_confirmation" id="confirm-password"
                        placeholder="confirm-password" required>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="mb-4">
                    <button class="">Register</button>
                </div>
            </form>
            <div class="register text-center">
                <p>Already have an account? <a href="{{ route('login') }}" class="register-link">Login</a></p>
            </div>
        </div>
    </div>

    {{-- bootstrap js  --}}
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
