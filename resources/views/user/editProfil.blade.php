@extends('components.layout')
@section('title', 'Edit Profil')

<section class="bg-emerald-100 min-h-screen">
    @include('user.navbar')

    <div class="container mx-auto flex flex-col items-center justify-center h-40">
        <h1 class="text-4xl text-gray-900 my-auto">Edit Profil , <b>{{ $user->namaUmkm }}</b></h1>
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
    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div
            class="container mx-auto px-4 py-8 bg-white rounded-2xl border border-green-500 border-opacity-100 mt-4 max-w-md">
            <div class="mb-4">
                <label for="namaUmkm" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                <input type="text" name="namaUmkm" id="namaUmkm"
                    class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Nama" value="{{ $user->namaUmkm }}">
                <p class="text-red-500" style="font-size: 12px"><b>Saran:</b> Pastikan nama selaras dengan identitas
                    UMKM Anda, mencerminkan visi dan misi UMKM, serta mudah diingat oleh pelanggan."</p>

            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                <p class="py-2 px-3 text-zinc-400 border rounded-lg w-full">{{ $user->username }}</p>
                <p class="text-red-700" style="font-size: 10px">Silakan menghubungi admin untuk mengedit informasi
                    <b>Username</b></p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <p class="py-2 px-3 text-zinc-400 border rounded-lg w-full">{{ $user->email }}</p>
                <p class="text-red-700" style="font-size: 10px">Silakan menghubungi admin untuk mengedit informasi
                    <b>Email</b></p>

            </div>
            <div class="mb-4">
                <label for="kontak" class="block text-gray-700 text-sm font-semibold mb-2">Kontak</label>
                <input type="text" name="kontak" id="kontak"
                    class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 placeholder-red-400 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="kontak" value="{{ $user->kontak }}">
                <p class="text-red-500" style="font-size: 12px"><b>Saran:</b> Kontak harus terhubung ke WhatsApp untuk
                    mempermudah pengguna menghubungi Anda dengan cepat dan mudah!</p>

            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 text-sm font-semibold mb-2">Alamat</label>
                <input type="text" name="alamat" id="alamat"
                    class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 placeholder-red-400 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Alamat" value="{{ $user->alamat }}">
                <p class="text-red-500 " style="font-size: 12px"><b>Saran:</b> Alamat lengkap akan mempermudah pengguna
                    menemukan UMKM Anda.</p>

            </div>

            <div class="mb-4">
                <label for="mapLink" class="block text-gray-700 text-sm font-semibold mb-2">Link Google Map</label>
                <input type="text" name="mapLink" id="mapLink"
                    class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 placeholder-red-400 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="link google map" value="{{ $user->mapLink }}">
                <p class="text-red-500 " style="font-size: 12px"><b>Saran: </b>"Pastikan titik lokasi yang Anda berikan
                    akurat sesuai dengan lokasi sebenarnya dari UMKM Anda, memudahkan pelanggan menemukan dan
                    mengunjungi UMKM Anda."</p>

            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi"
                    class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="{{ $user->deskripsi }}"></textarea>
                <p class="text-red-500 " style="font-size: 12px"><b>Saran: </b>Informasi yang mendalam, deskriptif, dan
                    penuh makna memiliki kekuatan untuk meyakinkan pelanggan dengan memberikan pemahaman yang
                    komprehensif tentang UMKM Anda.</p>

            </div>

            <div class="mb-3">
                <label for="foto_profil" class="block text-gray-700 text-sm font-bold mb-2">Foto Profil</label>
                <div class="relative mb-2">
                    <img src="{{ asset('storage/' . $user->foto_profil) }}" alt="Current Profile Image"
                        class="w- h-32 object-cover mx-auto">
                </div>
                <div class="relative">
                    <input type="file" name="foto_profil" id="foto_profil"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        accept="image/*">
                </div>
                <p class="text-red-500 " style="font-size: 12px"><b>Ketentuan: </b>Minimal ukuran yang diizinkan adalah
                    2 MB</p>

            </div>



            <button type="submit"
                class="bg-emerald-700 hover:bg-emerald-900 text-white font-bold py-2 px-4 w-full rounded focus:outline-none focus:shadow-outline">
                Simpan
            </button>
        </div>
    </form>

    @include('user.footer')

</section>

</body>

</html>
