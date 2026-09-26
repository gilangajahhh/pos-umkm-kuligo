<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;

    protected $table = 'meja';
    protected $primaryKey = 'id_meja';
    protected $fillable = ['nomor_meja', 'kode_qr', 'url_qr_image', 'status_meja'];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_meja', 'id_meja');
    }
}
