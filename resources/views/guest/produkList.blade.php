@extends('components.layout')

@section('title', 'Etalase Produk')

@section('content')
    @include('components.navbar')
    <div class="container mx-auto px-4 flex-grow">
        <div class="container mb-6 mx-auto flex flex-col items-center justify-center h-64">
            <h1 class="text-5xl text-center text-emerald-700 font-semibold mb-3 my-auto">Etalase Produk <span>
                    <p class="text-sm">Temukan Keunikan Produk UMKM di Kelurahan Padoang-Doangan</p>
                </span></h1>
            <!-- Search Box -->
            <div class="container mb-4">
                <form action="{{ route('product.list') }}" method="GET" class="flex justify-center">
                    <div class="flex items-center">
                        <input type="text" name="search" value="{{ $query ?? '' }}" placeholder="Cari Produk..."
                            class="px-4 py-2 rounded-l-full bg-gray-100 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                        <button type="submit"
                            class="bg-emerald-500 text-white px-4 py-2 rounded-r-full hover:bg-emerald-700">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
        @if ($searchPerformed)
            @if ($noProductsFound)
                <div class="container mx-auto">
                    <div class=" text-red-500 px-4 text-start py-3 relative mb-3" role="alert">
                        <span class="block sm:inline">Tidak ditemukan hasil untuk
                            "<strong>{{ $query }}</strong>"</span>
                    </div>
                </div>
            @else
                <div class="container mx-auto">
                    <div class=" text-green-700  py-3 text-start relative mb-3" role="alert">
                        <span class="block sm:inline">Menampilkan Hasil untuk "<strong>{{ $query }}</strong>"
                        </span>
                    </div>
                </div>
            @endif
        @endif
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3 ">
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

        <div class="flex justify-between items-center mt-8">
            <p class="text-gray-600">
                Menampilkan Hasil {{ $products->firstItem() }} - {{ $products->lastItem() }} dari Total {{ $products->total() }} Produk.
            </p>
            <div class="flex items-center space-x-4">
                @if ($products->onFirstPage())
                    <span class="px-2 py-1 text-gray-400 rounded-md cursor-not-allowed"><i class="fas fa-angle-double-left"></i></span>
                @else
                    <a href="{{ $products->previousPageUrl() }}" class="px-2 py-1  text-white bg-emerald-500 text-2xl rounded-full hover:bg-emerald-800"><i class="fas fa-angle-double-left"></i></a>
                @endif
            
                @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}" class="px-2 py-1 text-white bg-emerald-500 text-2xl rounded-full hover:bg-emerald-800"><i class="fas fa-angle-double-right"></i></a>
                @else
                    <span class="px-2 py-1 text-gray-400 rounded-md cursor-not-allowed"><i class="fas fa-angle-double-right"></i></span>
                @endif
            </div>
            
        </div>
        
        
        
        
    </div>
    @include('components.footer')
@endsection
