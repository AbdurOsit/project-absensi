<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PulangEksklusif extends Model
{
    //
    protected $table = 'pulang_eksklusif';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_uid', 'uid');
    }
}
