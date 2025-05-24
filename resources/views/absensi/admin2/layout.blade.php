<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Absensi</title>
    @vite('resources/css/app.css')
    <style>
        /* Existing styles */
        * {
            transition: background-color 0.3s, color 0.3s;
        }

        select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            -webkit-appearance: none;
            appearance: none;
        }
    </style>
</head>

<body class="bg-gray-100 dark:bg-slate-900">
    <!-- Mobile Menu Overlay -->
    <div class="sidebar-overlay md:hidden" id="sidebarOverlay"></div>

    <!-- Mobile Menu Button -->
    <button id="mobileBtn" class="fixed top-4 left-4 z-50 p-2 rounded-lg bg-purple-600 text-white block md:hidden" onclick="mobileToggle()">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
    </button>

    <div class="min-h-screen flex flex-row ">
        <!-- Main Container for Both Sidebars -->
        <div class="min-h-screen ml-5">
            <div id="sidebarContainer" class="md:relative md:block pt-5 pb-5 rounded-lg h-full">
                <!-- Desktop Sidebar -->
                <div class="hidden md:block h-auto w-fit bg-purple-600 rounded-3xl z-50">
                    <div class="flex items-center justify-between p-4 border-purple-500 cursor-pointer" onclick="toggleSidebar()">
                        <div class="text-yellow-300 text-3xl font-semibold font-oswald titles">A<span class="text-white" >bsensi</span>
                        </div>
                        <svg class="w-10 h-10 text-white titles" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <svg width="30" height="30" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" style="cursor: pointer;" id="expandedIcon">
                            <circle cx="4" cy="4" r="2" fill="white" />
                            <circle cx="12" cy="4" r="2" fill="white" />
                            <circle cx="4" cy="12" r="2" fill="white" />
                            <circle cx="12" cy="12" r="2" fill="white" />
                        </svg>
                    </div>

                    <!-- Menu Items -->
                    <div class="p-4">

                        {{-- Home Navigation --}}
                        <a href="{{ route('admin.index') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="titles" >Home</span>
                            </div>
                        </a>

                        {{-- Input Navigation --}}
                        <a href="{{ route('admin.input') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                <svg fill="#ffffff" class="w-6 h-6" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M20.7,5.537a1.024,1.024,0,0,1,0,1.448L8.527,19.158,3,21l1.842-5.527L17.015,3.3a1.024,1.024,0,0,1,1.448,0Z">
                                        </path>
                                    </g>
                                </svg>
                                {{-- <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z"/>
                                  </svg> --}}
                                <span class="titles" >Input Data</span>
                            </div>
                        </a>

                        {{-- Data Siswa Navigation --}}
                        <a href="{{ route('admin.data') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M5.005 10.19a1 1 0 0 1 1 1v.233l5.998 3.464L18 11.423v-.232a1 1 0 1 1 2 0V12a1 1 0 0 1-.5.866l-6.997 4.042a1 1 0 0 1-1 0l-6.998-4.042a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1ZM5 15.15a1 1 0 0 1 1 1v.232l5.997 3.464 5.998-3.464v-.232a1 1 0 1 1 2 0v.81a1 1 0 0 1-.5.865l-6.998 4.042a1 1 0 0 1-1 0L4.5 17.824a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1Z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M12.503 2.134a1 1 0 0 0-1 0L4.501 6.17A1 1 0 0 0 4.5 7.902l7.002 4.047a1 1 0 0 0 1 0l6.998-4.04a1 1 0 0 0 0-1.732l-6.997-4.042Z" />
                                </svg>

                                <span class="titles" >Data Siswa</span>
                            </div>
                        </a>

                        {{-- Pantau Navigation --}}
                        <a href="{{ route('admin.rekap') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                </svg>
                                <span class="titles">Pantau Siswa Hadir</span>
                            </div>
                        </a>

                        {{-- Waktu Navigation --}}
                        <a href="{{ route('admin.waktu') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                </svg>  
                                <span class="titles" >Waktu Datang dan Pulang</span>
                            </div>
                        </a>

                        {{-- Rekap Navigation --}}
                        <a href="{{ route('admin.tidak_hadir') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2"
                                    d="M3 11h18m-9 0v8m-8 0h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                                </svg>
                                <span class="titles capitalize">Rekap Absensi Siswa</span>
                            </div>
                        </a>

                        {{-- Tugas Navigation --}}
                        <a href="{{ route('admin.jadwal') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                                  </svg>
                                    
                                <span class="titles" >Data Tugas</span>
                            </div>
                        </a>

                        {{-- Scan Card --}}
                        <a href="{{ route('admin.scan') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="titles" >Scan Card</span>
                            </div>
                        </a>

                        {{-- Input Surat Navigation --}}
                        <a href="{{ route('admin.surat') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11.5c.07 0 .14-.007.207-.021.095.014.193.021.293.021h2a2 2 0 0 0 2-2V7a1 1 0 0 0-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H7Zm1 3V8h1v1H8Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="titles" >Input Surat</span>
                            </div>
                        </a>

                        {{-- Log-out Navigation --}}
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center gap-3 text-white cursor-pointer text-lg mt-3.5">
                                <svg viewBox="0 0 16 16" class="w-6 h-6  font-bold" xmlns="http://www.w3.org/2000/svg"
                                    fill="#ffffff" class="bi bi-box-arrow-left">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd"
                                            d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z">
                                        </path>
                                    </g>
                                </svg>
                                <span class="titles" >Log-out</span>
                            </button>
                        </form>
                    </div>
                </div>
                <!-- Mobile Sidebar -->
                <div id="mobile-sidebar" class="md:hidden fixed -left-full h-auto w-400 bg-purple-600 rounded-3xl transition-all duration-200 z-50">
                    <div class="flex items-center justify-between p-4 border-purple-500 cursor-pointer" onclick="mobileToggle()">
                        <div class="text-yellow-300 text-3xl font-semibold font-oswald">A<span class="text-white" >bsensi</span>
                        </div>
                        <svg class="w-10 h-10 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                    </div>

                    <!-- Menu Items -->
                    <div class="p-4">

                        {{-- Home Navigation --}}
                        <a href="{{ route('admin.index') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Home</span>
                            </div>
                        </a>

                        {{-- Input Navigation --}}
                        <a href="{{ route('admin.input') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                {{-- <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z"/>
                                  </svg> --}}
                                  <svg fill="#ffffff" class="w-6 h-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M20.7,5.537a1.024,1.024,0,0,1,0,1.448L8.527,19.158,3,21l1.842-5.527L17.015,3.3a1.024,1.024,0,0,1,1.448,0Z">
                                            </path>
                                        </g>
                                    </svg>
                                <span>Input Data</span>
                            </div>
                        </a>

                        {{-- Data Siswa Navigation --}}
                        <a href="{{ route('admin.data') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M5.005 10.19a1 1 0 0 1 1 1v.233l5.998 3.464L18 11.423v-.232a1 1 0 1 1 2 0V12a1 1 0 0 1-.5.866l-6.997 4.042a1 1 0 0 1-1 0l-6.998-4.042a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1ZM5 15.15a1 1 0 0 1 1 1v.232l5.997 3.464 5.998-3.464v-.232a1 1 0 1 1 2 0v.81a1 1 0 0 1-.5.865l-6.998 4.042a1 1 0 0 1-1 0L4.5 17.824a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1Z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M12.503 2.134a1 1 0 0 0-1 0L4.501 6.17A1 1 0 0 0 4.5 7.902l7.002 4.047a1 1 0 0 0 1 0l6.998-4.04a1 1 0 0 0 0-1.732l-6.997-4.042Z" />
                                </svg>

                                <span>Data Siswa</span>
                            </div>
                        </a>

                        {{-- Pantau Navigation --}}
                        <a href="{{ route('admin.rekap') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                </svg>
                                <span class="titles">Pantau Siswa Hadir</span>
                            </div>
                        </a>

                        {{-- Waktu Navigation --}}
                        <a href="{{ route('admin.waktu') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                </svg>  
                                <span>Waktu Datang dan Pulang</span>
                            </div>
                        </a>

                        {{-- Rekap Navigation --}}
                        <a href="{{ route('admin.tidak_hadir') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M3 11h18m-9 0v8m-8 0h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                                </svg>
                                <span class="titles capitalize">Rekap Absensi Siswa</span>
                            </div>
                        </a>

                        {{-- Tugas Navigation --}}
                        <a href="{{ route('admin.jadwal') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                                  </svg>
                                    
                                <span>Data Tugas</span>
                            </div>
                        </a>

                        {{-- Scan Card --}}
                        <a href="{{ route('admin.scan') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Scan Card</span>
                            </div>
                        </a>

                        {{-- Input Surat Navigation --}}
                        <a href="{{ route('admin.surat') }}">
                            <div class="flex items-center gap-3 text-white cursor-pointer text-lg mt-5">
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11.5c.07 0 .14-.007.207-.021.095.014.193.021.293.021h2a2 2 0 0 0 2-2V7a1 1 0 0 0-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H7Zm1 3V8h1v1H8Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Input Surat</span>
                            </div>
                        </a>

                        {{-- Log-out Navigation --}}
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center gap-3 text-white cursor-pointer text-lg mt-3.5">
                                <svg viewBox="0 0 16 16" class="w-6 h-6  font-bold" xmlns="http://www.w3.org/2000/svg"
                                    fill="#ffffff" class="bi bi-box-arrow-left">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd"
                                            d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z">
                                        </path>
                                    </g>
                                </svg>
                                <span>Log-out</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Navbar --}}
        <div class="flex-1 p-4 md:p-6 ml-5 rounded-lg w-full">
            <nav
                class="bg-gray-300 dark:bg-gray-800 px-2 md:px-4 py-2 flex flex-col md:flex-row items-center justify-end mb-6 rounded-lg gap-4">

                {{-- Search --}}
                <div class="flex items-center gap-2 w-full md:w-auto order-2 md:order-1">
                    <form action="{{ route('search') }}" method="GET" class="flex items-center gap-2 w-full md:w-auto order-2 md:order-1">
                        <input type="hidden" name="page" value="{{ request()->route()->getName() }}">
                        <input type="search" name="query" placeholder="search" class="bg-gray-100 dark:bg-gray-700 dark:text-white rounded px-3 py-1 w-full md:w-64" value="{{ request('query') }}">
                        <button type="submit">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="flex items-center gap-4 order-1 md:order-2">
                    <i data-lucide="bell" class="text-gray-400 cursor-pointer w-5 h-5"></i>

                    {{-- Theme Toggle --}}
                    <div class="mr-4 md:mr-10">
                        <button id="theme-toggle" class="text-gray-600 dark:text-gray-400 flex items-center">
                            <!-- Sun Icon -->
                            <svg id="sunIcon"
                                class="w-6 h-6 text-gray-800 dark:text-white opacity-0 dark:opacity-100"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 5V3m0 18v-2M7.05 7.05 5.636 5.636m12.728 12.728L16.95 16.95M5 12H3m18 0h-2M7.05 16.95l-1.414 1.414M18.364 5.636 16.95 7.05M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" />
                            </svg>
                            <!-- Moon Icon -->
                            <svg id="moonIcon" class="w-6 h-6 text-gray-900 opacity-100 dark:opacity-0 mr-4 z-10"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.675 2.015a.998.998 0 0 0-.403.011C6.09 2.4 2 6.722 2 12c0 5.523 4.477 10 10 10 4.356 0 8.058-2.784 9.43-6.667a1 1 0 0 0-1.02-1.33c-.08.006-.105.005-.127.005h-.001l-.028-.002A5.227 5.227 0 0 0 20 14a8 8 0 0 1-8-8c0-.952.121-1.752.404-2.558a.996.996 0 0 0 .096-.428V3a1 1 0 0 0-.825-.985Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    {{-- foto profil --}}
                    <div class="w-8 h-8 rounded-full">
                        @if(auth()->check())
                            <img src="{{ asset('image/' . auth()->user()->image) }}" alt="Foto Profil" style="width: 50px; height: 30px; border-radius: 50%;">
                        @endif
                    </div>
                </div>
            </nav>
            {{-- Content --}}
            <div class="w-full">
                @yield('admin2')
            </div>
        </div>
    </div>
    <script>
        // Kode tema tetap sama
        if (!("theme" in localStorage)) {
            localStorage.theme = "dark";
        }
    
        if (localStorage.theme === "dark") {
            document.documentElement.classList.add("dark");
        } else {
            document.documentElement.classList.remove("dark");
        }
    
        const themeToggle = document.getElementById("theme-toggle");
        themeToggle?.addEventListener("click", () => {
            document.documentElement.classList.toggle("dark");
            localStorage.theme = document.documentElement.classList.contains("dark") ? "dark" : "light";
        });
    
        // Sidebar logic
        // const sidebarContainer = document.getElementById('sidebarContainer');
        const sidebarContentTitles = document.querySelectorAll('.titles')
        const expandedIcon = document.getElementById('expandedIcon');
        // const collapsedSidebar = document.getElementById('collapsedSidebar');
        const mobileMenuBtn = document.getElementById('mobileBtn');
        const mobileSidebar = document.getElementById('mobile-sidebar')
        // const sidebarOverlay = document.getElementById('sidebarOverlay');

        let isExpanded = localStorage.getItem('sidebarExpanded') === 'true';

        function applySidebarState() {
            if (isExpanded) {
                expandedIcon.classList.add('hidden');
                sidebarContentTitles.forEach(el => el.classList.remove('hidden'))
                // collapsedSidebar.classList.add('hidden');
            } else {
                expandedIcon.classList.remove('hidden');
                sidebarContentTitles.forEach(el => el.classList.add('hidden'))
                // collapsedSidebar.classList.remove('hidden');
            }
        }
        applySidebarState();

        function toggleSidebar() {
            isExpanded = !isExpanded;
            localStorage.setItem('sidebarExpanded', isExpanded);
            applySidebarState();
        }

        // document.querySelectorAll('#expandedSidebar .cursor-pointer, #collapsedSidebar .cursor-pointer').forEach(item => {
        //     item.addEventListener('click', (e) => e.stopPropagation());
        // });

        // expandedSidebar.querySelector('.flex')?.addEventListener('click', toggleSidebar);
        // collapsedSidebar.querySelector('.flex')?.addEventListener('click', toggleSidebar);

        // // Mobile Menu Button Logic
      
        function mobileToggle() {
            mobileSidebar.classList.toggle('-left-full'); 
            mobileSidebar.classList.toggle('left-4');
            mobileMenuBtn.classList.toggle('hidden')
        };

        // // Menutup sidebar saat overlay diklik
        // sidebarOverlay?.addEventListener('click', function () {
        //     expandedSidebar.classList.add('hidden');
        //     sidebarOverlay.classList.remove('fixed', 'inset-0', 'bg-black', 'bg-opacity-50');
        // });

        //Search semua halaman   
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.querySelector("input[name='query']");
            searchInput?.addEventListener("input", function () {
                localStorage.setItem("searchQuery", this.value.toLowerCase());
            });
        });
    </script>
    
</body>

</html>