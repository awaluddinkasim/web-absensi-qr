<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'pengajar', 'username');
    }
}
