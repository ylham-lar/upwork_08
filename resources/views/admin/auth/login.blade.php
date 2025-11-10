<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
        }

        .login-card {
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            background: #fff;
            transition: all 0.3s ease-in-out;
        }

        .login-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.12);
        }

        .brand-text {
            font-weight: 700;
            color: #212529;
        }

        .form-control {
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
        }

        .btn-dark {
            border-radius: 0.75rem;
            padding: 0.75rem;
            font-weight: 600;
        }
    </style>
</head>

<body>
    @include('admin.app.alert')

    <div class="container-xxl d-flex align-items-center justify-content-center vh-100">
        <div class="col-10 col-md-8 col-lg-5 col-xl-4">
            <div class="card login-card p-4 p-md-5">
                <div class="text-center mb-4">
                    <div class="h2 brand-text">Login</div>
                    <div class="text-secondary">Sign in to continue</div>
                </div>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label fw-semibold">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" value="{{ old('username') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-dark">Login</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>