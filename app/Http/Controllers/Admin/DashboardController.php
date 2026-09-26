<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Pesanan;

class DashboardController extends Controller
{
    public function index()
    {
        $ringkasan = [
            'pesanan_hari_ini' => Pesanan::whereDate('waktu_pesan', today())->count(),
            'penjualan_hari_ini' => Pesanan::whereDate('waktu_pesan', today())
                ->where('status_pesanan', '!=', 'batal')
                ->sum('total_harga'),
            'pesanan_aktif' => Pesanan::whereIn('status_pesanan', ['baru', 'diproses', 'siap_diantar'])->count(),
            'menu_tidak_tersedia' => Menu::where('status_tersedia', false)->count(),
        ];

        $pesananTerbaru = Pesanan::with('meja')
            ->latest('waktu_pesan')
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact('ringkasan', 'pesananTerbaru'));
    }
}
