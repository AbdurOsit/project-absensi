<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaktuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        $data = [];

        foreach ($hariList as $index => $hari) {

            $data[] = [
                'hari' => $hari,
                'jam_masuk' => '07:00:00',
                'jam_pulang' => '15:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('waktus')->insert($data);
    }
}
