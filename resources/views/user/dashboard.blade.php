<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KostFinder - Cari Kost</title>

    <style>
        :root {
            --telkom-red: #C4161C;
            --telkom-dark: #9E1116;
            --border: #e0e0e0;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;

            /* BACKGROUND GAMBAR RUMAH KOS */
            background: 
                linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)),
                url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        header {
            background: linear-gradient(135deg, var(--telkom-red), var(--telkom-dark));
            color: #fff;
            padding: 25px 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 32px;
        }

        header p {
            margin-top: 8px;
            opacity: 0.9;
        }

        .container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px 40px;
        }

        .logout {
            text-align: right;
            margin-bottom: 15px;
        }

        .logout button {
            background: #444;
            color: #fff;
            border: none;
            padding: 10px 16px;
            border-radius: 10px;
            cursor: pointer;
        }

        .logout button:hover {
            background: #222;
        }

        .filter {
            background: rgba(255,255,255,0.95);
            padding: 20px;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
            margin-bottom: 25px;
        }

        .filter form {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filter input {
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid var(--border);
            width: 160px;
        }

        .filter button {
            padding: 10px 18px;
            background: var(--telkom-red);
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
        }

        .filter button:hover {
            background: var(--telkom-dark);
        }

        .filter small {
            display: block;
            margin-top: 8px;
            color: #555;
        }

        .card {
            background: rgba(255,255,255,0.95);
            border-radius: 18px;
            padding: 20px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
            margin-bottom: 20px;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-4px);
        }

        .card h3 {
            margin-top: 0;
            color: var(--telkom-red);
        }

        .card p {
            margin: 6px 0;
        }

        .status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            color: #fff;
        }

        .status.kosong {
            background: #28a745;
        }

        .status.full {
            background: #dc3545;
        }

        .detail-link {
            display: inline-block;
            margin-top: 10px;
            color: var(--telkom-red);
            font-weight: 600;
            text-decoration: none;
        }

        .detail-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .filter form {
                flex-direction: column;
            }
            .filter input {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>KostFinder</h1>
    <p>Selamat datang, {{ auth()->user()->name }}</p>
</header>

<div class="container">

    <div class="logout">
        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    {{-- FILTER --}}
    <div class="filter">
        <form method="GET" action="/user/dashboard">
            <input type="number" name="harga_min" placeholder="Harga Min">
            <input type="number" name="harga_max" placeholder="Harga Max">
            <button type="submit">Cari Kost</button>
        </form>
        <small>* Jarak maksimal 1 KM dari kampus</small>
    </div>

    {{-- LIST KOST --}}
    @foreach($kosts as $kost)
        <div class="card">
            <h3>{{ $kost->nama_kost }}</h3>
            <p>Harga: Rp {{ number_format($kost->harga) }}</p>
            <p>Jarak: {{ $kost->jarak }} KM</p>
            <p>Status:
                <span class="status {{ $kost->status }}">
                    {{ ucfirst($kost->status) }}
                </span>
            </p>
            <a href="/kost/{{ $kost->id }}" class="detail-link">Lihat Detail →</a>
        </div>
    @endforeach

</div>

</body>
</html>
