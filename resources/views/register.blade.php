<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi User</title>

    <style>
        :root {
            --telkom-red: #C4161C;
            --telkom-dark: #9E1116;
            --border: #e0e0e0;
            --bg-soft: #f4f6f8;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
             background:
            linear-gradient(rgba(196,22,28,0.75), rgba(158,17,22,0.75)),
            url('https://images.unsplash.com/photo-1568605114967-8130f3a36994');

        background-size: cover;
        background-position: center;
        background-attachment: fixed;

        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
        }

        .register-box {
            background: #ffffff;
            width: 100%;
            max-width: 420px;
            padding: 30px 28px;
            border-radius: 14px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }

        .register-box h2 {
            text-align: center;
            color: var(--telkom-red);
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-top: 12px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            border-radius: 8px;
            border: 1px solid var(--border);
            font-size: 14px;
            transition: 0.2s;
        }

        input:focus {
            outline: none;
            border-color: var(--telkom-red);
            box-shadow: 0 0 0 2px rgba(196,22,28,0.15);
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: var(--telkom-red);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: var(--telkom-dark);
            transform: translateY(-1px);
        }

        .login-link {
            text-align: center;
            margin-top: 18px;
            font-size: 14px;
        }

        .login-link a {
            color: var(--telkom-red);
            font-weight: 600;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-box">
    <h2>Registrasi User</h2>

    <form method="POST" action="/register">
        @csrf

        <label>Nama Lengkap</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit">Daftar</button>
    </form>

    <div class="login-link">
        <p>Sudah punya akun? <a href="/login">Login</a></p>
    </div>
</div>

</body>
</html>
