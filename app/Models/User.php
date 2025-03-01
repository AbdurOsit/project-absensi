<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    // protected $guarded = 'id';
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


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
