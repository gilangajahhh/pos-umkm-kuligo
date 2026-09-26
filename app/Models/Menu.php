<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    protected $fillable = [
        'id_kategori', 'id_staff', 'nama_menu', 'deskripsi',
        'harga_dasar', 'url_gambar', 'status_tersedia',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriMenu::class, 'id_kategori', 'id_kategori');
    }

    public function varian()
    {
        return $this->hasMany(VarianMenu::class, 'id_menu', 'id_menu');
    }
}
