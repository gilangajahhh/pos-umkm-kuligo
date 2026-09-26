<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use HasFactory;

    protected $table = 'staff';
    protected $primaryKey = 'id_staff';
    protected $fillable = ['nama', 'username', 'password', 'role', 'no_hp', 'status_aktif'];
    protected $hidden = ['password'];

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isKasir(): bool
    {
        return $this->role === 'kasir';
    }

    public function logStatus()
    {
        return $this->hasMany(LogStatusPesanan::class, 'id_staff', 'id_staff');
    }

    public function struk()
    {
        return $this->hasMany(Struk::class, 'id_staff', 'id_staff');
    }
}
