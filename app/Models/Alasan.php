<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alasan extends Model
{
    //
    protected $guarded = 'id';
    protected $table = 'alasan';

    public function absensi_tidak_hadir() : HasMany {
       return $this->hasMany(AbsensiTidakHadir::class);
    }
}
