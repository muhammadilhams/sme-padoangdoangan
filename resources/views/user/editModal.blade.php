<div id="editModal" class="fixed inset-0 z-1 overflow-auto  justify-center items-center hidden w-full"
    style="background-color: rgba(0, 0, 0, 0.5);">
    <div
        class="bg-white rounded-2xl p-4 mt-5  mb-3 max-w-lg w-full md:w-3/4 lg:w-1/2 backdrop-blur-lg backdrop-filter bg-opacity-100" style="padding-top:40px">
        <div class="flex justify-end">
            <button id="closeEditModal" class="text-gray-500 hover:text-gray-700 focus:outline-none lg:pt-0 sm:pt-5 mt-8">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        @if ($errors->any())
            <div class="container max-w-md bg-rose-400 border text-white px-4 py-3 rounded relative mb-3"
                role="alert">
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
            <h2 class="mx-auto px-2 font-semibold text-2xl">Edit Profil <span><b>{{ $user->namaUmkm }}</b></span></h2>
            <div
                class="container shadow-sm  border-emerald-800 border-1  mx-auto px-3 py-2 bg-white rounded-2xl  border-opacity-100 max-w-md">

                <div class="flex justify-between mb-0">

                    <div class="lg:w-1/3 mr-2">
                        <label for="namaPemilik" class="block text-gray-700 text-sm font-bold mb-2">Nama Pengelola</label>
                        <input type="text" name="namaPemilik" id="namaPemilik"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Nama Pemilik" value="{{ $user->namaPemilik }}">
                        <p class="text-green-800" style="font-size: 10px"><b>Saran:</b> Masukkan nama lengkap Anda
                            sebagai pengelola UMKM</p>
                    </div>
                    <div class="lg:w-1/3 mr-2">
                        <label for="namaUmkm" class="block text-gray-700 text-sm font-bold mb-2">Nama UMKM</label>
                        <input type="text" name="namaUmkm" id="namaUmkm"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Nama UMKM" value="{{ $user->namaUmkm }}">
                        <p class="text-green-800" style="font-size: 10px"><b>Saran:</b> Pastikan nama selaras dengan
                            identitas UMKM Anda."</p>
                    </div>
                    <div class="lg:w-1/3 mr-2">
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

                <!-- Kontak and Map Link -->
                <div class="flex justify-between mb-0">
                    <div class="w-1/2 mr-2">
                        <label for="kontak" class="block text-gray-700 text-sm font-semibold mb-2">Kontak</label>
                        <input type="text" name="kontak" id="kontak"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 placeholder-red-400 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Kontak" value="{{ $user->kontak }}">
                        <p class="text-green-800" style="font-size: 10px"><b class="text-red-700">Petunjuk:</b>
                            Kontak harus terhubung ke WhatsApp</p>

                    </div>
                    <div class="w-1/2 ml-2">
                        <label for="mapLink" class="block text-gray-700 text-sm font-semibold mb-2">Link Google
                            Map</label>
                        <input type="text" name="mapLink" id="mapLink"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 placeholder-red-400 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Link Google Map" value="{{ $user->mapLink }}">
                        <p class="text-red-500" style="font-size: 10px"><b>Saran:</b> Pastikan titik lokasi yang Anda
                            berikan akurat sesuai dengan lokasi sebenarnya dari UMKM Anda.</p>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="w-full mb-0">
                    <label for="deskripsi" class="block text-gray-700 text-sm font-semibold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi"
                        class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Deskripsi">{{ $user->deskripsi }}</textarea>
                    <p class="text-green-800 mb-0" style="font-size: 10px"><b class="text-red-700">Ketentuan:
                            </b>Jumlah karakter tidak boleh melebihi 225 karakter.</p>
                    <p class="text-red-500 " style="font-size: 10px"><b>Saran:</b> Informasi yang mendalam,
                        deskriptif, dan penuh makna memberikan
                        pemahaman yang komprehensif tentang UMKM Anda.</p>
                </div>
                <!-- Alamat dan Foto Profil-->
                <div class="flex justify-between mb-0">
                    <div class="w-1/2 mr-2">
                        <label for="alamat" class="block text-gray-700 text-sm font-semibold mb-2">Alamat</label>
                        <input type="text" name="alamat" id="alamat"
                            class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 placeholder-red-400 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Alamat" value="{{ $user->alamat }}">
                        <p class="text-green-800" style="font-size: 10px"><b class="text-red-700">Petunjuk:
                            </b>Tuliskan tanpa menyertakan nama kecamatan dan kabupaten</p>
                    </div>
                    <div class="w-1/2 mr-2">
                        <label for="foto_profil" class="block text-gray-700 text-sm font-bold mb-2">Foto
                            Profil</label>
                        <div class="relative mb-2">
                            <img src="{{ asset('storage/' . $user->foto_profil) }}" alt="Current Profile Image"
                                class="w-24 h-24 object-cover mx-auto">
                        </div>
                        <div class="relative">
                            <input type="file" name="foto_profil" id="foto_profil"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                accept="image/*">
                        </div>
                        <p class="text-red-500 " style="font-size: 10px"><b>Ketentuan: </b>Maksimal ukuran yang
                            diizinkan adalah
                            2 MB</p>

                    </div>
                </div>

                <button type="submit"
                    class="bg-emerald-700 hover:bg-emerald-900 text-white font-bold py-2 px-4 w-full rounded focus:outline-none focus:shadow-outline">
                    Simpan
                </button>
            </div>
        </form>


    </div>
</div>
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
