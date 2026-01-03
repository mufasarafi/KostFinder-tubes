<h2>Cari Kost</h2>

<form method="GET">
    <input name="harga_min" placeholder="Harga Minimum">
    <input name="harga_max" placeholder="Harga Maksimum">
    <button>Cari</button>
</form>

<hr>

@foreach($kosts as $kost)
<div>
    <b>{{ $kost->nama_kost }}</b><br>
    Harga: Rp {{ number_format($kost->harga) }} per Bulan <br>
    Jarak: {{ $kost->jarak }} KM<br>
    <a href="/user/kost/{{ $kost->id }}">Detail</a>
</div>
@endforeach
