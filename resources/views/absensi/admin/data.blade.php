@extends('absensi.admin.layout2')
@section('p')
<style>
    /* Tema khusus untuk Tailwind */
    [data-theme="dark"] {
     --tw-bg-opacity: 1;
     --tw-text-opacity: 1;
     background-color: rgba(31, 41, 55, var(--tw-bg-opacity)); /* Warna abu-abu gelap */
     color: rgba(255, 255, 255, var(--tw-text-opacity)); /* Teks putih */
   }
 
     [data-theme="light"] {
         --tw-bg-opacity: 1;
         --tw-text-opacity: 1;
         background-color: rgba(255, 255, 255, var(--tw-bg-opacity)); /* White background */
         color: rgba(31, 41, 55, var(--tw-text-opacity)); /* Dark text */
   }
 
   [data-theme="dark"] table {
         background-color: rgba(55, 65, 81, var(--tw-bg-opacity)); /* Dark table */
   }
   [data-theme="light"] table {
         background-color: rgba(255, 255, 255 var(--tw-bg-opacity)); /* light table */
   }
 
   [data-theme="light"] .thead {
         background-color: rgba(255, 255, 255, var(--tw-bg-opacity)); /* Dark table */
   }
 
     [data-theme="light"] .thead {
         background-color: rgb(233, 236, 241, var(--tw-bg-opacity)); /* Light table */
         border: 1px solid black;
     }
 
     [data-theme="dark"] th,
     [data-theme="dark"] td {
         color: rgba(255, 255, 255, var(--tw-text-opacity)); /* White text for dark mode */
     }
 
     [data-theme="light"] th,
     [data-theme="light"] td {
         color: rgba(31, 41, 55, var(--tw-text-opacity)); /* Dark text for light mode */
     }
</style>
 <h1 class="text-4xl mb-4">Data Siswa</h1>
 <div class="mb-10 px-20 mx-auto">
    <div class="overflow-x-auto">
      <table class="table-auto w-full text-center">
        <thead>
          <tr class="border-t-2 border border-gray-700 bg-gray-600 text-white thead">
            <th class="border border-gray-700 px-4 py-2">No.Card</th>
            <th class="border border-gray-700 px-4 py-2">Nama Siswa</th>
            <th class="border border-gray-700 px-4 py-2">Alamat</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="border border-gray-700 px-4 py-2">08233</td>
            <td class="border border-gray-700 px-4 py-2">Gilber Hidaya</td>
            <td class="border border-gray-700 px-4 py-2">Puri</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection