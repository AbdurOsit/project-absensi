@extends('absensi.user3.layout')
@section('user3')
    <h1 class="dark:text-white text-2xl font-semibold mb-6">
        Hi, Stewie Griffin
    </h1>
    <!-- Profile Card -->
    <div class="bg-gray-300 dark:bg-zinc-800 rounded-xl p-10 mb-8">
        <div class="flex items-center space-x-4">
            <!-- Profile Image -->
            <img src="https://tse2.mm.bing.net/th?id=OIP.XUZR-ZJzpBm5HeeFOYAZoAHaHa&pid=Api&P=0&h=220" alt="Profile"
                class="w-24 h-24 rounded-full" />

            <!-- Profile Info -->
            <div class="dark:text-white space-y-1 text-lg">
                <p>Nama: {{ $data->username }}</p>
                <p>Kelas: {{ $data->kelas }}</p>
                <p>Jurusan: {{ $data->jurusan }}</p>
            </div>
        </div>
    </div>

    <!-- Attendance Recap Section -->
    <div class="space-y-4">
        <h2 class="dark:text-white text-xl font-semibold">Rekap Absensi</h2>

        <!-- Filter Controls -->
        <div class="flex space-x-4">
            <div class="flex items-center space-x-2">
                <span class="dark:text-white">Bulan:</span>
                <select
                    class="bg-gray-300 dark:bg-zinc-800 dark:text-white border border-gray-700 rounded-md py-1 px-3 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    title="1">
                    <option>Januari</option>
                    <option>Februari</option>
                    <option>Maret</option>
                    <option>April</option>
                    <option>Mei</option>
                    <option>Juni</option>
                    <option>Juli</option>
                    <option>Agustus</option>
                    <option>September</option>
                    <option>Oktober</option>
                    <option>November</option>
                    <option>Desember</option>
                </select>
            </div>

            <div class="flex items-center space-x-2">
                <span class="dark:text-white">Kelas:</span>
                <select
                    class="bg-gray-300 dark:bg-zinc-800 dark:text-white border border-gray-700 rounded-md py-1 px-3 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    title="2">
                    <option>12</option>
                    <option>11</option>
                    <option>10</option>
                </select>
            </div>
        </div>

        <!-- Attendance Data Container -->
        <div class="bg-gray-300 dark:bg-zinc-800 rounded-xl p-4 min-h-[200px]">
            <table class="w-full border border-gray-900 dark:text-white">
                <thead>
                    <tr class="bg-gray-300 dark:bg-zinc-800 text-left">
                        <th class="border border-gray-500 px-4 py-2">Tanggal</th>
                        <th class="border border-gray-500 px-4 py-2">
                            Jam Kedatangan
                        </th>
                        <th class="border border-gray-500 px-4 py-2">Jam Pulang</th>
                        <th class="border border-gray-500 px-4 py-2">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-gray-300 dark:bg-zinc-800">
                        <td class="border border-gray-500 px-4 py-2"></td>
                        <td class="border border-gray-500 px-4 py-2"></td>
                        <td class="border border-gray-500 px-4 py-2"></td>
                        <td class="border border-gray-500 px-4 py-2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
