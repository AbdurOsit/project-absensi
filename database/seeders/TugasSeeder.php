<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TugasSeeder extends Seeder
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
            $deadlineTanggal = $tanggalMulai->copy()->addDays($index + 3)->format('Y-m-d'); // Deadline 3 hari setelah hari tugas

            $data[] = [
                'hari' => $hari,
                'tanggal' => $tanggal,
                'tugas' => 'Tugas untuk ' . $hari,
                'deadline_hari' => $hariList[($index + 3) % 7], // Hari deadline (loop ke hari berikutnya)
                'deadline_tanggal' => $deadlineTanggal,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('tugas')->insert($data);
    }
}
