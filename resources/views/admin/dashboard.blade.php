@extends('components.layout')
@section('title', 'Dashboard Admin')

@section('content')
    <section class="min-vh-100 flex flex-col">

        <!-- Navigation -->
        <nav class="px-3 py-0 bg-zinc-100">
            <div class="container mx-auto px-auto py-1 min-w-100">
                <div class="flex items-center justify-between">
                    <a class="text-army text-lg font-bold" href="{{ route('beranda') }}">
                        <img src="{{ asset('images/logo-smart-sme.png') }}" width="130px" alt="Smart-Sme-Logo">
                    </a>
                    <button type="submit"
                        class="bg-orange-500 text-white px-3 py-2 rounded-2xl lg:text-lg sm:text-sm border border-orange-900 hover:bg-orange-700  hover:border-orange-700 transition duration-300 focus:outline-none"
                        data-bs-toggle="modal" data-bs-target="#modal-logout">
                        Logout
                    </button>
                </div>
            </div>
            </div>
        </nav>

        <div class="modal fade" id="modal-logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin keluar, <b style="color:#5D7357">{{ $admin->namaUmkm }}</b>?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                            @csrf

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-danger">Ya, Keluar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Title -->
        <div class="container mx-auto flex flex-col items-center justify-center h-50">
            <!-- Dropdown Menu (Initially Hidden) -->
            <div id="dropdownMenu"
                class="absolute top-20 right-3 mt-2 w-30 bg-white border border-gray-300 rounded-xl shadow-lg hidden z-10">

                <button type="button"
                    class="block w-full px-4 my-2 text-left text-red-500 font-semibold hover:text-red-900 focus:outline-none"
                    data-bs-toggle="modal" data-bs-target="#logoutModal">
                    Logout
                </button>
            </div>

            <!-- Modal Konfirmasi Logout -->
            <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin logout?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Ya, Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Greeting -->
            @php
                use Carbon\Carbon;
                $currentTime = Carbon::now();
                $currentHour = $currentTime->hour;
                if ($currentHour >= 5 && $currentHour < 12) {
                    $greeting = 'Selamat pagi';
                } elseif ($currentHour >= 12 && $currentHour < 18) {
                    $greeting = 'Selamat siang';
                } else {
                    $greeting = 'Selamat malam';
                }
            @endphp

            <div style="padding-top:10vh; padding-bottom:10vh">
                <h1 class="lg:text-4xl sm:text-2xl text-gray-900 my-auto">{{ $greeting }},
                    <b>{{ $admin->namaUmkm }}</b>!
                </h1>
            </div>
        </div>
        <!-- Search Form -->
        <div class="container mb-4">
            <form action="{{ route('admin.dashboard') }}" method="GET" class="flex justify-center">
                <div class="flex items-center">
                    <input type="text" name="search" value="{{ $query ?? '' }}" placeholder="Cari UMKM..."
                        class="px-4 py-2 rounded-l-full bg-gray-100 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                    <button type="submit"
                        class="bg-orange-500 text-white px-4 py-2 rounded-r-full hover:bg-orange-700">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Success Alert -->
        <div class="container mx-auto ">
            @if (session('success'))
                <div class="bg-emerald-500 border flex items-start justify-start  max-w-lg text-white px-4 py-3 rounded relative mb-3"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
        </div>
        @if ($searchPerformed)
            @if ($noUsersFound)
                <div class="container mx-auto">
                    <div class="bg-red-500 border text-white px-4 py-3 rounded-2xl relative mb-3" role="alert">
                        <span class="block sm:inline">Tidak ditemukan hasil untuk
                            <strong>{{ $query }}</strong></span>
                    </div>
                </div>
            @else
                <div class="container mx-auto">
                    <div class="bg-green-500 border text-white px-4 py-3 rounded-2xl relative mb-3" role="alert">
                        <span class="block sm:inline">Menampilkan Hasil untuk <strong>{{ $query }}</strong> </span>
                    </div>
                </div>
            @endif
        @endif

        <!-- Table -->
        <div class="container mx-auto mt-2 mb-5">
            <div class="overflow-x-auto  rounded-2xl ">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-zinc-200">
                            <th
                                class="px-3 py-2 text-center text-xs sm:text-sm font-medium text-orange-900 uppercase tracking-wider">
                                No.</th>
                            <th
                                class="px-3 py-2 text-center text-xs sm:text-sm font-medium text-orange-900 uppercase tracking-wider hidden sm:table-cell">
                                Foto Profil</th>
                            <th
                                class="px-3 py-2 text-center text-xs sm:text-sm font-medium text-orange-900 uppercase tracking-wider">
                                Nama UMKM</th>
                            <th
                                class="px-3 py-2 text-center text-xs sm:text-sm font-medium text-orange-900 uppercase tracking-wider hidden sm:table-cell">
                                Nama Pengelola</th>
                            <th
                                class="px-3 py-2 text-center text-xs sm:text-sm font-medium text-orange-900 uppercase tracking-wider">
                                Alamat</th>
                            <th
                                class="px-3 py-2 text-center text-xs sm:text-sm font-medium text-orange-900 uppercase tracking-wider hidden sm:table-cell">
                                Jenis Usaha</th>
                            <th
                                class="px-3 py-2 text-center text-xs sm:text-sm font-medium text-orange-900 uppercase tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-orange-50 divide-y divide-orange-600">
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-3 py-2 sm:text-sm text-center">{{ $loop->iteration }}</td>
                                <td class="px-3 py-2 text-center hidden sm:table-cell">
                                    <div class="flex justify-center items-center p-2">
                                        @if($user->foto_profil)
                                            <img class="w-20 h-20 rounded-full shadow-md" src="{{ asset('storage/'. $user->foto_profil) }}" alt="{{ $user->namaUmkm }}">
                                        @else
                                            <img class="w-20 h-20 rounded-xl shadow-md " src="{{ asset('images/umkm-default-pp.png') }}" alt="Default Image">
                                        @endif
                                    </div>
                                </td>

                                <td class="px-3 py-2">
                                    <div class="text-center text-sm lg:text-lg sm:text-left">{{ $user->namaUmkm }}
                                    </div>
                                </td>
                                <td class="px-3 py-2 text-center text-sm lg:text-lg hidden sm:table-cell sm:text-left">
                                    {{ $user->namaPemilik }}
                                </td>
                                <td class="px-3 py-2 ">
                                    <div class="text-center text-sm lg:text-lg sm:text-left">{{ $user->alamat }}
                                    </div>
                                </td>
                                <td class="px-3 py-2 text-center text-sm lg:text-lg hidden sm:table-cell sm:text-left">
                                    {{ $user->jenis_usaha }}

                                </td>
                                <td class="px-3 py-2 text-center sm:text-left">
                                    <div class="flex flex-col items-center  sm:flex-row sm:justify-center">
                                        
                                        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 sm:py-2 sm:px-4 rounded-full text-xs sm:text-sm sm:mb-2 lg:mb-0 " href="{{ route('admin.user.editForm', $user->id) }}">Edit</a>
                                        
                                        <button
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 sm:py-2 sm:px-4 rounded-full text-xs sm:text-sm ml-0 sm:ml-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modal-delete{{ $user->id }}">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-delete{{ $user->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus data <b
                                                style="color:#5D7357">{{ $user->namaUmkm }}</b>?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Kembali</button>
                                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex items-center my-2">
                <div class="flex justify-start items-center space-x-4">
                    @if ($users->onFirstPage())
                        <span class="px-2 py-1 text-gray-400 rounded-md cursor-not-allowed"><i class="fas fa-angle-double-left"></i></span>
                    @else
                        <a href="{{ $users->previousPageUrl() }}" class="px-2 py-1  text-white bg-orange-500 text-2xl rounded-full hover:bg-orange-800"><i class="fas fa-angle-double-left"></i></a>
                    @endif
                
                    @if ($users->hasMorePages())
                        <a href="{{ $users->nextPageUrl() }}" class="px-2 py-1 text-white bg-orange-500 text-2xl rounded-full hover:bg-orange-800"><i class="fas fa-angle-double-right"></i></a>
                    @else
                        <span class="px-2 py-1 text-gray-400 rounded-md cursor-not-allowed"><i class="fas fa-angle-double-right"></i></span>
                    @endif
                </div>
                <p class="text-gray-600 ms-4">
                    Menampilkan Hasil {{ $users->firstItem() }} - {{ $users->lastItem() }} dari Total {{ $users->total() }} UMKM.
                </p>
                
                
            </div>
        </div>

        <!-- Fixed Tambah Produk Button -->
        <div class="fixed bottom-4 right-5 mb-8" style="z-index: 2">
            <a href="{{ route('admin.user.createForm') }}"
                class="icon-container transition-all bg-orange-400 hover:bg-orange-800 text-white font-semibold p-4 rounded-full  duration-300">
                <p class="tambah-umkm-text text-white text-xl mx-2 inline-block align-middle transition-all">Tambah UMKM
                </p>
                <i class="fas blue-500 fa-plus-circle text-5xl hover-btn" style="vertical-align: middle;"></i>
            </a>
        </div>




        <!-- Footer -->
        @include('user.footer')
        @include('user.script')
    </section>
    <style>
        .icon-container {
            position: relative;
            display: inline-block;
            text-align: center;
        }

        .tambah-umkm-text {
            display: none;
            /* Optional styling for the text */
            color: #000;
            /* font-size: 14px; */
            font-weight: bold;
            vertical-align: middle;
            transition: opacity 0.3s ease;
            /* Adding transition for opacity */
        }

        .icon-container:hover .tambah-umkm-text {
            display: inline-block;
            opacity: 1;
            /* Ensuring the text is visible on hover */
        }

        .hover-btn:hover {
            transform: scale(1.1);
            /* Adding scale transformation on hover */
        }
    </style>

@endsection
