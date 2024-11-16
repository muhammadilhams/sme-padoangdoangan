<div id="userModal" class="fixed inset-0 z-1 overflow-auto  justify-center items-center hidden w-full"
    style="background-color: rgba(0, 0, 0, 0.5);">
    <div
        class="bg-white rounded-2xl p-4 mt-5  mb-3 max-w-lg w-full md:w-3/4 lg:w-1/2 backdrop-blur-lg backdrop-filter bg-opacity-100" style="padding-top:40px">
        <div class="flex justify-end">
            <button id="closeUserModal" class="text-gray-500 hover:text-gray-700 focus:outline-none lg:pt-0 sm:pt-5 mt-8">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <!-- User information will be displayed here -->
        <div class="flex flex-col items-center">
            <div class="flex bg-white rounded-full items-center p-2 justify-center">
                @if($user->foto_profil)
                    <img class="w-40 h-40 rounded-full shadow-md" src="{{ asset('storage/'. $user->foto_profil) }}" alt="{{ $user->namaUmkm }}">
                @else
                    <img class="w-auto h-24 p-1 " src="{{ asset('images/umkm-default-pp.png') }}" alt="Default Image">
                @endif
            </div>
            
            <div class="text-center mt-1">
                <h2 class="text-2xl font-semibold">{{ $user->namaUmkm }}</h2>
                <p class="text-gray-500">{{ $user->email }}</p>
            </div>
            <div class="text-left w-full mt-1">
                <div class="text-left w-full mt-1">
                    <div class="flex flex-wrap -mx-2">
                        <!-- Username Section -->
                        <div class="mb-2 w-full md:w-1/2 px-2">
                                <h3 class="text-lg  font-semibold mb-2 flex items-center">
                                    <i class="fas fa-user text-emerald-500 mr-2"></i>
                                    Username
                                </h3>
                                <div class="flex items-center shadow-sm  justify-center bg-white text-emerald-900 rounded-xl p-2">
                                   
                               {{ $user->username }}
                            </div>
                        </div>
                
                        <!-- Manager Section -->
                        <div class="mb-2 w-full md:w-1/2 px-2">
                                <h3 class="text-lg  font-semibold mb-2 flex items-center">
                                    <i class="fas fa-user text-emerald-500 mr-2"></i>
                                    Pengelola
                                </h3>
                                <div class="flex items-center shadow-sm  justify-center bg-white text-emerald-900 rounded-xl p-2">
                                
                                {{ $user->namaPemilik }}
                            </div>
                        </div>
                
                        <!-- Address Section -->
                        <div class="mb-2 w-full md:w-1/2 px-2">
                            <div class="flex items-center justify-start bg-white p-3 rounded-lg shadow-sm">
                                <i class="fas fa-map-marker-alt text-emerald-500 mr-2"></i>
                                {{ $user->alamat }}
                            </div>
                        </div>
                
                        <!-- Contact Section -->
                        <div class="mb-2 w-full md:w-1/2 px-2">
                            <div class="flex items-center justify-start bg-white p-3 rounded-lg shadow-sm">
                                <i class="fas fa-phone-alt text-emerald-500 mr-2"></i>
                                {{ $user->kontak }}
                            </div>
                        </div>
                
                        <!-- Description Section -->
                        <div class="mb-3 w-full px-2">
                            <h3 class="text-lg font-semibold mb-2 flex items-center">
                                <i class="fas fa-info-circle text-emerald-500 mr-2"></i> Deskripsi
                            </h3>
                            <div class="flex items-center justify-center shadow-sm   bg-white text-emerald-900 rounded-xl p-3">
                                <p>{{ $user->deskripsi }}</p>
                            </div>
                        </div>
                
                        <!-- Business Type and Map Link Section -->
                        <div class="flex flex-wrap w-full -mx-2">
                            <!-- Business Type Section -->
                            <div class="mb-4 w-full md:w-1/2 px-2">
                                <h3 class="text-lg  font-semibold mb-2 flex items-center">
                                    <i class="fas fa-briefcase text-emerald-500 mr-2"></i>
                                    Jenis Usaha
                                </h3>
                                <div class="flex items-center shadow-sm  justify-center bg-white text-emerald-900 rounded-xl p-2">
                                    
                                        @if($user->jenis_usaha == 'kuliner')
                                        <i class="fas fa-utensils text-emerald-500 mr-2"></i>
                                    @elseif($user->jenis_usaha == 'otomotif')
                                        <i class="fas fa-car text-emerald-500 mr-2"></i>
                                    @elseif($user->jenis_usaha == 'agribisnis')
                                        <i class="fas fa-seedling text-emerald-500 mr-2"></i>
                                    @elseif($user->jenis_usaha == 'kecantikan')
                                        <i class="fas fa-spa text-emerald-500 mr-2"></i>
                                    @elseif($user->jenis_usaha == 'kerajinan')
                                        <i class="fas fa-hand-sparkles text-emerald-500 mr-2"></i>
                                    @elseif($user->jenis_usaha == 'fashion')
                                        <i class="fas fa-tshirt text-emerald-500 mr-2"></i>
                                    @else
                                        <i class="fas fa-briefcase text-emerald-500 mr-2"></i>
                                    @endif
                                        {{ $user->jenis_usaha }}
                                </div>
                            </div>
                
                            <!-- Map Link Section -->
                            <div class="mb-4 w-full md:w-1/2 px-2">
                                <h3 class="text-lg font-semibold mb-2 flex items-center">
                                    <i class="fas fa-map-marker-alt text-emerald-500 mr-2"></i> Location
                                </h3>
                                <div class="flex items-center justify-center">
                                    <a href="{{ $user->mapLink }}" target="blank" class="text-white shadow-sm  border-orange-400 border-2  bg-orange-400 hover:bg-orange-700 hover:text-white rounded-xl p-2 w-full text-center">
                                        Buka di Google Map >>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
            
            {{-- <div class="flex items-center justify-center w-full">
                <a href="{{ route('user.edit') }}" 
                    class="bg-orange-500 border border-emerald-800 transition duration-300 text-center hover:bg-orange-800 text-white rounded-xl p-2 w-full">Edit
                    Profil</a>
            </div> --}}
        </div>
    </div>
</div>
