@extends('auth.layout')
@section('title', 'Registrasi')

@section('content')
    <section class="background-radial-gradient flex justify-center overflow-hidden "
        style="min-height: 100vh; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">
        {{--  flex justify-center : mengatur agar elemen didalam parent (row) berada di tengah --}}
        <div class="mx-auto px-4 py-8 d-flex align-items-center">
            <div class="row lg:flex justify-between items-start">
                <!-- Bagian Kiri - Selamat Datang -->
                <div class="col mb-8 px-5 lg:mb-0 ">
                    <h1 class="mb-3 sm:mt-2 lg:mt-40 text-3xl lg:text-6xl  lg:text-start font-bold text-white dark:text-gray-800"
                        style="color:hsl(151, 40%, 24%)">
                        Smart SME: <br> <span>
                            <h3 class="text-lg lg:text-xl"> Langkah Pertama Menuju Kesuksesan Bisnis Anda!</h3>
                        </span>
                    </h1>
                    
                    <p
                        class="mb-4 text-justify lg:text-start text-white dark:text-gray-600 whitespace-normal lg:max-w-[50rem]">
                        Platform ini menyediakan akses data terkini dan terpercaya yang membantu pelaku usaha lokal dalam
                        mengembangkan bisnis mereka. </p>
                        <div class="hidden lg:block mt-7">
                            <a href="{{ route('beranda') }}"
                                class="bg-emerald-600 text-white px-3 py-3 rounded-xl text-lg hover:bg-emerald-900 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <i class="fas fa-home mr-2"></i> Kembali ke Beranda
                            </a>
                        </div>
                </div>
                

                <!-- Bagian Kanan - Form Login -->
                <div class="col lg:w-1/2 mx-8 px-2 lg:px-8">
                    <div
                        class="bg-white dark:bg-gray-800 rounded-3xl shadow-lg py-8 px-6 lg:px-12 backdrop-blur-lg backdrop-filter bg-opacity-50">
                        <h2 class="text-xl lg:text-3xl font-bold text-gray-800 ">Halaman Registrasi</h2>
                        <p class="text-sm mb-8 mt-1 text-green-800">Sudah punya akun? <span><a
                                    class="hover:underline text-red-500" href="{{ route('loginform') }}">Masuk di
                                    Sini</a></span></p>

                        {{-- error alert --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Name input -->
                            <div class="mb-2">
                                <label for="namaUmkm" class="block mb-1 text-sm font-semibold">Nama UMKM</label>
                                <input type="text" id="namaUmkm" name="namaUmkm"
                                    class="w-full border-gray-300 rounded-md px-4 py-2" placeholder="Contoh: Smart SME" required>
                                <p class="text-green-800" style="font-size: 12px"><b>Saran:</b> Pastikan nama selaras dengan
                                    identitas UMKM Anda, mencerminkan visi dan misi UMKM, serta mudah diingat oleh
                                    pelanggan."</p>
                            </div>
                            <!-- Nama Pemilik -->
                            <div class="mb-4">
                                <label for="namaPemilik" class="block mb-1 text-sm font-semibold">Nama Pengelola</label>
                                <input type="text" id="namaPemilik" name="namaPemilik"
                                    class="w-full border-gray-300 rounded-md px-4 py-2" placeholder="" required>
                                <p class="text-green-800" style="font-size: 12px"><b>Saran:</b> Masukkan nama lengkap Anda
                                    sebagai pengelola UMKM</p>

                            </div>
                            <!-- Username -->
                            <div class="mb-4">
                                <label for="username" class="block mb-1 text-sm font-semibold">Username</label>
                                <input type="text" id="username" name="username"
                                    class="w-full border-gray-300 rounded-md px-4 py-2" placeholder="contoh: smartsme" required>
                                <p class="text-green-800" style="font-size: 12px"><b class="text-red-700">Petunjuk:</b>
                                    Tuliskan tanpa spasi sebagai username untuk login ke platform Smart SME</p>

                            </div>
                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="block mb-1 text-sm font-semibold">Email</label>
                                <input type="email" id="email" name="email"
                                    class="w-full border-gray-300 rounded-md px-4 py-2" placeholder="contoh: smartsme@gmail.com"
                                    required>
                                <p class="text-green-800" style="font-size: 12px"><b class="text-red-700">Petunjuk:</b>
                                    Gunakan email yang aktif dan valid untuk memastikan Anda menerima semua informasi
                                    penting dan pembaruan dari platform Smart SME.</p>
                            </div>
                            <!-- Alamat -->
                            <div class="mb-4">
                                <label for="alamat" class="block mb-1 text-sm font-semibold">Alamat</label>
                                <input type="text" id="alamat" name="alamat"
                                    class="w-full border-gray-300 rounded-md px-4 py-2" placeholder="contoh: Jl. Matahari No.13"
                                    required>
                                <p class="text-green-800 " style="font-size: 12px"><b>Saran:</b> Alamat lengkap akan
                                    mempermudah pengguna menemukan UMKM Anda.</p>
                                <p class="text-green-800" style="font-size: 12px"><b class="text-red-700">Petunjuk:
                                    </b>Tuliskan tanpa menyertakan nama kecamatan dan kabupaten.</p>

                            </div>
                            {{-- kontak --}}
                            <div class="mb-4">
                                <label for="kontak" class="block mb-1 text-sm font-semibold">Kontak</label>
                                <input type="text" id="kontak" name="kontak"
                                    class="w-full border-gray-300 rounded-md px-4 py-2" placeholder="contoh: +6285123456789" required>
                                <p class="text-green-800" style="font-size: 12px"><b class="text-red-700">Petunjuk:</b>
                                    Kontak harus terhubung ke WhatsApp untuk mempermudah pengguna menghubungi Anda dengan
                                    cepat dan mudah!</p>
                            </div>
                            <!-- Jenis Usaha -->
                            <div class="mb-4">
                                <label for="jenis_usaha" class="block mb-1 text-sm font-semibold">Jenis Usaha</label>
                                <select id="jenis_usaha" name="jenis_usaha"
                                    class="w-full border-gray-300 rounded-md px-4 py-2">
                                    <option value="kuliner">Kuliner</option>
                                    <option value="fashion">Fashion</option>
                                    <option value="kerajinan">Kerajinan</option>
                                    <option value="kecantikan">Kecantikan</option>
                                    <option value="otomotif">Otomotif</option>
                                    <option value="agribisnis">Agribisnis</option>
                                </select>
                                <p class="text-green-800" style="font-size: 12px"><b class="text-red-700">Petunjuk:</b>
                                    pilih jenis usaha yang paling sesuai dengan UMKM Anda. Ini akan membantu kami
                                    menyesuaikan dengan kebutuhan pengguna!</p>
                            </div>
                            <!-- Password -->
                            <div class="mb-4">
                                <label for="password" class="block mb-1 text-sm font-semibold">Password</label>
                                <input type="password" id="password" name="password"
                                    class="w-full border-gray-300 rounded-md px-4 py-2" required>
                                <p class="text-green-800" style="font-size: 12px"><b class="text-red-700">Petunjuk:</b>
                                    Password harus terdiri dari minimal 8 (delapan) karakter.</p>

                            </div>
                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="block mb-1 text-sm font-semibold">Konfirmasi
                                    Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="w-full border-gray-300 rounded-md px-4 py-2" required>
                                <p class="text-green-800" style="font-size: 12px"><b class="text-red-700">Petunjuk:</b>
                                    Pastikan password yang Anda masukkan sama dengan yang sebelumnya.</p>
                            </div>
                            <!-- Foto Profil (Optional) -->
                            <div class="mb-4">
                                <label for="foto_profil" class="block mb-1 text-sm font-semibold">Unggah Foto
                                    Profil <span class="text-sm font-normal">(Opsional)</span></label>
                                <input type="file" name="foto_profil" id="foto_profil"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    accept="image/*">
                                <p class="text-green-800 " style="font-size: 12px"><b>Saran:</b> Pastikan foto profil yang
                                    Anda unggah memperlihatkan identitas UMKM Anda dengan jelas.</p>
                                <p class="text-red-500 " style="font-size: 12px"><b>Ketentuan: </b>Maksimal ukuran yang
                                    diizinkan
                                    adalah
                                    2 MB</p>
                            </div>
                            <!-- Submit -->
                            <div class="flex items-center justify-center">
                                <button type="submit"
                                    class="bg-green-600 text-white px-4 py-2 rounded-md w-full text-xl font-bold hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Daftar</button>
                            </div>

                        </form>
                    </div>
                </div>

                {{-- tombol kembali ke beranda --}}
                <div class="fixed lg:hidden left-0 bottom-0 mb-5 ml-5 lg">
                    <a href="{{ route('beranda') }}"
                        class="bg-emerald-500 text-white px-3 py-3 rounded-full text-xl hover:bg-emerald-900 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <i class="fas fa-home"></i>
                    </a>
                </div>
            </div>
        </div>



    </section>
@endsection
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
