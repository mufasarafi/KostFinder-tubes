<style>
    :root {
        --telkom-red: #C4161C;
        --telkom-dark: #9E1116;
        --bg-light: #f9f9f9;
        --border: #ddd;
    }

    .form-container {
        max-width: 700px;
        margin: 30px auto;
        background: #fff;
        padding: 25px 30px;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.1);
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
    <h2>Update Data Kost</h2>

    <form method="POST" action="/admin/kost/update/{{ $kost->id }}">
        @csrf

        <div class="form-group">
            <label>Nama Kost</label>
            <input name="nama_kost" value="{{ $kost->nama_kost }}">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Harga (Rp)</label>
                <input name="harga" type="number" value="{{ $kost->harga }}">
            </div>

            <div class="form-group">
                <label>Jarak (KM)</label>
                <input name="jarak" step="0.1" value="{{ $kost->jarak }}">
            </div>
        </div>

        <div class="form-group">
            <label>No. Pemilik</label>
            <input name="no_pemilik" value="{{ $kost->no_pemilik }}">
        </div>

        <div class="form-group">
            <label>Kondisi Kost</label>
            <textarea name="kondisi">{{ $kost->kondisi }}</textarea>
        </div>

        <div class="form-group">
            <label>Fasilitas</label>
            <textarea name="fasilitas">{{ $kost->fasilitas }}</textarea>
        </div>

        <div class="form-group">
            <label>Status Kost</label>
            <select name="status">
                <option value="kosong" {{ $kost->status == 'kosong' ? 'selected' : '' }}>Kosong</option>
                <option value="full" {{ $kost->status == 'full' ? 'selected' : '' }}>Full</option>
            </select>
        </div>

        <div class="form-group">
            <label>Lokasi Google Maps (Embed)</label>
            <textarea name="lokasi_map">{{ $kost->lokasi_map }}</textarea>
        </div>

        <button class="btn-submit">Update Data Kost</button>
    </form>
</div>
