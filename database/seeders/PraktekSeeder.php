<?php

namespace Database\Seeders;

use Carbon\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PraktekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $tanggalMulai = Carbon::now()->startOfWeek(); // Mulai dari hari Senin minggu ini

        $data = [];

        foreach ($hariList as $index => $hari) {
            $tanggal = $tanggalMulai->copy()->addDays($index)->format('Y-m-d');

            $data[] = [
                'hari' => $hari,
                'tanggal' => $tanggal,
                'praktek' => 'Praktek untuk ' . $hari .' depan',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('praktek')->insert($data);
    }
}
