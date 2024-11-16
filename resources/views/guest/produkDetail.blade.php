@extends('components.layout')
@section('title', 'Detail Produk')


@section('content')
    @include('components.navbar')
    <div class="flex items-start justify-center w-screen">
        <div class="container my-4 mx-auto px-5">
            <div class="flex flex-wrap items-start justify-between">
                <div class="w-full md:w-1/2 px-0 mb-4 md:mb-0">
                    <img loading="lazy" src="{{ asset('storage/' . $product->gambar_produk) }}"
                        alt="{{ $product->nama_produk }}" class="w-auto h-auto mb-4 rounded-lg aspect-ratio aspect-w-4 aspect-h-3">
                </div>
                <div class="w-full md:w-1/2 md:px-3">
                    <div class="bg-white border border-dashed border-emerald-500 p-6 rounded-2xl shadow-md">
                        <h2 class="text-gray-800 text-2xl font-semibold mb-2">{{ $product->nama_produk }}</h2>
                        
                        <div class="flex items-center mb-2">
                            <i class="fas fa-tags mr-2 text-emerald-500"></i>
                            <span class="text-gray-800 font-bold text-xl">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                        </div>
                        <a href="{{ route('umkm.detail', $product->user->id) }}" class="flex items-center mb-3"
                            id="pelakuUMKM">
                            <i class="fas fa-store mr-2 text-emerald-500"></i>
                            <span class=" text-emerald-700 hover:underline">{{ $product->user->namaUmkm }}</span>
                        </a>
                        <h2 class="text-black text-lg font-semibold">Deskripsi</h2>
                        
                            <p class="text-gray-500 mb-4 font-normal text-justify">{{ $product->deskripsi }}</p>
                       
                        <div class="flex flex-col md:flex-row justify-between mt-4 space-y-2 md:space-y-0 md:space-x-2">
                            <a  target="_blank" href="https://wa.me/{{ $product->user->kontak }}?text=Halo {{ $product->user->namaUmkm }}!, Saya menemukan produk Anda melalui Smart SME Padoang-Doangan, saya tertarik dengan produk ini : *{{ $product->nama_produk }}*"
                                class="bg-emerald-600 hover:bg-emerald-800 text-white hover:text-emerald-700 font-semibold px-4 py-3 rounded-xl flex-1 flex items-center text-sm justify-center">
                                <i class="fab fa-whatsapp text-lg mr-2"></i>Pesan Melalui WhatsApp
                            </a>
                            <a href="{{ $product->user->mapLink }}" target="_blank"
                                class="bg-white border-4 border-emerald-700 text-emerald-500 hover:text-emerald-700 hover:border-orange-700 font-semibold px-4 py-3 rounded-xl flex-1 flex items-center justify-center">
                                <i class="fas fa-map-marker-alt mr-2 text-emerald-500"></i> Lihat di Google Map
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
@endsection
