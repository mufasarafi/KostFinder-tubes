<form method="POST" action="/admin/kost/update/{{ $kost->id }}">
@csrf

<input name="nama_kost" value="{{ $kost->nama_kost }}">
<input name="harga" type="number" value="{{ $kost->harga }}">
<input name="jarak" step="0.1" value="{{ $kost->jarak }}">
<input name="no_pemilik" value="{{ $kost->no_pemilik }}">

<textarea name="kondisi">{{ $kost->kondisi }}</textarea>
<textarea name="fasilitas">{{ $kost->fasilitas }}</textarea>

<select name="status">
    <option value="kosong" {{ $kost->status == 'kosong' ? 'selected' : '' }}>Kosong</option>
    <option value="full" {{ $kost->status == 'full' ? 'selected' : '' }}>Full</option>
</select>

<textarea name="lokasi_map">{{ $kost->lokasi_map }}</textarea>

<button>Update</button>
</form>
