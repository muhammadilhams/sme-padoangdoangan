@extends('components.layout')
@section('title', 'Etalase UMKM')

@section('content')
    @include('components.navbar')
    <div class="container mx-auto px-4 flex-grow">


        <div class="container mb-6 mx-auto flex flex-col items-center justify-center h-64">
            <h1 class="text-5xl text-center text-emerald-700 font-semibold mb-3 my-auto">Etalase UMKM
                <span>
                    <p class="text-gray-500  text-sm max-w-lg">Temukan Keunikan UMKM di Kelurahan Padoang-Doangan</p>
                </span>
            </h1>
            <!-- Search Box -->
            <div class="container mb-4">
                <form action="{{ route('umkm.list') }}" method="GET" class="flex justify-center">
                    <div class="flex items-center" >
                        <input type="text" name="search" value="{{ $query ?? '' }}" placeholder="Cari UMKM..."
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
            @if ($noUsersFound)
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

        <div class="flex justify-between items-center mt-8">
            <p class="text-gray-600">
                Menampilkan Hasil {{ $users->firstItem() }} - {{ $users->lastItem() }} dari Total {{ $users->total() }}
                UMKM.
            </p>
            <div class="flex items-center space-x-4">
                @if ($users->onFirstPage())
                    <span class="px-2 py-1 text-gray-400 rounded-md cursor-not-allowed"><i
                            class="fas fa-angle-double-left"></i></span>
                @else
                    <a href="{{ $users->previousPageUrl() }}"
                        class="px-2 py-1  text-white bg-emerald-500 text-2xl rounded-full hover:bg-emerald-800"><i
                            class="fas fa-angle-double-left"></i></a>
                @endif

                @if ($users->hasMorePages())
                    <a href="{{ $users->nextPageUrl() }}"
                        class="px-2 py-1 text-white bg-emerald-500 text-2xl rounded-full hover:bg-emerald-800"><i
                            class="fas fa-angle-double-right"></i></a>
                @else
                    <span class="px-2 py-1 text-gray-400 rounded-md cursor-not-allowed"><i
                            class="fas fa-angle-double-right"></i></span>
                @endif
            </div>

        </div>
    </div>




    @include('components.footer')
@endsection
