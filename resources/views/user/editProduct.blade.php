@extends('components.layout')
@section('title', 'Edit Produk')

@section('content')
    <section class="bg-emerald-100 min-vh-100 min-h-screen flex flex-col">
        @include('user.navbar')

        <div class="container mx-auto flex flex-col items-center justify-center h-40">
            <h1 class="text-xl lg:text-4xl text-gray-900 my-auto">Edit Produk , <b>{{ $product->nama_produk }}</b></h1>
        </div>

        @if ($errors->any())
            <div class="container max-w-md bg-rose-400 border text-white px-4 py-3 rounded relative mb-3" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div
                class="container mx-auto px-4 py-8 mb-4 bg-white rounded-2xl border border-green-500 border-opacity-100 mt-4 max-w-md">
                <div class="mb-4">
                    <label for="nama_produk" class="block text-gray-700 text-sm font-bold mb-2">Nama Produk</label>
                    <input type="text" name="nama_produk" id="nama_produk"
                        class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Nama Produk" value="{{ $product->nama_produk }}">
                    <p class="text-green-800" style="font-size: 10px"><b>Saran: </b>Pastikan nama produk mudah dikenali, dan
                        mencerminkan kegunaan utama dari produk</p>
                </div>

                <div class="mb-4">
                    <label for="harga" class="block text-gray-700 text-sm font-semibold mb-2">Harga</label>
                    <input type="text" name="harga" id="harga"
                        class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 placeholder-red-400 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Harga" value="{{ $product->harga }}">
                        <p class="text-green-800" style="font-size: 10px"><b class="text-red-700">Petunjuk:</b>
                            Masukkan harga produk dalam format angka, tanpa tanda titik atau koma.</p>
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi"
                        class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Description">{{ $product->deskripsi }}</textarea>
                    <p class="text-green-800" style="font-size: 10px"><b class="text-red-700">Petunjuk:</b>
                        Hindari deskripsi yang terlalu panjang, fokus pada informasi penting dan relevan.</p>
                </div>

                <div class="mb-4">
                    <label for="gambar_produk" class="block text-gray-700 text-sm font-bold mb-2">Perbarui Gambar Produk</label>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $product->gambar_produk) }}" alt="Current Profile Image" class="w-32 h-32 rounded-lg object-cover">
                        </div>
                        <div class="flex flex-col">
                            <input type="file" name="gambar_produk" id="gambar_produk"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   accept="image/*">
                            <p class="text-red-500 text-xs mt-1"><b>Ketentuan: </b>Maksimal ukuran yang diizinkan adalah 2 MB</p>
                        </div>
                    </div>
                </div>
                

                <button type="submit"
                    class="bg-emerald-700 hover:bg-emerald-900 text-white font-bold py-2 px-4 w-full rounded focus:outline-none focus:shadow-outline">
                    Perbarui
                </button>

            </div>
        </form>

        @include('user.footer')

    </section>
@endsection
