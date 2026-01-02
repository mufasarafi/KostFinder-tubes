<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KostFinder - Cari Kost</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        header {
            background: #2196f3;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
        }
        .filter, .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .filter input {
            padding: 8px;
            margin-right: 10px;
            width: 150px;
        }
        .filter button {
            padding: 8px 15px;
            background: #2196f3;
            border: none;
            color: white;
            cursor: pointer;
        }
        .kost {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .kost:last-child {
            border-bottom: none;
        }
        .logout {
            text-align: right;
            margin-bottom: 10px;
        }
        .logout button {
            background: #f44336;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 4px;
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
        <form method="GET" action="/user/kost">
            <input type="number" name="harga_min" placeholder="Harga Min">
            <input type="number" name="harga_max" placeholder="Harga Max">
            <button type="submit">Cari Kost</button>
        </form>
        <small>* Jarak maksimal 1 KM dari kampus</small>
    </div>

    {{-- LIST KOST --}}
    @foreach($kosts as $kost)
    <div class="card kost">
        <h3>{{ $kost->nama_kost }}</h3>
        <p>Harga: Rp {{ number_format($kost->harga) }}</p>
        <p>Jarak: {{ $kost->jarak }} KM</p>
        <p>Status: {{ $kost->status }}</p>
       <a href="/kost/{{ $kost->id }}">Lihat Detail</a>
    </div>
    @endforeach

</div>

</body>
</html>
