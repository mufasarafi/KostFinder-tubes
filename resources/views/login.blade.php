<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KostFinder | Login</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background:
            linear-gradient(rgba(185,28,28,0.75), rgba(239,68,68,0.75)),
            url('https://images.unsplash.com/photo-1568605114967-8130f3a36994');

        background-size: cover;
        background-position: center;
        background-attachment: fixed;

        margin: 0;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        }

        .login-card {
            background: #ffffff;
            padding: 32px;
            width: 100%;
            max-width: 400px;
            border-radius: 14px;
            box-shadow: 0 18px 40px rgba(0,0,0,0.18);
        }

        .app-title {
            text-align: center;
            font-size: 28px;
            font-weight: 800;
            color: #b91c1c;
            margin-bottom: 5px;
            letter-spacing: 0.5px;
        }

        .login-title {
            text-align: center;
            margin-bottom: 25px;
            color: #374151;
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 6px;
            color: #374151;
        }

        .form-group input {
            width: 100%;
            padding: 11px 12px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
        }

        .form-group input:focus {
            border-color: #dc2626;
            box-shadow: 0 0 0 2px rgba(220,38,38,0.2);
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 12px;
            cursor: pointer;
            color: #dc2626;
            user-select: none;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: #b91c1c;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #991b1b;
            transform: translateY(-1px);
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
            color: #374151;
        }

        .register-link a {
            color: #b91c1c;
            font-weight: 600;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
            text-align: center;
        }

        .error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 4px;
        }

        .footer-text {
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="login-card">

    <div class="app-title">KostFinder</div>
    <div class="login-title">Login</div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        @if(session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif

        <div class="form-group">
            <label>Email</label>
            <input type="email"
                   name="email"
                   value="{{ old('email') }}"
                   placeholder="Masukkan email"
                   required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <div class="password-wrapper">
                <input type="password"
                       name="password"
                       id="password"
                       placeholder="Masukkan password"
                       required>
                <span class="toggle-password" onclick="togglePassword()">Show</span>
            </div>
        </div>

        <button type="submit" class="btn-login">
            Login
        </button>

        <div class="register-link">
            Belum punya akun?
            <a href="/register">Daftar</a>

        </div>
    </form>

    <div class="footer-text">
        © {{ date('Y') }} KostFinder - Telkom University
    </div>
</div>

<script>
    function togglePassword() {
        const password = document.getElementById("password");
        const toggle = document.querySelector(".toggle-password");

        if (password.type === "password") {
            password.type = "text";
            toggle.innerText = "Hide";
        } else {
            password.type = "password";
            toggle.innerText = "Show";
        }
    }
</script>

</body>
</html>
