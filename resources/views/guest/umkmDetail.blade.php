@extends('components.layout')
@section('title', 'Detail UMKM')

@section('content')
    @include('components.navbar')
    <div class="container my-4 mx-auto px-5">


        <div class="flex flex-wrap">
            <!-- User Profile Section -->
            <div class="w-full md:w-1/2 px-0 mb-4 md:mb-0">
                <div class="bg-white border-4 border-dashed border-emerald-500 p-6 rounded-3xl">
                    <div class="aspect-w-4 aspect-h-3 flex justify-center mb-2">
                       @if ($user->foto_profil)
                            <img loading="lazy" class="w-80 h-80 rounded-lg shadow-md object-cover "
                                src="{{ asset('storage/' . $user->foto_profil) }}" alt="{{ $user->namaUmkm }}">
                        @else
                            <img class="w-80 h-80 rounded-lg shadow-md object-cover" src="{{ asset('images/umkm-default-pp.png') }}"
                                alt="Default Image">
                        @endif
                    </div>
                    <h2 class="text-black text-3xl font-bold mb-1">{{ $user->namaUmkm }}</h2>
                    <p class="text-zinc-600 mb-3 flex items-center">{{ '@' . $user->username }}</p>
        
                    <!-- Business Type Section -->
                    <p class="font-bold mb-2 flex text-emerald-500 text-lg items-center">
                        @if ($user->jenis_usaha == 'kuliner')
                            <i class="fas fa-utensils text-emerald-500 mr-2"></i>
                        @elseif($user->jenis_usaha == 'otomotif')
                            <i class="fas fa-car text-emerald-500 mr-2"></i>
                        @elseif($user->jenis_usaha == 'agribisnis')
                            <i class="fas fa-seedling text-emerald-500 mr-2"></i>
                        @elseif($user->jenis_usaha == 'kecantikan')
                            <i class="fas fa-spa text-emerald-500 mr-2"></i>
                        @elseif($user->jenis_usaha == 'kerajinan')
                            <i class="fas fa-hand-sparkles text-emerald-500 mr-2"></i>
                        @elseif($user->jenis_usaha == 'fashion')
                            <i class="fas fa-tshirt text-emerald-500 mr-2"></i>
                        @else
                            <i class="fas fa-briefcase text-emerald-500 mr-2"></i>
                        @endif
                        {{ $user->jenis_usaha }}
                    </p>
        
                    <p class="text-gray-800 mb-2 flex items-center">
                        <i class="fas fa-user mr-2"></i>{{ $user->namaPemilik }}
                    </p>
                    <p class="text-gray-800 mb-2 flex items-center">
                        <i class="fas fa-phone mr-2"></i>{{ $user->kontak }}
                        
                    </p>
        
                    </p>
                    <p class="text-gray-800 mb-3 flex items-center">
                        <i class="fas fa-map-marker-alt mr-2"></i>{{ $user->alamat }}, Kel. Padoang-Doangan, Kab. Pangkep
                    </p>
                    <h2 class="text-black text-lg font-semibold">Deskripsi</h2>
                    
                        @if(empty($user->deskripsi))
                            <p class="text-red-500 mb-3 text-base">{{ $user->namaUmkm }} Belum menambahkan deskripsi</p>
                        @else
                            <p class="text-gray-500 font-normal mb-3 text-justify">{{ $user->deskripsi }}</p>
                        @endif
                    
                    
                    <div class="flex flex-col md:flex-row justify-between mt-4 space-y-2 md:space-y-0 md:space-x-2">
                        <a href="{{ $user->mapLink }}" target="_blank"
                            class="text-emerald-600 bg-white border-3 border-emerald-600 hover:text-emerald-800 hover:border-emerald-800 font-semibold px-4 py-3 rounded-xl flex-1 flex items-center justify-center">
                            <i class="fas fa-map-marker-alt mr-2"></i> Lihat di Google Map
                        </a>
                        <a href="https://wa.me/{{ $user->kontak }}?text=Halo {{ $user->namaUmkm }}!, Saya menemukan UMKM Anda melalui Smart SME Padoang-Doangan."
                            class="bg-emerald-600 hover:bg-emerald-800 text-white hover:text-emerald-700 font-semibold px-4 py-3 rounded-xl flex-1 flex items-center justify-center"
                            target="_blank">
                            <i class="fab fa-whatsapp mr-2"></i> Hubungi Penjual
                        </a>
                    </div>
                </div>
            </div>
        
            <!-- Product Section -->
            <div class="w-full md:w-1/2 px-4 md:px-4 pe-0">
                <h1 class="flex items-center text-emerald-500 text-3xl font-semibold mb-4">
                    <i class="fas fa-box mr-2"></i> Daftar Produk
                </h1>
                <!-- Search Box -->
                <div class="mb-4">
                    <form action="{{ route('umkm.detail', $user->id) }}" method="GET" class="flex justify-end">
                        <input type="text" name="search" value="{{ $query ?? '' }}" placeholder="Cari Produk..."
                            class="px-4 md:w-25 w-full py-2 rounded-full bg-gray-100 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                        <button type="submit"
                            class="bg-emerald-500 text-white px-4 py-2 rounded-full ml-2 hover:bg-emerald-700">Cari</button>
                    </form>
                </div>
                <!-- Alert for no products -->
                @if ($products->isEmpty() && !$searchPerformed)
                    <div class="bg-red-100 text-red-700 px-4 py-3 rounded-2xl relative mb-4" role="alert">
                        <span class="block sm:inline"><b>{{ $user->namaUmkm }}</b> belum menambahkan produk.</span>
                    </div>
                @endif
                
                @if ($searchPerformed)
                    @if ($noProductsFound)
                        <div class="container mx-auto">
                            <div class="text-red-500 px-4 text-center py-1 relative mb-3" role="alert">
                                <span class="block sm:inline">Tidak ditemukan hasil untuk "<strong>{{ $query }}</strong>"</span>
                            </div>
                        </div>
                    @else
                        <div class="container mx-auto">
                            <div class="text-green-700 py-1 text-center relative mb-3" role="alert">
                                <span class="block sm:inline">Menampilkan Hasil untuk "<strong>{{ $query }}</strong>"</span>
                            </div>
                        </div>
                    @endif
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($products as $product)
                        <a href="{{ route('product.detail.guest', $product->id) }}">
                            <div class="bg-white p-3 rounded-2xl shadow-md">
                                <img loading="lazy" src="{{ asset('storage/' . $product->gambar_produk) }}"
                                    alt="{{ $product->nama_produk }}"
                                    class="w-full h-48 sm:h-30 object-cover mb-2 rounded-lg aspect-ratio aspect-w-4 aspect-h-3">
                                <h1 class="text-gray-800  text-sm font-normal mb-0">{{ $product->nama_produk }}</h1>
                                <h4 class="text-gray-700 mb-1 text-lg font-semibold flex items-center">
                                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                                </h4>
                                <p class="text-sm mb-0">
                                    <i class="fas fa-map-marker-alt mr-1 text-emerald-500"></i>
                                    <span class="text-emerald-800">{{ $product->user->alamat }}</span>
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
        
                <!-- Pagination Links -->
                <div class="flex justify-between items-center mt-8">
                    <p class="text-gray-600">
                        Menampilkan Hasil {{ $products->firstItem() }} - {{ $products->lastItem() }} dari Total {{ $products->total() }} Produk.
                    </p>
                    <div class="flex items-center space-x-4">
                        @if ($products->onFirstPage())
                            <span class="px-2 py-1 text-gray-400 rounded-md cursor-not-allowed"><i class="fas fa-angle-double-left"></i></span>
                        @else
                            <a href="{{ $products->previousPageUrl() }}"
                               class="px-2 py-1 text-white bg-emerald-500 text-2xl rounded-full hover:bg-emerald-800"><i class="fas fa-angle-double-left"></i></a>
                        @endif
        
                        @if ($products->hasMorePages())
                            <a href="{{ $products->nextPageUrl() }}"
                               class="px-2 py-1 text-white bg-emerald-500 text-2xl rounded-full hover:bg-emerald-800"><i class="fas fa-angle-double-right"></i></a>
                        @else
                            <span class="px-2 py-1 text-gray-400 rounded-md cursor-not-allowed"><i class="fas fa-angle-double-right"></i></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        
        </div>
    </div>

    @include('components.footer')
@endsection
