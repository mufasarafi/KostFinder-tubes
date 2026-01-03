<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Kost</title>

    <style>
        :root {
            --telkom-red: #C4161C;
            --telkom-dark: #9E1116;
            --border: #e0e0e0;
            --bg-soft: #f9f9f9;
        }

        body {
            margin: 0;
            padding: 0;
            background: var(--bg-soft);
            font-family: 'Segoe UI', sans-serif;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }

        .title {
            color: var(--telkom-red);
            font-size: 28px;
            margin-bottom: 10px;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            color: #fff;
        }

        .badge.kosong {
            background: #28a745;
        }

        .badge.full {
            background: #dc3545;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin: 20px 0;
        }

        .info-item {
            background: #fafafa;
            padding: 12px 15px;
            border-radius: 10px;
            border: 1px solid var(--border);
        }

        .info-item strong {
            color: var(--telkom-red);
        }

        h4 {
            margin-top: 25px;
            color: var(--telkom-red);
        }

        .content-box {
            background: #fafafa;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid var(--border);
            line-height: 1.6;
        }

        .back-btn {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 18px;
            background: var(--telkom-red);
            color: #fff;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: var(--telkom-dark);
            transform: translateY(-1px);
        }

        @media (max-width: 600px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <h2 class="title">{{ $kost->nama_kost }}</h2>

    <span class="badge {{ $kost->status }}">
        {{ ucfirst($kost->status) }}
    </span>

    <div class="info-grid">
        <div class="info-item">
            <strong>Harga</strong><br>
            Rp {{ number_format($kost->harga) }} per Bulan
        </div>

        <div class="info-item">
            <strong>Jarak</strong><br>
            {{ $kost->jarak }} KM
        </div>

        <div class="info-item">
            <strong>No Pemilik</strong><br>
            {{ $kost->no_pemilik }}
        </div>
    </div>

    <h4>Kondisi Kost</h4>
    <div class="content-box">
        {{ $kost->kondisi }}
    </div>

    <h4>Fasilitas</h4>
    <div class="content-box">
        {{ $kost->fasilitas }}
    </div>

   <h4>Alamat Kost</h4>
<div class="content-box">
    {{ $kost->alamat }}
</div>

<h4>Lokasi Kost</h4>
<div class="content-box" style="padding:0">
    <iframe
        width="100%"
        height="300"
        frameborder="0"
        style="border:0; border-radius:10px"
        loading="lazy"
        src="https://www.google.com/maps?q={{ urlencode($kost->alamat) }}&output=embed">
    </iframe>
</div>

    <a href="/user/dashboard" class="back-btn">⬅ Kembali ke Dashboard</a>

</div>

</body>
</html>
