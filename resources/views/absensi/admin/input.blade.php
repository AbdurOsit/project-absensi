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

    [data-theme="dark"] body {
    background-color: rgba(31, 41, 55, var(--tw-bg-opacity));
    }

    [data-theme="light"] body {
    background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
    }
    [data-theme="light"] input {
        background-color: rgba(253, 251, 251, var(--tw-bg-opacity)); /* Light search */
        border: 2px solid black;
        color: black;
    }
    [data-theme="light"] .search-icon {
        color: black;
    }
    [data-theme="light"] .notif {
            color: black; /* Dark table */
    }
    [data-theme="light"] .sun {
                color: black;
                opacity: 1; /* Light Mode */
    }
    [data-theme="light"].moon {
        color: gray;
        opacity: 1; /* Light Mode */
    }
    [data-theme="dark"] table {
        background-color: rgba(55, 65, 81, var(--tw-bg-opacity)); /* Dark table */
    }

    [data-theme="light"] table {
        background-color: rgb(217, 221, 228, var(--tw-bg-opacity)); /* Light table */
    }

    [data-theme="dark"] th,
    [data-theme="dark"] td {
        color: rgba(255, 255, 255, var(--tw-text-opacity)); /* White text for dark mode */
    }

    [data-theme="light"] th,
    [data-theme="light"] td {
        color: rgba(31, 41, 55, var(--tw-text-opacity)); /* Dark text for light mode */
    }

    [data-theme="dark"] .update {
        padding: 10px;
        color: white;
        font-size: 15px;
    }
    [data-theme="dark"] .delete {
        padding: 10px;
        color: white;
        font-size: 15px;
    }
    [data-theme="dark"] .update:hover {
        background-color: rgb(201, 214, 17, var(--tw-bg-opacity));
        color: white;
        border-radius: 10px; 
    }
    [data-theme="dark"] .delete:hover {
        background-color: rgb(189, 26, 26, var(--tw-bg-opacity));
        color: white;
        border-radius:10px; 
    }

    [data-theme="light"] .button {
        background-color: rgb(37, 92, 202, var(--tw-bg-opacity)); /* Light table */
    }
</style>
</head>
<body class="min-h-screen">
<!-- Main Title -->
<h1 class="text-2xl font-semibold mb-8 light:text-black">Input Data Siswa</h1>
<button class="bg-purple-600 p-3 rounded-xl text-white font-bold button"><a href="#">Create</a></button>
<!-- Data Grid -->
<div class="w-3/4 mt-6">
    <table class="w-full table-auto border-collapse border border-gray-700">
      <thead>
        <tr>
          <th class="border border-gray-700 px-4 py-2">No Card</th>
          <th class="border border-gray-700 px-4 py-2">Nama Siswa</th>
          <th class="border border-gray-700 px-4 py-2">Jurnal</th>
          <th class="border border-gray-700 px-4 py-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="border border-gray-600 px-4 py-2">DE0017</td>
          <td class="border border-gray-600 px-4 py-2">Gilbert Aditya</td>
          <td class="border border-gray-600 px-4 py-2">PLJR</td>
          <td class="border border-gray-600 px-4 py-2 text-center">
            <a class="text-yellow-600 font-bold text-lg px-1 update" href="#">Update</a>
            <a class="text-red-600 font-bold text-lg px-5 delete" href="#">Delete</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <button class="bg-purple-600 p-3 mt-6 w-20 text-white font-bold rounded-xl button"><a href="{{ route('absensi.index') }}">Back</a></button>
</body>

@endsection