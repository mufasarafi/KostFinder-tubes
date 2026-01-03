<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>

    <style>
        body {
            font-family: Arial, sans-serif;
             background:
            linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)),
            url('https://images.unsplash.com/photo-1572627460013-ea50567db133?q=80&w=435&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');

        background-size: cover;
        background-position: center;
        background-attachment: fixed;

        margin: 0;
        }

        header {
            background: #d50000;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .btn-add {
            background: #d50000;
        }

        .btn-add:hover {
            background: #b71c1c;
        }

        .card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .kost-info {
            line-height: 1.6;
        }

        .kost-info span {
            display: inline-block;
            margin-right: 10px;
            font-size: 14px;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            color: white;
        }

        .tersedia {
            background: #4caf50;
        }

        .penuh {
            background: #f44336;
        }

        .actions a,
        .actions button {
            margin-left: 5px;
        }

        .btn-edit {
            background: #2196f3;
            border: none;
            padding: 7px 12px;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-hapus {
            background: #f44336;
            border: none;
            padding: 7px 12px;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-edit:hover {
            background: #1976d2;
        }

        .btn-hapus:hover {
            background: #d32f2f;
        }

        .header-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

    .logout-btn {
    background: white;
    color: #d50000;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
}

    .logout-btn:hover {
    background: #f5f5f5;
}

    </style>
</head>
<body>

<header>
    <div class="header-bar">
        <div>
            <h2>Dashboard Admin</h2>
            <p>Manajemen Data Kost</p>
        </div>

        <form method="POST" action="/logout">
            @csrf
            <button class="logout-btn"
                onclick="return confirm('Yakin ingin logout?')">
                Logout
            </button>
        </form>
    </div>
</header>


<div class="container">

    <div class="top-bar">
        <h3>Daftar Kost</h3>
        <a href="/admin/kost/tambah" class="btn btn-add">+ Tambah Kost</a>
    </div>

    @forelse($kosts as $kost)
        <div class="card">
            <div class="kost-info">
                <strong>{{ $kost->nama_kost }}</strong><br>
                <span>💰 Rp {{ number_format($kost->harga) }}</span>
                <span>📍 {{ $kost->jarak }} KM</span>
                <span class="badge {{ $kost->status == 'tersedia' ? 'tersedia' : 'penuh' }}">
                    {{ ucfirst($kost->status) }}
                </span>
            </div>

            <div class="actions">
                <a href="/admin/kost/edit/{{ $kost->id }}" class="btn-edit">Edit</a>

                <form method="POST" action="/admin/kost/hapus/{{ $kost->id }}" style="display:inline;">
                    @csrf
                    <button class="btn-hapus"
                        onclick="return confirm('Yakin ingin menghapus data kost ini?')">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    @empty
        <p>Tidak ada data kost.</p>
    @endforelse

</div>

</body>
</html>
