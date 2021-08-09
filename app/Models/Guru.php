<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Guru extends Authenticatable
{
    protected $table = 'guru';
    protected $primaryKey = 'username';
    public $incrementing = false;

    public function pelajaran()
    {
        return $this->hasMany(Mapel::class, 'pengajar', 'username');
    }
}
