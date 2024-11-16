@extends('components.layout')
@section('title', 'Edit UMKM')

@section('content')
    <section class="bg-emerald-100 min-h-screen">
        @include('admin.navbar')

        <div class="container mx-auto flex flex-col items-center justify-center h-40">
            <h1 class="text-4xl text-gray-900 my-auto">Halaman Edit UMKM</b></h1>
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
        <form action="{{ route('admin.user.update',  $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div
                class="container mx-auto mb-4 px-4 py-8 bg-white rounded-2xl border border-green-500 border-opacity-100 mt-4 max-w-4xl">


                <div class="mb-4 flex justify-between">
                    <div class="w-1/2 mr-2">
                        <label for="namaUmkm" class="block text-gray-700 text-sm font-bold mb-2">Nama UMKM</label>
                        <input type="text" name="namaUmkm" id="namaUmkm"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Nama" value="{{$user->namaUmkm}}" >
                        <p class="text-red-500" style="font-size: 12px"><b class="text-green-700">Petunjuk:</b> Pastikan
                            nama
                            selaras dengan identitas
                            UMKM.</p>
                    </div>
                    <div class="w-1/2">
                        <label for="namaPemilik" class="block text-gray-700 text-sm font-bold mb-2">Nama Pengelola</label>
                        <input type="text" name="namaPemilik" id="namaPemilik"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Nama Pemilik" value="{{$user->namaPemilik}}" >
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
                            placeholder="username" value="{{$user->username}}" >
                        <p class="text-red-500" style="font-size: 12px"><b class="text-green-700">Petunjuk: </b>Tuliskan
                            tanpa
                            spasi sebagai username untuk login ke platform Smart SME</p>
                    </div>
                    <div class="w-1/2">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" name="email" id="email"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="email" value="{{$user->email}}" >
                        <p class="text-red-500" style="font-size: 12px"><b class="text-green-700">Petunjuk: </b>Tuliskan
                            email
                            yang aktif dan valid </p>
                    </div>
                </div>

                <div class="mb-4 flex justify-between">
                    <div class="w-1/2 mr-2">
                        <label for="kontak" class="block text-gray-700 text-sm font-semibold mb-2">Kontak</label>
                        <input type="text" name="kontak" id="kontak"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700  leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="kontak" value="{{$user->kontak}}" >
                        <p class="text-red-500" style="font-size: 12px"><b class="text-green-700">Petunjuk: </b>Kontak harus
                            terhubung ke WhatsApp</p>
                    </div>
                    <div class="w-1/2">
                        <label for="alamat" class="block text-gray-700 text-sm font-semibold mb-2">Alamat</label>
                        <input type="text" name="alamat" id="alamat"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700  leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Alamat" value="{{$user->alamat}}" >
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
                        placeholder="Deskripsi">{{ $user->deskripsi }}</textarea>
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
                            placeholder="Link Google Map" value="{{ $user->mapLink }}" >
                        <p class="text-red-500" style="font-size: 12px"><b class="text-green-700">Petunjuk: </b>Pastikan
                            titik
                            lokasi akurat sesuai dengan lokasi sebenarnya dari UMKM.</p>
                    </div>
                    <!-- Jenis Usaha -->
                    <div class="lg:w-1/2 mr-2">
                        <label for="jenis_usaha" class="block text-gray-700 text-sm font-bold mb-2">Jenis Usaha</label>
                        <select name="jenis_usaha" id="jenis_usaha"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="kuliner" @if (old('jenis_usaha', $user->jenis_usaha) == 'kuliner') selected @endif>Kuliner</option>
                            <option value="otomotif" @if (old('jenis_usaha', $user->jenis_usaha) == 'otomotif') selected @endif>Otomotif
                            </option>
                            <option value="agribisnis" @if (old('jenis_usaha', $user->jenis_usaha) == 'agribisnis') selected @endif>Agribisnis
                            </option>
                            <option value="kecantikan" @if (old('jenis_usaha', $user->jenis_usaha) == 'kecantikan') selected @endif>Kecantikan
                            </option>
                            <option value="kerajinan" @if (old('jenis_usaha', $user->jenis_usaha) == 'kerajinan') selected @endif>Kerajinan
                            </option>
                            <option value="fashion" @if (old('jenis_usaha', $user->jenis_usaha) == 'fashion') selected @endif>Fashion</option>
                        </select>
                        <p class="text-green-800" style="font-size: 10px"><b class="text-red-700">Petunjuk:</b>
                            pilih jenis usaha yang paling sesuai dengan UMKM Anda.</p>
                    </div>
                </div>
                <div class="mb-3 flex justify-between">
                    <!-- Password -->
                    <div class="w-1/2 mr-2">
                        <label for="password" class="block mb-1 text-sm font-semibold">Password</label>
                        <input type="password" id="password" name="password" class="w-full border rounded-md px-4 py-2" value=""
                            >
                        <p class="text-red-500" style="font-size: 12px"><b class="text-green-700">Petunjuk: </b>
                            Password harus terdiri dari minimal 8 (delapan) karakter</p>

                    </div>
                    <!-- Confirm Password -->
                    <div class="w-1/2">
                        <label for="password_confirmation" class="block mb-1 text-sm font-semibold">Konfirmasi
                            Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="w-full border rounded-md px-4 py-2" >
                        <p class="text-red-500" style="font-size: 12px"><b class="text-green-700">Petunjuk: </b>
                            Pastikan password yang Anda masukkan sama dengan yang sebelumnya</p>
                    </div>
                </div>


                <div class="mb-4">
                    <label for="foto_profil" class="block text-gray-700 text-sm font-bold mb-2">Unggah Foto Profil UMKM</label>
                    <div class="relative mb-2">
                        <img src="{{ asset('storage/' . $user->foto_profil) }}" alt="Current Profile Image"
                            class="w- h-32 object-cover mx-auto">
                            
                    </div>
                    <div class="relative">
                        <input type="file" name="foto_profil" id="foto_profil"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            accept="image/*" >
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
