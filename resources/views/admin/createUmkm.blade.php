@extends('components.layout')
@section('title', 'Tambah UMKM')

@section('content')
    <section class="bg-emerald-100 min-h-screen">
        @include('admin.navbar')

        <div class="container mx-auto flex flex-col items-center justify-center h-40">
            <h1 class="text-4xl text-gray-900 my-auto">Halaman Tambah UMKM</b></h1>
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
        <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div
                class="container mx-auto mb-4 px-4 py-8 bg-white rounded-2xl border border-green-500 border-opacity-100 mt-4 max-w-4xl">


                <div class="mb-4 flex justify-between">
                    <div class="w-1/2 mr-2">
                        <label for="namaUmkm" class="block text-gray-700 text-sm font-bold mb-2">Nama UMKM</label>
                        <input type="text" name="namaUmkm" id="namaUmkm"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Nama" value="" required>
                        <p class="text-red-500" style="font-size: 12px"><b class="text-green-700">Petunjuk:</b> Pastikan
                            nama
                            selaras dengan identitas
                            UMKM.</p>
                    </div>
                    <div class="w-1/2">
                        <label for="namaPemilik" class="block text-gray-700 text-sm font-bold mb-2">Nama Pengelola</label>
                        <input type="text" name="namaPemilik" id="namaPemilik"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Nama Pemilik" value="" required>
                        <p class="text-red-500" style="font-size: 12px"><b class="text-green-700">Petunjuk: </b>Isi dengan
                            nama
                            lengkap pengelola UMKM.</p>
                    </div>
                </div>
                <div class="mb-4 flex justify-between">
                    <div class="w-1/2 mr-2">
                        <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                        <input type="text" name="username" id="username"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="username" value="" required>
                        <p class="text-red-500" style="font-size: 12px"><b class="text-green-700">Petunjuk: </b>Tuliskan
                            tanpa
                            spasi sebagai username untuk login ke platform Smart SME</p>
                    </div>
                    <div class="w-1/2">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" name="email" id="email"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="email" value="" required>
                        <p class="text-red-500" style="font-size: 12px"><b class="text-green-700">Petunjuk: </b>Tuliskan
                            email
                            yang aktif dan valid </p>
                    </div>
                </div>

                <div class="mb-4 flex justify-between">
                    <div class="w-1/2 mr-2">
                        <label for="kontak" class="block mb-2 text-sm font-semibold">Kontak</label>
                        <input type="text" id="kontak" name="kontak"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="085123456789" required>
                        <p class="text-green-800" style="font-size: 12px"><b class="text-red-700">Petunjuk:</b>
                            Kontak harus terhubung ke WhatsApp untuk mempermudah pengguna menghubungi Anda dengan
                            cepat dan mudah!</p>
                    </div>
                    <div class="w-1/2">
                        <label for="alamat" class="block text-gray-700 text-sm font-semibold mb-2">Alamat</label>
                        <input type="text" name="alamat" id="alamat"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700  leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Alamat" value="" required>
                        <p class="text-red-500" style="font-size: 12px"><b class="text-green-700">Petunjuk: </b>Tuliskan
                            tanpa
                            menyertakan nama kecamatan dan kabupaten</p>
                    </div>
                </div>
                <!-- Deskripsi -->
                <div class="w-full mb-3">
                    <label for="deskripsi" class="block text-gray-700 text-sm font-semibold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi"
                        class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Deskripsi"></textarea>
                    <p class="text-red-500" style="font-size: 10px"><b>Saran:</b> Informasi yang mendalam,
                        deskriptif, dan penuh makna memberikan
                        pemahaman yang komprehensif tentang UMKM.</p>
                </div>
                <div class="mb-4 flex justify-between">
                    <div class="w-1/2 mr-2">
                        <label for="mapLink" class="block text-gray-700 text-sm font-semibold mb-2">Link Google
                            Map</label>
                        <input type="text" name="mapLink" id="mapLink"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700  leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Link Google Map" value="" required>
                        <p class="text-red-500" style="font-size: 12px"><b class="text-green-700">Petunjuk: </b>Pastikan
                            titik
                            lokasi akurat sesuai dengan lokasi sebenarnya dari UMKM.</p>
                    </div>
                    <!-- Jenis Usaha -->
                    <div class="w-1/2">
                        <label for="jenis_usaha" class="block mb-1 text-sm font-semibold">Jenis Usaha</label>
                        <select id="jenis_usaha" name="jenis_usaha" class="w-full border rounded-md px-4 py-2" required>
                            <option value="kuliner">Kuliner</option>
                            <option value="fashion">Fashion</option>
                            <option value="kerajinan">Kerajinan</option>
                            <option value="kecantikan">Kecantikan</option>
                            <option value="otomotif">Otomotif</option>
                            <option value="agribisnis">Agribisnis</option>
                        </select>
                        <p class="text-red-500" style="font-size: 12px"><b class="text-green-700">Petunjuk: </b>
                            Pilih jenis usaha yang paling sesuai!</p>
                    </div>
                </div>
                <div class="mb-3 flex justify-between">
                    <!-- Password -->
                    <div class="w-1/2 mr-2">
                        <label for="password" class="block mb-1 text-sm font-semibold">Password</label>
                        <input type="password" id="password" name="password" class="w-full border rounded-md px-4 py-2"
                            required>
                        <p class="text-red-500" style="font-size: 12px"><b class="text-green-700">Petunjuk: </b>
                            Password harus terdiri dari minimal 8 (delapan) karakter</p>

                    </div>
                    <!-- Confirm Password -->
                    <div class="w-1/2">
                        <label for="password_confirmation" class="block mb-1 text-sm font-semibold">Konfirmasi
                            Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="w-full border rounded-md px-4 py-2" required>
                        <p class="text-red-500" style="font-size: 12px"><b class="text-green-700">Petunjuk: </b>
                            Pastikan password yang Anda masukkan sama dengan yang sebelumnya</p>
                    </div>
                </div>


                <div class="mb-4">
                    <label for="foto_profil" class="block text-gray-700 text-sm font-bold mb-2">Unggah Foto Profil
                        UMKM</label>

                    <div class="relative">
                        <input type="file" name="foto_profil" id="foto_profil"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            accept="image/*" required>
                    </div>
                    <p class="text-red-500 " style="font-size: 12px"><b>Ketentuan: </b>Maksimal ukuran yang diizinkan
                        adalah
                        2 MB</p>

                </div>

                <button type="submit"
                    class="bg-emerald-700 hover:bg-emerald-900 text-white font-bold py-3 px-4 w-full rounded-2xl focus:outline-none focus:shadow-outline text-xl">
                    Simpan
                </button>
            </div>
        </form>

        @include('user.footer')

    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var kontakInput = document.getElementById('kontak');
    
            kontakInput.addEventListener('input', function() {
                var value = this.value;
    
                // Check if the value starts with '0'
                if (value.startsWith('0')) {
                    // Replace '0' with '+62'
                    this.value = '+62' + value.slice(1);
                }
            });
        });
    </script>

@endsection
