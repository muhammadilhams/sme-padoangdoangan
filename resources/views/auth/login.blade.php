@extends('auth.layout')
@section('title', 'Login')

@section('content')
    <section class="background-radial-gradient flex justify-center overflow-hidden"
        style="min-height: 100vh; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">
        <div class="mx-auto px-4 py-8 flex items-center">
            <div class="flex flex-col lg:flex-row justify-between items-start w-full">
                <!-- Bagian Kiri - Selamat Datang -->
                <div class="mb-8 px-5 lg:mb-0 lg:w-1/2">
                    <h1 class="mb-3 text-3xl lg:text-6xl font-bold text-white lg:text-[hsl(151,40%,24%)]">
                        Selamat Datang Kembali
                    </h1>
                    <p class="mb-4 text-justify lg:text-start text-white dark:text-gray-600 lg:max-w-[50rem]">
                        Bersiaplah untuk mengelola usaha Anda dengan lebih efisien dan efektif. Masuklah untuk menjelajahi
                        fitur-fitur terbaru kami yang dirancang khusus untuk mendukung pertumbuhan bisnis Anda.
                    </p>

                    <!-- Tombol Kembali ke Beranda for larger screens -->
                    <div class="hidden lg:block mt-7">
                        <a href="{{ route('beranda') }}"
                            class="bg-emerald-600 text-white px-3 py-3 rounded-xl text-lg hover:bg-emerald-900 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <i class="fas fa-home mr-2"></i> Kembali ke Beranda
                        </a>
                    </div>
                </div>

                <!-- Bagian Kanan - Form Login -->
                <div class="lg:w-1/2 mx-8 px-2 lg:px-8">
                    <div
                        class="bg-white dark:bg-gray-800 rounded-3xl shadow-lg py-8 px-6 lg:px-12 backdrop-blur-lg backdrop-filter bg-opacity-50">
                        <h2 class="text-xl lg:text-3xl font-bold text-gray-800 mb-6 dark:text-white">Halaman Masuk</h2>

                        @if (session('success'))
                            <div class="bg-emerald-500 border text-white px-4 py-3 rounded relative mb-3" role="alert">
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="bg-red-500 border text-white px-4 py-3 rounded relative mb-3" role="alert">
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Username input -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Username
                                </label>
                                <input id="username"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    type="text" name="username" :value="old('username')" required autofocus autocomplete="username"  placeholder="Masukkan Username Anda">
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                    Password
                                </label>
                                <input id="password"
                                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                    type="password" name="password" required autocomplete="current-password" placeholder="Masukkan Password Anda">
                            </div>

                            <!-- Remember Me (Commented out) -->
                            <!-- <div class="mb-4">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                    <label for="remember_me" class="ml-2 text-md text-gray-600 dark:text-white">Ingat Saya</label>
                                </div> -->

                            <div class="flex items-center justify-between">
                                <button type="submit"
                                    class="bg-emerald-600 text-white px-4 py-2 rounded-xl w-full text-xl font-bold hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Masuk</button>
                            </div>
                            <div class="flex justify-center my-3">
                                <p class="text-gray-600">Belum punya akun? <a href="{{ route('registerform') }}"
                                        class="text-blue-600 hover:underline">Daftar di Sini</a></p>
                            </div>
                            <div class="flex justify-center my-3">
                                <a href="{{route('admin.loginform')}}" class="text-red-600 hover:underline">Masuk sebagai admin</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Kembali ke Beranda for smaller screens -->
        <div class="fixed left-0 bottom-0 mb-5 ml-5 lg:hidden">
            <a href="{{ route('beranda') }}"
                class="bg-emerald-500 text-white px-3 py-3 rounded-full text-xl hover:bg-emerald-900 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <i class="fas fa-home"></i>
            </a>
        </div>
    </section>

@endsection
