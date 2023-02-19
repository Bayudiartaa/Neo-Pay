<?php

namespace App;

use App\KompetensiKeahlian;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
   
    protected $fillable = [
          'nama_kelas', 'id_kompetensi_keahlian'
    ];

    public function kompetensi_keahlian()
    {
        return $this->belongsTo(KompetensiKeahlian::class, 'id_kompetensi_keahlian');
    }
   
}
