<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Kost</title>
</head>
<body>

<h2>{{ $kost->nama_kost }}</h2>

<p><strong>Harga:</strong> Rp {{ number_format($kost->harga) }}</p>
<p><strong>Jarak:</strong> {{ $kost->jarak }} KM</p>
<p><strong>Status:</strong> {{ $kost->status }}</p>
<p><strong>No Pemilik:</strong> {{ $kost->no_pemilik }}</p>

<hr>

<h4>Kondisi</h4>
<p>{{ $kost->kondisi }}</p>

<h4>Fasilitas</h4>
<p>{{ $kost->fasilitas }}</p>

<hr>

<a href="/user/dashboard">⬅ Kembali</a>

</body>
</html>
