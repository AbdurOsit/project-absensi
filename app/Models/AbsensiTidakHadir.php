<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AbsensiTidakHadir extends Model
{
    //
    protected $fillable = [
        'uid', // Tambahkan ini
        'username',
        'jurusan',
        'kelas',
        'role_id',
        'email',
        'password',
    ];
    // 
    protected $primaryKey = 'uid';  // Menggunakan uid sebagai primary key
    public $incrementing = false;   // Jika uid bukan auto-increment
    protected $keyType = 'string';  // Jika uid berupa string


    public $timestamps = true;

    public function role() : BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
