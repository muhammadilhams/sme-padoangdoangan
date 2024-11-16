<nav class="px-3 py-1 bg-zinc-100 w-full">
    <div class="container mx-auto px-3 py-0 bg-zinc-100">
        <div class="flex items-center justify-between">
            <a class="text-army text-lg font-bold" href="{{route('beranda')}}">
                <img src="{{ asset('images/logo-smart-sme.png') }}" width="100px" alt="Smart-Sme-Logo"  />
            </a>
            <div class="flex items-center justify-center space-x-4">
                <a href="{{ route('products.index') }}" class="bg-emerald-700 sm:mr-0 lg:mr-3 text-emerald-50 px-3 py-2 rounded-lg lg:text-lg sm:text-sm border border-emerald-700 hover:bg-white hover:text-emerald-700 hover:border-emerald-700 transition duration-300 focus:outline-none">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="bg-emerald-700 text-emerald-50 px-3 py-2 rounded-lg lg:text-lg sm:text-sm border border-emerald-700 hover:bg-white hover:text-emerald-700 hover:border-emerald-700 transition duration-300 focus:outline-none">
                       Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>