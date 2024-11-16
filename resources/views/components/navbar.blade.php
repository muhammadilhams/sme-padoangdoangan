<nav class="bg-transparent py-3">
    <div class="container mx-auto px-5 flex justify-between items-center">
        <a class="text-army text-lg font-bold px-0 mx-0" href="{{ route('beranda') }}">
            <img src="{{ asset('images/logo-smart-sme.png') }}" width="100px" alt="Smart-Umkm-Logo" />
        </a>
        <button id="burgerButton" class="text-army block lg:hidden focus:outline-none">
            <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M3 18.75C3 19.1642 3.33579 19.5 3.75 19.5H20.25C20.6642 19.5 21 19.1642 21 18.75C21 18.3358 20.6642 18 20.25 18H3.75C3.33579 18 3 18.3358 3 18.75ZM3.75 14.25C3.33579 14.25 3 13.9142 3 13.5C3 13.0858 3.33579 12.75 3.75 12.75H20.25C20.6642 12.75 21 13.0858 21 13.5C21 13.9142 20.6642 14.25 20.25 14.25H3.75ZM3 7.25C3 7.66421 3.33579 8 3.75 8H20.25C20.6642 8 21 7.66421 21 7.25C21 6.83579 20.6642 6.5 20.25 6.5H3.75C3.33579 6.5 3 6.83579 3 7.25Z" />
            </svg>
        </button>
        <div id="navbarMenu" class="hidden lg:flex lg:items-center lg:w-auto transition-all duration-300 ease-in-out">
            <ul class="text-lg font-medium lg:flex-grow lg:flex my-3 justify-center lg:gap-6">
                <li class="nav-item">
                    <a class="text-emerald-600 hover:text-emerald-900 transition duration-300"
                        href="{{ route('beranda') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="text-emerald-600 hover:text-emerald-900 transition duration-300"
                        href="{{ route('beranda') }}/#tentangkami">Tentang</a>
                </li>
                
                <li class="nav-item">
                    <a class="text-emerald-600 hover:text-emerald-900 transition duration-300"
                        href="{{ route('beranda') }}/#peta">Peta</a>
                </li>
                <li class="nav-item">
                    <a class="text-emerald-600 hover:text-emerald-900 transition duration-300"
                        href="{{ route('beranda') }}/#footer">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="text-emerald-600 hover:text-emerald-900 transition duration-300"
                        href="{{ route('umkm.list') }}">Etalase UMKM</a>
                </li>
                <li class="nav-item">
                    <a class="text-emerald-600 hover:text-emerald-900 transition duration-300"
                        href="{{ route('product.list') }}">Etalase Produk</a>
                </li>
            </ul>
            <div class="lg:ml-6 sm:mt-4 lg:mt-0 flex flex-col lg:flex-row gap-2 lg:gap-0">
                <a href="{{ route('loginform') }}"
                    class="bg-gray-300 text-lg text-gray-500 py-2 px-3 rounded-xl font-medium border-2 border-gray-300 hover:bg-gray-500 hover:text-white hover:border-gray-500 transition duration-300 focus:outline-none lg:flex lg:flex-row">Masuk</a>
                <a href="#" id="registerButton"
                    class="bg-emerald-500 text-lg text-emerald-50 py-2 px-3 rounded-xl font-medium border-2 border-emerald-500  hover:bg-emerald-700 hover:border-emerald-700 transition duration-300 focus:outline-none lg:flex lg:flex-row">Daftar</a>
            </div>
        </div>
    </div>
</nav>

<div id="navbarDropdown" class="hidden bg-emerald-50 lg:hidden transition-all duration-300 ease-in-out">
    <ul class="text-lg font-medium flex flex-col items-start mx-4 py-3 space-y-2">
        <li class="nav-item">
            <a class="text-emerald-600 text-sm hover:text-emerald-900 transition duration-300"
                href="{{ route('beranda') }}">Beranda</a>
        </li>
        <li class="nav-item">
            <a class="text-emerald-600 text-sm hover:text-emerald-900 transition duration-300"
                href="{{ route('beranda') }}/#tentangkami">Tentang</a>
        </li>
       
        <li class="nav-item">
            <a class="text-emerald-600 text-sm hover:text-emerald-900 transition duration-300"
                href="{{ route('beranda') }}/#peta">Peta</a>
        </li>
        <li class="nav-item">
            <a class="text-emerald-600 text-sm hover:text-emerald-900 transition duration-300"
                href="{{ route('beranda') }}/#footer">Kontak</a>
        </li>
        <li class="nav-item">
            <a class="text-emerald-600 text-sm hover:text-emerald-900 transition duration-300"
                href="{{ route('umkm.list') }}">Etalase UMKM</a>
        </li>
        <li class="nav-item">
            <a class="text-emerald-600 text-sm hover:text-emerald-900 transition duration-300"
                href="{{ route('product.list') }}">Etalase Produk</a>
        </li>
        <div class="flex flex-row mt-4">
            <li class="nav-item">
                <a href="{{ route('loginform') }}"
                    class="bg-gray-300 text-lg text-gray-500 py-2 px-3 rounded-xl font-medium border-2 border-gray-300 hover:bg-gray-500 hover:text-white hover:border-gray-500 transition duration-300 focus:outline-none lg:flex lg:flex-row">Masuk</a>
            </li>
            <li class="nav-item ml-2">
               <a href="#" id="registerButtonDropdown"
                    class="bg-emerald-500 text-lg text-emerald-50 py-2 px-3 rounded-xl font-medium border-2 border-emerald-500  hover:bg-emerald-700 hover:border-emerald-700 transition duration-300 focus:outline-none lg:flex lg:flex-row">Daftar</a>
            </li>
        </div>

    </ul>

</div>
<div id="confirmationModal"
    class="hidden fixed inset-0 z-50 overflow-y-auto bg-gray-900 bg-opacity-75 p-4 md:p-8 transition-all duration-300 ease-in-out">
    <div id="modalContent"
        class="relative w-full bg-white max-w-lg mx-auto md:border rounded-2xl shadow-md transform transition-all duration-300 ease-in-out">
        <div class="modal-header flex items-center px-4 pt-4 mb-0 border-gray-700 rounded-t-lg" style="padding-left:20px;">
            <h5 class="text-lg font-medium leading-normal text-emerald-700">Petunjuk!</h5>
            <!--<button type="button" id="closeModal" class="close" aria-label="Close" style="padding-right:20px;>-->
            <!--    <span class="text-gray-600" aria-hidden="true">&times;</span>-->
            <!--</button>-->
        </div>
        <div class="modal-body p-4 mt-0 text-gray-700 ">
            <h2 class="font-bold text-lg mb-3">Untuk memulai pendaftaran, Anda perlu menyediakan:</h2>
            
                <li class="font-semibold text-emerald-700">Nama UMKM</li>
                <li class="font-semibold text-emerald-700">Email aktif</li>
                
                <li class="font-semibold text-emerald-700">Link Google Maps</li>
                <li class="font-semibold text-emerald-700">Kontak WhatsApp</li>
                <li class="font-semibold text-emerald-700">Logo UMKM (Opsional)</li>
            
            <p class="mt-3">Apakah Anda sudah siap? Mari kita mulai!</p>
        </div>
        <div class="modal-footer flex items-center justify-end px-4 pb-4 border-t border-gray-700 rounded-b-lg gap-2">
            
                <a href="{{route('beranda')}}" type="button" id="cancelButton"
                    class="bg-gray-300 text-sm text-gray-500 py-2 mr-2 px-3 rounded-xl font-medium border-2 border-gray-300 hover:bg-gray-500 hover:text-white hover:border-gray-500 transition duration-300 focus:outline-none">Kembali</a>
            
            <button type="submit">
                <a href="{{ route('registerform') }}" id="confirmButton"
                    class="bg-emerald-500 text-sm text-emerald-50 py-2 px-3 rounded-xl font-medium border-2 border-emerald-500  hover:bg-emerald-700 hover:border-emerald-700 transition duration-300">Lanjut
                    Mendaftar</a>
            </button>
        </div>
    </div>
</div>
<script>
    const burgerButton = document.getElementById('burgerButton');
    const navbarDropdown = document.getElementById('navbarDropdown');
    const registerButton = document.getElementById('registerButton');
    const registerButtonJumbotron = document.getElementById('registerButtonJumbotron');
    const registerButtonDropdown = document.getElementById('registerButtonDropdown');
    const confirmationModal = document.getElementById('confirmationModal');
    const modalContent = document.getElementById('modalContent');
    const cancelButton = document.getElementById('cancelButton');
    const closeModal = document.getElementById('closeModal');

    const showModal = () => {
        confirmationModal.classList.remove('hidden');
        confirmationModal.classList.add('fade-in');
        modalContent.classList.add('slide-up');
        modalContent.classList.remove('slide-down');
    };

    const hideModal = () => {
        confirmationModal.classList.remove('fade-in');
        confirmationModal.classList.add('fade-out');
        modalContent.classList.add('slide-down');
        modalContent.classList.remove('slide-up');
        setTimeout(() => {
            confirmationModal.classList.add('hidden');
            confirmationModal.classList.remove('fade-out');
        }, 300); // Match this duration with the CSS transition duration
    };

    burgerButton.addEventListener('click', () => {
        navbarDropdown.classList.toggle('hidden');
        navbarDropdown.classList.toggle('flex');
        navbarDropdown.classList.add('fade-in');
    });

    registerButton.addEventListener('click', (event) => {
        event.preventDefault(); // Prevent default link behavior
        showModal(); // Show confirmation modal
    });
    

    registerButtonDropdown.addEventListener('click', (event) => {
        event.preventDefault(); // Prevent default link behavior
        showModal(); // Show confirmation modal
    });

    cancelButton.addEventListener('click', hideModal);
    closeModal.addEventListener('click', hideModal);
</script>
<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(100%);
        }

        to {
            transform: translateY(0);
        }
    }

    @keyframes slideDown {
        from {
            transform: translateY(0);
        }

        to {
            transform: translateY(100%);
        }
    }

    .fade-in {
        animation: fadeIn 0.3s forwards;
    }

    .fade-out {
        animation: fadeOut 0.3s forwards;
    }

    .slide-up {
        animation: slideUp 0.3s forwards;
    }

    .slide-down {
        animation: slideDown 0.3s forwards;
    }
</style>
