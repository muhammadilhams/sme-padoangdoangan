@extends('auth.layout')
@section('title', 'Login Admin')

@section('content')
    <section class="background-radial-gradient flex justify-center items-center min-h-screen"
        style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">
        <div class="mx-auto px-4 py-8">
            <!-- Bagian Kanan - Form Login -->
            <div class="lg:w-1/2 mx-8 px-2 lg:px-8 " style="width:max-content">
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-lg py-8 px-6 lg:px-12 backdrop-blur-lg backdrop-filter bg-opacity-50">
                    <h2 class="text-xl lg:text-3xl font-bold text-gray-800 mb-6 dark:text-white">Halaman Masuk Admin</h2>
                       @if ($errors->any())
                            <div class="alert text-sm alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    
                    <!-- Form Content -->
                    <form method="POST" action="{{route('admin.login')}}">
                        @csrf
                        <!-- Username input -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Username
                            </label>
                            <input id="username"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="text" name="username" :value="old('username')" required autofocus
                                autocomplete="username" placeholder="Masukkan Username Anda">
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                Password
                            </label>
                            <input id="password"
                                class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                type="password" name="password" required autocomplete="current-password"
                                placeholder="Masukkan Password Anda">
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit"
                                class="bg-green-600 text-white px-4 py-2 rounded-md w-full text-xl font-bold hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Masuk</button>
                        </div>
                        
                        <div class="flex justify-center my-3">
                            <a href="{{ route('loginform') }}" class="text-red-600 hover:underline">Masuk sebagai Pengguna</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tombol Kembali ke Beranda -->
        <div class="fixed left-0 bottom-0 mb-5 ml-5">
            <a href="{{ route('beranda') }}"
                class="bg-emerald-500 text-white px-3 py-3 rounded-full text-xl hover:bg-emerald-900 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <i class="fas fa-home"></i>
            </a>
        </div>
    </section>

@endsection
