<style>
     body {
        font-family: Arial, sans-serif;

        background:
            linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)),
            url('https://images.unsplash.com/photo-1766230091798-4258a18a8a8b?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fFJ1bWFoJTIwa29zfGVufDB8fDB8fHww');

        background-size: cover;
        background-position: center;
        background-attachment: fixed;

        margin: 0;
    }

    :root {
        --telkom-red: #C4161C;
        --telkom-dark: #9E1116;
        --border: #e0e0e0;
    }

    .form-container {
        max-width: 700px;
        margin: 30px auto;
        background: #ffffff;
        padding: 25px 30px;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    .form-container h2 {
        text-align: center;
        color: var(--telkom-red);
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: 600;
        display: block;
        margin-bottom: 6px;
        color: #333;
    }

    input, textarea, select {
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid var(--border);
        font-size: 14px;
        transition: 0.2s;
    }

    input:focus, textarea:focus, select:focus {
        outline: none;
        border-color: var(--telkom-red);
        box-shadow: 0 0 0 2px rgba(196,22,28,0.15);
    }

    textarea {
        resize: vertical;
        min-height: 90px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .btn-submit {
        width: 100%;
        background: var(--telkom-red);
        color: #fff;
        border: none;
        padding: 12px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.3s;
        margin-top: 15px;
    }

    .btn-submit:hover {
        background: var(--telkom-dark);
        transform: translateY(-1px);
    }
</style>

<div class="form-container">
    <h2>Tambah Data Kost</h2>

    <form method="POST" action="/admin/kost/simpan">
        @csrf

        <div class="form-group">
            <label>Nama Kost</label>
            <input type="text" name="nama_kost" placeholder="Nama Kost" required>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Harga (Rp) per Bulan</label>
                <input type="number" name="harga" placeholder="Harga" required>
            </div>

            <div class="form-group">
                <label>Jarak (KM)</label>
                <input type="number" step="0.1" name="jarak" placeholder="Jarak (KM)" required>
            </div>
        </div>

        <div class="form-group">
            <label>No. Pemilik</label>
            <input type="text" name="no_pemilik" placeholder="No Pemilik">
        </div>

        <div class="form-group">
            <label>Kondisi Kost</label>
            <textarea name="kondisi" placeholder="Kondisi"></textarea>
        </div>

        <div class="form-group">
            <label>Fasilitas</label>
            <textarea name="fasilitas" placeholder="Fasilitas"></textarea>
        </div>

        <div class="form-group">
            <label>Status Kost</label>
            <select name="status" required>
                <option value="">-- Pilih Status --</option>
                <option value="kosong">Kosong</option>
                <option value="full">Full</option>
            </select>
        </div>

        <div class="form-group">
            <label>Alamat Kost</label>
            <textarea name="alamat" placeholder="Alamat Kost"></textarea>
        </div>

        <button type="submit" class="btn-submit">Simpan Data Kost</button>

        <a href="/admin/dashboard" class="btn-cancel">❌ Batal</a>
    </form>

    <script>
let isDirty = false;

document.querySelectorAll('input, textarea, select').forEach(el => {
    el.addEventListener('change', () => isDirty = true);
});

window.addEventListener('beforeunload', function (e) {
    if (isDirty) {
        e.preventDefault();
        e.returnValue = '';
    }
});
    </script>

</div>
