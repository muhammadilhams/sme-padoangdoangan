@extends('components.layout')
@section('title', 'Dashboard UMKM')

@section('content')
    <section class="min-vh-100 flex flex-col">
        <!-- User Modal -->
        @include('user.userModal')
        @include('user.editModal')

        <!-- Navigation -->
        <nav class="px-3 py-0 bg-zinc-100">
            <div class="container mx-auto px-auto py-1 min-w-100">
                <div class="flex items-center justify-between">
                    <a class="text-army text-lg font-bold" href="{{ route('beranda') }}">
                        <img src="{{ asset('images/logo-smart-sme.png') }}" width="130px" alt="Smart-Sme-Logo">
                    </a>
                    <div class="flex items-center">
                        @if (auth()->user()->foto_profil)
                            <img class="w-12 h-12 rounded-full shadow-md" src="{{ asset('storage/'. $user->foto_profil) }}"
                                alt="{{ $user->namaUmkm }}">
                        @else
                            <i class="fas fa-user-circle text-emerald-700 text-5xl"></i>
                        @endif
                        <!-- Dropdown Icon -->
                        <div class="ml-1">
                            <i id="profileDropdown"
                                class="fas fa-chevron-down text-gray-500 cursor-pointer hover:text-green-600"></i>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Title -->
        <div class="container mx-auto flex flex-col items-center justify-center h-50">
            <!-- Dropdown Menu (Initially Hidden) -->
            <div id="dropdownMenu"
                class="absolute top-20 right-3 py-3 mt-2 w-30 bg-white border border-gray-300 rounded-xl shadow-lg hidden z-10">
                <a href="#" id="openUserModal"
                    class="block px-4 text-emerald-500 font-semibold hover:text-emerald-900">Lihat Profil</a>
                <a href="#" id="openEditModal"
                    class="block px-4 mt-3 text-emerald-500 font-semibold hover:text-emerald-900">Edit Profile</a>
                <button type="button"
                    class="block w-full px-4  mt-2 text-left text-red-500 font-semibold hover:text-red-900 focus:outline-none"
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
                            <form action="{{ route('logout') }}" method="POST">
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
                <h1 class="lg:text-4xl sm:text-2xl text-gray-900 my-auto">{{ $greeting }}, <b>{{ $user->namaUmkm }}</b>!
                </h1>
            </div>
        </div>
        <!-- Search Form -->
        <div class="container mb-4">
            <form action="{{ route('products.index') }}" method="GET" class="flex justify-center">
                <div class="flex items-center">
                    <input type="text" name="search" value="{{ $query ?? '' }}" placeholder="Cari Produk..."
                        class="px-4 py-2 rounded-l-full bg-gray-100 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                    <button type="submit" class="bg-emerald-500 text-white px-4 py-2 rounded-r-full hover:bg-emerald-700">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Success Alert -->
        <div class="container mx-auto ">
            @if (session('success'))
                <div class="bg-emerald-500 border flex items-start justify-start  max-w-lg text-white px-4 py-3 rounded-2xl relative mb-3"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
        </div>
        @if ($searchPerformed)
            @if ($noProductsFound)
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
        <!-- User Description and Google Maps Alert -->
        <div class="container mx-auto">
            @if (empty($user->deskripsi) && empty($user->mapLink))
                <div class="bg-red-500 text-white px-4 py-3 rounded-2xl relative mb-4 max-w-3xl" role="alert">
                    <p class="block sm:inline text-lg">Oops! Sepertinya Anda belum menambahkan deskripsi dan tautan Google Maps. <br>
                        <span class="text-gray-50 text-sm">
                            Silakan klik foto profil Anda, lalu pilih fitur "Edit Profil" untuk menambahkan deskripsi dan tautan Google Maps.
                        </span></p>
                </div>
            @else
                @if (empty($user->deskripsi))
                <div class="bg-red-500 text-white px-4 py-3 rounded-2xl relative mb-4 max-w-3xl" role="alert">
                    <p class="block sm:inline text-lg">Oops! Sepertinya Anda belum menambahkan deskripsi. <br>
                        <span class="text-gray-50 text-sm">
                            Silakan klik foto profil Anda, lalu pilih fitur "Edit Profil" untuk menambahkan deskripsi.
                        </span></p>
                </div>
                @endif
                @if (empty($user->mapLink))
                <div class="bg-red-500 text-white px-4 py-3 rounded-2xl relative mb-4 max-w-3xl" role="alert">
                    <p class="block sm:inline text-lg">Oops! Sepertinya Anda belum menambahkan tautan Google Maps. <br>
                        <span class="text-gray-50 text-sm">
                            Silakan klik foto profil Anda, lalu pilih fitur "Edit Profil" untuk menambahkan tautan Google Maps.
                        </span></p>
                </div>
                @endif
            @endif
        </div>


        <!-- Table -->
        <div class="container mx-auto">

            <div class="overflow-x-auto rounded-2xl">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-zinc-200">
                            <th
                                class="px-3 py-2 text-center text-xs sm:text-sm font-medium text-emerald-900 uppercase tracking-wider">
                                No.</th>
                            <th
                                class="px-3 py-2 text-center text-xs sm:text-sm font-medium text-emerald-900 uppercase tracking-wider hidden sm:table-cell">
                                Gambar</th>
                            <th
                                class="px-3 py-2 text-center text-xs sm:text-sm font-medium text-emerald-900 uppercase tracking-wider">
                                Nama Produk</th>
                            <th
                                class="px-3 py-2 text-center text-xs sm:text-sm font-medium text-emerald-900 uppercase tracking-wider">
                                Harga</th>
                            <th
                                class="px-3 py-2 text-center text-xs sm:text-sm font-medium text-emerald-900 uppercase tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-emerald-50 divide-y divide-emerald-600">
                        @foreach ($products as $produk)
                            <tr>
                                <td class="px-3 py-2 sm:text-sm text-center">{{ $loop->iteration }}</td>
                                <td class="px-3 py-2 text-center hidden sm:table-cell">
                                    <img src="{{ asset('storage/' . $produk->gambar_produk) }}"
                                        alt="{{ $produk->nama_produk }}"
                                        class="w-12 h-12 sm:w-24 sm:h-24 object-cover rounded-lg mx-auto"
                                        style="object-fit: cover;">
                                </td>
                                <td class="px-3 py-2">
                                    <div class="text-center text-sm lg:text-lg sm:text-left">
                                        {{ $produk->nama_produk }}
                                    </div>
                                </td>
                                <td class="px-3 py-2 text-center">Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                </td>
                                <td class="px-3 py-2 text-center sm:text-left">
                                    <div class="flex flex-col items-center  sm:flex-row sm:justify-center">
                                        
                                            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 sm:py-2 sm:px-4 rounded-full text-xs sm:text-sm sm:mb-2 lg:mb-0 " href="{{ route('products.edit', $produk->id) }}">Edit</a>
                                        
                                        <button
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 sm:py-2 sm:px-4 rounded-full text-xs sm:text-sm ml-0 sm:ml-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modal-delete{{ $produk->id }}">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-delete{{ $produk->id }}" tabindex="-1"
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
                                                style="color:#5D7357">{{ $produk->nama_produk }}</b>?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('products.destroy', $produk->id) }}" method="POST"
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
            @if ($products->isEmpty())
                <div class="container flex mt-3 justify-center">
                    <p class="block sm:inline text-red-500" role="alert">Anda belum menambahkan produk.</p>
                </div>
            @endif
            <div class="flex items-center my-2">
                <div class="flex justify-start items-center space-x-4">
                    @if ($products->onFirstPage())
                        <span class="px-2 py-1 text-gray-400 rounded-md cursor-not-allowed"><i
                                class="fas fa-angle-double-left"></i></span>
                    @else
                        <a href="{{ $products->previousPageUrl() }}"
                            class="px-2 py-1  text-white bg-orange-500 text-2xl rounded-full hover:bg-orange-800"><i
                                class="fas fa-angle-double-left"></i></a>
                    @endif

                    @if ($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}"
                            class="px-2 py-1 text-white bg-orange-500 text-2xl rounded-full hover:bg-orange-800"><i
                                class="fas fa-angle-double-right"></i></a>
                    @else
                        <span class="px-2 py-1 text-gray-400 rounded-md cursor-not-allowed"><i
                                class="fas fa-angle-double-right"></i></span>
                    @endif
                </div>
                <p class="text-gray-600 ms-4">
                    Menampilkan Hasil {{ $products->firstItem() }} - {{ $products->lastItem() }} dari Total
                    {{ $products->total() }} Produk.
                </p>


            </div>
        </div>


        <!-- Fixed Tambah Produk Button -->
        <div class="fixed bottom-4 right-5 mb-8" style="z-index: 2">
            <a href="{{ route('products.create') }}"
                class="icon-container transition-all bg-emerald-400 hover:bg-emerald-800 text-white font-semibold p-4 rounded-full  duration-300">
                <p class="tambah-umkm-text text-white text-xl mx-2 inline-block align-middle transition-all">Tambah
                    UMKM
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
