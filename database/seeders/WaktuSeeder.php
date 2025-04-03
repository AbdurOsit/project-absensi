<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaktuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hariList = [
            ['hari' => 'Minggu', 'libur' => true],
            ['hari' => 'Senin', 'libur' => false],
            ['hari' => 'Selasa', 'libur' => false],
            ['hari' => 'Rabu', 'libur' => false],
            ['hari' => 'Kamis', 'libur' => false],
            ['hari' => 'Jumat', 'libur' => false],
            ['hari' => 'Sabtu', 'libur' => true],
        ];

        $data = [];

        foreach ($hariList as $hariInfo) {
            $data[] = [
                'hari' => $hariInfo['hari'],
                'jam_masuk' => $hariInfo['libur'] ? null : '07:00:00',
                'jam_pulang' => $hariInfo['libur'] ? null : '15:00:00',
                'libur' => $hariInfo['libur'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('waktus')->insert($data);
    }
}