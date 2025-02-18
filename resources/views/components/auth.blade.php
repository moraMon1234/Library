<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $type === 'register' ? 'Registration' : 'Login' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="text-white d-flex align-items-center justify-content-center w-100 vh-100 position-relative" 
    style="background: url('./images/l60.jpg') no-repeat center center/cover;">

    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-black text-white shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <h2 class="text-center fw-bold mb-4">
                            {{ $type === 'register' ? 'Register' : 'Login' }}
                        </h2>

                        <form action="{{ $type === 'register' ? route('auth.handleRegister') : route('auth.handlelogin') }}" method="POST">
                            @csrf

                            @if($type === 'register')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control bg-dark text-white border-light" id="name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            @endif

                            @error('alert')
                                <p class="text-center text-danger">{{ $message }}</p>
                            @enderror

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control bg-dark text-white border-light" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control bg-dark text-white border-light" id="password" name="password">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            @if($type === 'register')
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control bg-dark text-white border-light" id="password_confirmation" name="password_confirmation">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="is_admin" class="form-label">Register as:</label>
                                    <select name="is_admin" class="form-select bg-dark text-white border-light">
                                        <option value="0">guest</option>
                                        <option value="1">Admin</option>
                                    </select>
                                </div>
                            @endif

                            @if($type === 'login')
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                        <label class="form-check-label" for="remember">Remember Me</label>
                                    </div>
                                    <a href="#" class="text-primary small text-decoration-none">Forgot Password?</a>
                                </div>
                            @endif

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">{{ $type === 'register' ? 'Register' : 'Login' }}</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            @if($type === 'register')
                                <small>Already have an account? <a href="{{ route('auth.login') }}" class="text-primary fw-bold">Login</a></small>
                            @else
                                <small>Don't have an account? <a href="{{ route('auth.register') }}" class="text-primary fw-bold">Register</a></small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
