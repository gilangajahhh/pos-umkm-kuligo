<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriMenu;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = KategoriMenu::orderBy('urutan_tampil')->get();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'urutan_tampil' => 'nullable|integer',
        ]);

        KategoriMenu::create($data);
        return back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function update(Request $request, KategoriMenu $kategori)
    {
        $data = $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'urutan_tampil' => 'nullable|integer',
        ]);

        $kategori->update($data);
        return back()->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(KategoriMenu $kategori)
    {
        $kategori->delete();
        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}
