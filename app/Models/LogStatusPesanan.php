<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogStatusPesanan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'log_status_pesanan';
    protected $primaryKey = 'id_log';
    protected $fillable = ['id_pesanan', 'id_staff', 'status_baru', 'waktu_update'];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id_pesanan');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'id_staff', 'id_staff');
    }
}
