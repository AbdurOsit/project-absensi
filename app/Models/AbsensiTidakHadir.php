<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AbsensiTidakHadir extends Model
{
    //

    public $timestamps = true;

    public function role() : BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function alasan() : BelongsTo {
        return $this->belongsTo(Alasan::class);
    }
}
