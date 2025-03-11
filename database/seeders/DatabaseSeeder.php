<?php

namespace Database\Seeders;

use App\Models\AbsensiHadir;
use App\Models\AbsensiTidakHadir;
use App\Models\Alasan;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@gmail.com',
        // ]);

        Role::insert([
            [
                'name' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'guru',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'siswa',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        User::create([
            'uid' => 'U001',
            'username' => 'admin',
            'jurusan' => 'Teknik Informatika',
            'kelas' => 12,
            'role_id' => 1, // Sesuaikan dengan role
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'created_at' => Carbon::now(), // Tambahkan ini
            'updated_at' => Carbon::now(), // Tambahkan ini
        ]);

        User::create([
            'uid' => 'U002',
            'username' => 'guru1',
            'jurusan' => 'Matematika',
            'kelas' => 0, // Bisa null jika tidak relevan untuk guru
            'role_id' => 2,
            'email' => 'guru@gmail.com',
            'password' => Hash::make('password123'),
            'created_at' => Carbon::now(), // Tambahkan ini
            'updated_at' => Carbon::now(), // Tambahkan ini
        ]);

        User::create([
            'uid' => 'U003',
            'username' => 'siswa1',
            'jurusan' => 'Teknik Elektro',
            'kelas' => 11,
            'role_id' => 3,
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('password123'),
            'created_at' => Carbon::now(), // Tambahkan ini
            'updated_at' => Carbon::now(), // Tambahkan ini
        ]);

        // Tambahan 3 siswa lagi
        User::create([
            'uid' => 'U004',
            'username' => 'siswa2',
            'jurusan' => 'Teknik Mesin',
            'kelas' => 11,
            'role_id' => 3,
            'email' => 'siswa2@gmail.com',
            'password' => Hash::make('password123'),
            'created_at' => Carbon::now(), // Tambahkan ini
            'updated_at' => Carbon::now(), // Tambahkan ini
        ]);

        User::create([
            'uid' => 'U005',
            'username' => 'siswa3',
            'jurusan' => 'Teknik Sipil',
            'kelas' => 12,
            'role_id' => 3,
            'email' => 'siswa3@gmail.com',
            'password' => Hash::make('password123'),
            'created_at' => Carbon::now(), // Tambahkan ini
            'updated_at' => Carbon::now(), // Tambahkan ini
        ]);

        User::create([
            'uid' => 'U006',
            'username' => 'siswa4',
            'jurusan' => 'Teknik Listrik',
            'kelas' => 10,
            'role_id' => 3,
            'email' => 'siswa4@gmail.com',
            'password' => Hash::make('password123'),
            'created_at' => Carbon::now(), // Tambahkan ini
            'updated_at' => Carbon::now(), // Tambahkan ini
        ]);

        // Ambil 3 user pertama dengan role_id = 3
        $hadirUsers = User::where('role_id', 3)->take(3)->get();
        
        if ($hadirUsers->count() >= 3) {
            AbsensiHadir::create([
                'uid' => $hadirUsers[0]->uid,
                'hari_tanggal' => Carbon::now()->toDateString(),
                'username' => $hadirUsers[0]->username,
                'role_id' => $hadirUsers[0]->role_id,
                'kelas' => $hadirUsers[0]->kelas,
                'jurusan' => $hadirUsers[0]->jurusan,
                'status' => false,
                'waktu_datang' => '07:00:00',
                'waktu_pulang' => '15:00:00',
            ]);

            AbsensiHadir::create([
                'uid' => $hadirUsers[1]->uid,
                'hari_tanggal' => Carbon::now()->toDateString(),
                'username' => $hadirUsers[1]->username,
                'role_id' => $hadirUsers[1]->role_id,
                'kelas' => $hadirUsers[1]->kelas,
                'jurusan' => $hadirUsers[1]->jurusan,
                'status' => false,
                'waktu_datang' => '07:00:00',
                'waktu_pulang' => '15:00:00',
            ]);

            AbsensiHadir::create([
                'uid' => $hadirUsers[2]->uid,
                'hari_tanggal' => Carbon::now()->toDateString(),
                'username' => $hadirUsers[2]->username,
                'role_id' => $hadirUsers[2]->role_id,
                'kelas' => $hadirUsers[2]->kelas,
                'jurusan' => $hadirUsers[2]->jurusan,
                'status' => false,
                'waktu_datang' => '07:00:00',
                'waktu_pulang' => '15:00:00',
            ]);
        }

        // Ambil 2 user terakhir dengan role_id = 3
        $tidakHadirUsers = User::where('role_id', 3)->orderBy('uid', 'desc')->take(2)->get();
        
        if ($tidakHadirUsers->count() >= 2) {
            AbsensiTidakHadir::create([
                'uid' => $tidakHadirUsers[0]->uid,
                'username' => $tidakHadirUsers[0]->username,
                'role_id' => $tidakHadirUsers[0]->role_id,
                'kelas' => $tidakHadirUsers[0]->kelas,
                'jurusan' => $tidakHadirUsers[0]->jurusan,
                'hari_tanggal' => Carbon::now()->toDateString(),
                'alasan_id' => 'izin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            AbsensiTidakHadir::create([
                'uid' => $tidakHadirUsers[1]->uid,
                'username' => $tidakHadirUsers[1]->username,
                'role_id' => $tidakHadirUsers[1]->role_id,
                'kelas' => $tidakHadirUsers[1]->kelas,
                'jurusan' => $tidakHadirUsers[1]->jurusan,
                'hari_tanggal' => Carbon::now()->toDateString(),
                'alasan_id' => 'sakit',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        Alasan::create([
            'alasan' => 'sakit'
        ]);
        Alasan::create([
            'alasan' => 'izin'
        ]);
        Alasan::create([
            'alasan' => 'alpha'
        ]);
    }
}
