<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem Poltekbang</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0d6efd, #6c757d);
            min-height: 100vh;
        }
        .login-card {
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-4">
        <div class="card shadow login-card">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <img src="{{ asset('backend/assets/images/logo-poltekbang.jpg') }}"
                        alt="Logo Poltekbang"
                        class="mb-3"
                        style="max-width: 120px;">
                        
                    <h4 class="fw-bold">POLTEKBANG JAYAPURA</h4>
                </div>


                {{-- Alert Error --}}
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login-proses') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" 
                               name="email" 
                               class="form-control"
                               placeholder="Masukkan email"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" 
                               name="password" 
                               class="form-control"
                               placeholder="Masukkan password"
                               required>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <small class="text-muted">
                        © {{ date('Y') }} poltekbang jayapura
                    </small>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>
