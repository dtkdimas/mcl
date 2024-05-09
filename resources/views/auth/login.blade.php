<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    {{-- bootstrap css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />

    {{-- import css --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login-wrapper">
        <div class="login-header">
            <h1 class="card-title">Login</h1>
            <p class="card-subtitle">You have to login first</p>
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
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between"
                    role="alert">
                    {{ Session::get('error') }}
                    <a href="" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="email" name="email" id="email" placeholder="Email address"
                        @if (isset($_COOKIE['email'])) value="{{ $_COOKIE['email'] }}" @endif required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" id="password" placeholder="Password"
                        @if (isset($_COOKIE['password'])) value="{{ $_COOKIE['password'] }}" @endif required>
                </div>
                <div class="remember-forgot d-flex justify-content-between align-items-center">
                    <label class="d-flex align-items-center cursor-pointer"><input type="checkbox" name="remember"
                            class="cursor-pointer" @if (isset($_COOKIE['email'])) checked @endif>
                        Remember me for 30 days</label>
                    <a href="{{ route('password.request') }}" class="forgot-link">
                        Forgot Password
                    </a>
                </div>
                <div class="mb-4">
                    <button class="">Sign in</button>
                </div>
            </form>
            <div class="register text-center">
                <p>Don't have an account? <a href="{{ route('register') }}" class="register-link">Register</a></p>
            </div>
        </div>
    </div>

    {{-- bootstrap js  --}}
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
