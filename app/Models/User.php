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

    
    protected $guarded = ['id'];

    // kalau uid sebagai unique
    // protected $fillable = [
    //     'uid', // Tambahkan ini
    //     'username',
    //     'jurusan',
    //     'kelas',
    //     'role_id',
    //     'email',
    //     'password',
    // ];
    // // 
    // protected $primaryKey = 'id'; // Pastikan tetap menggunakan 'id'
    // public $incrementing = true;  // Biarkan default jika 'id' adalah integer
    // protected $keyType = 'int';   // Pastikan 'id' bertipe integer


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
