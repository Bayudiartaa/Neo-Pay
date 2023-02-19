<?php

namespace App;

use App\Kelas;
use Illuminate\Database\Eloquent\Model;

class KompetensiKeahlian extends Model
{
    protected $table = 'kompetensi_keahlian';
    protected $guarded = [];

    public function kelas()
    {
        return  $this->hasMany(Kelas::class,'id_kelas');
    }
}
