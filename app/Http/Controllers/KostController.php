<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kost;

class KostController extends Controller
{
    // ================= ADMIN =================
    public function adminIndex()
    {
        $kosts = Kost::all();
        return view('admin.dashboard', compact('kosts'));
    }

    public function create()
    {
        return view('admin.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kost' => 'required',
            'harga'     => 'required|numeric',
            'jarak'     => 'required|numeric',
            'status'    => 'required'
        ]);

        Kost::create([
            'nama_kost'  => $request->nama_kost,
            'harga'      => $request->harga,
            'jarak'      => $request->jarak,
            'no_pemilik' => $request->no_pemilik,
            'kondisi'    => $request->kondisi,
            'fasilitas'  => $request->fasilitas,
            'status'     => $request->status,
        ]);

        return redirect('/admin/dashboard')
            ->with('success', 'Data kost berhasil ditambahkan');
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $kost = Kost::findOrFail($id);
        return view('admin.edit', compact('kost'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kost' => 'required',
            'harga'     => 'required|numeric',
            'jarak'     => 'required|numeric',
            'status'    => 'required'
        ]);

        $kost = Kost::findOrFail($id);
        $kost->update([
            'nama_kost'  => $request->nama_kost,
            'harga'      => $request->harga,
            'jarak'      => $request->jarak,
            'no_pemilik' => $request->no_pemilik,
            'kondisi'    => $request->kondisi,
            'fasilitas'  => $request->fasilitas,
            'status'     => $request->status,
        ]);

        return redirect('/admin/dashboard')
            ->with('success', 'Data kost berhasil diupdate');
    }

    // ================= HAPUS =================
    public function destroy($id)
    {
        $kost = Kost::findOrFail($id);
        $kost->delete();

        return redirect('/admin/dashboard')
            ->with('success', 'Data kost berhasil dihapus');
    }

    // ================= USER =================
    public function userIndex(Request $request)
    {
        $query = Kost::where('jarak', '<=', 1);

        if ($request->harga_min) {
            $query->where('harga', '>=', $request->harga_min);
        }

        if ($request->harga_max) {
            $query->where('harga', '<=', $request->harga_max);
        }

        $kosts = $query->get();

        return view('user.dashboard', compact('kosts'));
    }

    public function detail($id)
    {
    $kost = Kost::findOrFail($id);
    return view('user.detail', compact('kost'));
    }

}
