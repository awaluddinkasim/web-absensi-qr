<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    protected $table = 'siswa';
    protected $primaryKey = 'nis';
    public $incrementing = false;

    public function absensi($pertemuan)
    {
        return $this->hasOne(Absensi::class, 'nis', 'nis')->where('pertemuan', $pertemuan);
    }
}
