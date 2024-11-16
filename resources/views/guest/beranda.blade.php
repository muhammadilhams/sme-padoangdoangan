@extends('components.layout')
@section('title', 'Beranda')

@section('content')
    {{-- <body style="background:  #dcdcdc" > --}}
    @include('components.navbar')
    @php
        $defaultImage = asset('images/default-image.jpeg');
    @endphp
    {{-- Jumbotron --}}
    <div class="bg-transparent py-4 sm:px-0 md:px-10">
        <div
            class="container flex justify-between items-center
             bg-emerald-700 px-5 text-center text-lg-start my-0 shadow-lg rounded-5 rounded-lg-0">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 2">
                    <h1 class="my-3 mt-5 text-emerald-50 display-5 fw-bold ls-tight">
                        Smart SME<br />
                        <span class="text-emerald-400">Padoang-Doangan</span>
                    </h1>
                    <p class="mb-4 opacity-70 text-emerald-50">
                        Nikmati kemudahan akses data terbaru dan terpercaya dengan platform Smart SME, dirancang sebagai
                        pusat informasi pelayanan akses data untuk mendukung pertumbuhan dan kesuksesan Usaha Mikro, Kecil,
                        dan Menengah (UMKM) di Kecamatan Pangkajene, Kabupaten Pangkajene dan Kepulauan.
                    </p>
                    <!-- Register button -->
                    <button
                        class="bg-emerald-500 text-lg text-emerald-50 py-2 px-3 rounded-xl font-medium border-2 border-emerald-500  hover:bg-emerald-900 hover:border-emerald-900 transition duration-300 focus:outline-none ">
                        <a href="{{route('register')}}" class ="text-emerald-50">Daftar Sekarang</a>
                    </button>
                </div>

                <div class="col-lg-6 mb-5 mt-4 mb-lg-0 position-relative">
                    <div class="position-absolute"></div>
                    <img loading="lazy" class="p-lg-4 p-0" style="object-fit: fill; transition: transform 0.3s;"
                        src="{{ asset('images/img-jumbotron-umkm.png') }}" alt="" width="100%"
                        onmouseover="this.style.transform = 'scale(1.1)'" onmouseout="this.style.transform = 'scale(1)'">
                </div>
            </div>
        </div>
    </div>


    {{-- pusat umkm --}}
    <div id="tempatpopuler" class="container min-vh-100  mt-5 p-5 d-flex flex-column justify-content-around">
        <div class="flex justify-content-center align-items-center">
            <h1 class="text-3xl md:text-5xl lg:text-7xl text-emerald-500 font-bold tracking-tight mb-4 lg:mb-0">Tempat
                Populer</h1>
        </div>
        <div class="flex flex-col md:flex-row md:-mx-4">
            <div class="md:w-1/3 md:px-4 mb-8">
                
                    <div class="bg-white p-3 rounded-2xl shadow-md">
                        <a href="https://maps.app.goo.gl/pAeM4NwA4inaa2ELA" target="blank">
                            <img src="{{ asset('images/stadion-andi-mappe.jpg') }}" loading="lazy"
                                class="w-full h-48 md:h-64 object-cover rounded-xl" alt="Kawasan Stadion Andi Mappe pangkep"
                                alt="Google Maps"
                                onmouseover="this.style.transition='transform 0.3s ease-in-out'; this.style.transform='scale(1.1)'"
                                onmouseout="this.style.transition='transform 0.3s ease-in-out'; this.style.transform='scale(1)'">
        
                            <h6 class="text-gray-800 text-lg font-semibold text-center mt-3 ">Kawasan Stadion Andi Mappe</h6>
                            <div class="flex my-2 justify-center">
                                <a href="https://maps.app.goo.gl/pAeM4NwA4inaa2ELA"
                                    class="text-gray-800 text-sm hover:underline">
                                    Jalan Matahari</a>
                                <a class="p-0 mt-0 ml-2" title="Temukan di Google Maps"
                                    href="https://maps.app.goo.gl/pAeM4NwA4inaa2ELA">
                                    <img width="30px" src="{{ asset('images/logo-google-maps.png') }}">
                                </a>
                            </div>
                        </a>
                    </div>
            </div>
            <div class="md:w-1/3 md:px-4 mb-8">
                <a href="https://maps.app.goo.gl/ZvFW4grurUwkGpty6" target="blank">
                    <div class="bg-white p-3 rounded-2xl shadow-md" >
                        
                            <img loading="lazy" src="{{ asset('images/alun-alun-pangkep.jpg') }}"
                                class="w-full h-48 md:h-64 object-cover rounded-xl" alt="Alun-Alun (Taman Musafir) pangkep"
                                onmouseover="this.style.transition='transform 0.3s ease-in-out'; this.style.transform='scale(1.1)'"
                                onmouseout="this.style.transition='transform 0.3s ease-in-out'; this.style.transform='scale(1)'">
                            <h6 class="text-gray-800 text-lg font-semibold text-center mt-3">Alun-Alun (Taman Musafir)</h6>
                            <div class="flex my-2 justify-center">
                                <a href="https://maps.app.goo.gl/ZvFW4grurUwkGpty6"
                                    class="text-gray-800 rounded-full text-sm ">
                                    Jalan H. M Arsyad B</a>
                                <a class="p-0 mt-0 ml-2" title="Temukan di Google Maps"
                                    href="https://maps.app.goo.gl/ZvFW4grurUwkGpty6">
                                    <img width="30px" src="{{ asset('images/logo-google-maps.png') }}" alt="Google Maps">
                                </a>
                            </div>
                        
                    </div>
                </a>
            </div>
            <div class="md:w-1/3 md:px-4 mb-8">
                <div class="bg-white p-3 rounded-2xl shadow-md">
                    <a href="https://maps.app.goo.gl/m55X9EyZk8HtA5DHA" target="blank">
                        <img loading="lazy" src="{{ asset('images/bambu-runcing.jpg') }}"
                            class="w-full h-48 md:h-64 object-cover rounded-xl" alt="Taman Bambu Runcing pangkep"
                            onmouseover="this.style.transition='transform 0.3s ease-in-out'; this.style.transform='scale(1.1)'"
                            onmouseout="this.style.transition='transform 0.3s ease-in-out'; this.style.transform='scale(1)'">
                        <h6 class="text-gray-800 text-center text-lg font-semibold mt-3">Taman Bambu Runcing</h6>
                        <div class="flex my-2 justify-center">
                            <a href="https://maps.app.goo.gl/m55X9EyZk8HtA5DHA"
                                class="text-gray-800 rounded-full text-sm ">
                                Jalan Sukowati</a>
                            <a class="p-0 mt-0 ml-2" title="Temukan di Google Maps"
                                href="https://maps.app.goo.gl/m55X9EyZk8HtA5DHA">
                                <img width="30px" src="{{ asset('images/logo-google-maps.png') }}">
                            </a>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>



    {{-- Tentang Kami --}}
    <div id="tentangkami"
        class="container-fluid bg-emerald-100 min-vh-100 mt-3 p-5  text-justify align-bottom d-flex flex-column justify-content-around">
        <div class="d-flex justify-content-center align-items-center">
            <h1 class="text-3xl lg:text-7xl text-center text-emerald-500 my-2 mb-4 lg:mb-0 font-bold tracking-tight">
                Tentang Platform</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="col-span-1 py-3 border-dashed border-2 border-emerald-500 rounded-lg">
                <h3 class="text-center text-emerald-800 my-2 mb-4 font-bold tracking-tight text-2xl">Misi</h3>
                <p class="mt-4 px-4 text-emerald-800 text-justify">Misi kami sederhana: memberikan akses yang mudah dan
                    bermanfaat kepada pemilik bisnis untuk mendapatkan pengetahuan, sumber daya, dan dukungan yang
                    mereka butuhkan untuk berkembang. Kami percaya bahwa setiap bisnis, tidak peduli seberapa kecil pun,
                    memiliki potensi untuk mencapai keberhasilan yang luar biasa jika diberikan alat yang tepat dan
                    panduan yang tepat.</p>
            </div>
            <div class="col-span-1 py-3 border-dashed border-2 border-emerald-500 rounded-lg">
                <h3 class="text-center text-emerald-800 my-2 mb-4 font-bold tracking-tight text-2xl">Apa yang Ditawarkan
                </h3>
                <p class="mt-4 px-4 text-emerald-800 text-justify">Dengan Smart SME, Anda tidak hanya mendapatkan akses
                    ke berbagai artikel, panduan praktis, dan tips bisnis terbaru, tetapi Anda juga menjadi bagian dari
                    komunitas yang peduli dan berbagi pengetahuan. Di sini, Anda dapat berinteraksi dengan sesama
                    pemilik bisnis, bertukar ide, dan belajar dari pengalaman satu sama lain.</p>
            </div>
            <div class="col-span-1 py-3 border-dashed border-2 border-emerald-500 rounded-lg">
                <h3 class="text-center text-emerald-800 my-2 mb-4 font-bold tracking-tight text-2xl">Komitmen pada
                    Keberlanjutan</h3>
                <p class="mt-4 px-4 text-emerald-800 text-justify">Di Smart SME, kami tidak hanya berbicara tentang
                    kesuksesan bisnis, tetapi juga tentang masa depan yang berkelanjutan bagi generasi mendatang. Oleh
                    karena itu, kami berkomitmen untuk mendorong praktik bisnis yang bertanggung jawab secara sosial dan
                    lingkungan.</p>
            </div>
        </div>
    </div>

    {{-- daftar Produk --}}
    <div class="bg-gray-50 mb-3">
        <div id="etalaseproduk" class="container min-vh-100 mt-3 p-5 d-flex flex-column justify-around">
            <div class="d-flex justify-content-center align-items-center">
                <h1 class="text-3xl lg:text-7xl text-center text-emerald-500 my-2 mb-4 lg:mb-0 font-bold tracking-tight">
                    Etalase Produk UMKM</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-8">
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
            <div class="flex justify-center mt-4">
                <a href="{{ route('product.list') }}"
                    class="bg-emerald-600 hover:bg-emerald-800 text-white font-semibold px-6 py-3 rounded-pill">
                    Tampilkan Selengkapnya >>
                </a>
            </div>
        </div>
    </div>



    {{-- daftar UMKM --}}
    <div class="bg-gray-50 ">
        <div id="etalaseumkm" class="container  min-vh-100 mt-3 p-5 d-flex flex-column justify-between">
            <div class="d-flex justify-content-center align-items-center">
                <h1 class="text-3xl lg:text-7xl text-center text-emerald-500 my-2 mb-4 lg:mb-0 font-bold tracking-tight">
                    Etalase UMKM</h1>
            </div>
            <div class="grid grid-cols-1  md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-8">
                @foreach ($users as $user)
                    <a href="{{ route('umkm.detail', $user->id) }}">
                        <div class="bg-white rounded-2xl shadow-md overflow-hidden p-3">
                            <div class="flex bg-white rounded-full items-center  justify-center">
                                @if ($user->foto_profil)
                                    <img loading="lazy" class="w-48 h-48 rounded-lg shadow-md"
                                        src="{{ asset('storage/' . $user->foto_profil) }}" alt="{{ $user->namaUmkm }}">
                                @else
                                    <img class="w-48 h-48 rounded-lg shadow-md " src="{{ asset('images/umkm-default-pp.png') }}"
                                        alt="Default Image">
                                @endif
                            </div>

                            <div class="mt-2">
                                <h3 class="text-gray-800 text-sm font-semibold mb-2">{{ $user->namaUmkm }}</h3>
                                <p class="text-gray-700 mb-2 flex text-sm items-center">
                                    <i class="fas fa-map-marker-alt mr-2"></i>{{ $user->alamat }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="flex justify-center  mt-4">
                <a href="{{ route('umkm.list') }}"
                    class="bg-emerald-600 hover:bg-emerald-800 text-white font-semibold px-6 py-3 rounded-pill">
                    Tampilkan Selengkapnya >>
                </a>
            </div>
        </div>
    </div>




    {{-- start peta --}}
    <div id="peta" class="container px-4 py-3 px-md-5 text-center text-lg-start my-0 shadow-lg mt-3 bg-emerald-800">
        <div class="row p-0 pb-3 gx-lg-5 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 2">
                <h1 class="my-3 display-5 fw-bold ls-tight" style="color: 	hsl(94, 49%, 92%)">Temukan Kami</h1>
                <p class="m-0 p-0" style="font-size: 23px;color: 	hsl(94, 49%, 92%)">Kelurahan Padoang-Doangan <br>
                    <span style="font-size: 20px;color: 	hsl(94, 49%, 92%)">Kecamatan Pangkajene, Kabupaten Pangkajene
                        dan Kepulauan</span>
                </p>
                <p></p>
            </div>

            <div class="col-lg-6 col-12 p-0 mb-5 mt-4 mb-lg-0 pe-lg-4">
                <div class="iframe-container rounded-2 position-relative overflow-hidden">
                    <iframe class="rounded-2"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15902.414503358297!2d119.54448679749287!3d-4.837921972201546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbe4e2b7105d1d5%3A0xe2b26ddc15ce1148!2sPadoang%20Doangan%2C%20Pangkajene%2C%20Pangkajene%20and%20Islands%20Regency%2C%20South%20Sulawesi!5e0!3m2!1sen!2sid!4v1705944712268!5m2!1sen!2sid"
                        width="100%" height="450vh" style="border:0; transition: transform 0.3s;" allowfullscreen=""
                        onmouseover="this.style.transform = 'scale(1.1)'" onmouseout="this.style.transform = 'scale(1)'"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

    {{-- end peta --}}


    {{-- footer --}}
    @include('components.footer')
@endsection
