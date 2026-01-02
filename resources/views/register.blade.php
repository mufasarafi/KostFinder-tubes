<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi User</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 20px;
        }
        .register-box {
            background: white;
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background: #4caf50;
            border: none;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background: #388e3c;
        }
        .login-link {
            text-align: center;
            margin-top: 15px;
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
