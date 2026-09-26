<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriMenu;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::with('kategori', 'varian')->latest()->paginate(15);
        return view('admin.menu.index', compact('menu'));
    }

    public function create()
    {
        $kategori = KategoriMenu::orderBy('urutan_tampil')->get();
        return view('admin.menu.form', compact('kategori'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_kategori' => 'required|exists:kategori_menu,id_kategori',
            'nama_menu' => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'harga_dasar' => 'required|numeric|min:0',
            'url_gambar' => 'nullable|string|max:255',
            'status_tersedia' => 'boolean',
        ]);

        Menu::create($data);

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit(Menu $menu)
    {
        $kategori = KategoriMenu::orderBy('urutan_tampil')->get();
        return view('admin.menu.form', compact('menu', 'kategori'));
    }

    public function update(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'id_kategori' => 'required|exists:kategori_menu,id_kategori',
            'nama_menu' => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'harga_dasar' => 'required|numeric|min:0',
            'url_gambar' => 'nullable|string|max:255',
            'status_tersedia' => 'boolean',
        ]);

        $menu->update($data);

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil dihapus.');
    }
}
