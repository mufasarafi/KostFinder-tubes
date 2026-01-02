<form method="POST" action="/admin/kost/simpan">
    @csrf

    <input type="text" name="nama_kost" placeholder="Nama Kost" required>

    <input type="number" name="harga" placeholder="Harga" required>

    <input type="number" step="0.1" name="jarak" placeholder="Jarak (KM)" required>

    <input type="text" name="no_pemilik" placeholder="No Pemilik">

    <textarea name="kondisi" placeholder="Kondisi"></textarea>

    <textarea name="fasilitas" placeholder="Fasilitas"></textarea>

    <select name="status" required>
        <option value="">-- Pilih Status --</option>
        <option value="kosong">Kosong</option>
        <option value="full">Full</option>
    </select>

    <textarea name="lokasi_map" placeholder="Embed Google Maps"></textarea>

    <button type="submit">Simpan</button>
</form>
