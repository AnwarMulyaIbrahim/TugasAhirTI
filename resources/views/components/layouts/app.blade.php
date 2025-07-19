<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo33.png') }}" type="image/x-icon">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="Food Store">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta content="@yield('title')" property="og:title">
    <meta content="@yield('description')" property="og:description">
    <meta content="@yield('image')" property="og:image">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    @livewireStyles
    @vite(['resources/css/app.css'])
</head>

<body>
    <div class="d-flex">

        <!-- Sidebar -->
        <div class="sidebar d-none d-md-block bg-white p-3 shadow position-fixed d-md-block d-none"
            style="width: 250px; height: 100vh; top: 0; left: 0; z-index: 1030;">
            <ul class="nav flex-column">
                {{-- menu yang muncul ketika sudah login --}}
                @auth('customer')
                    <div>
                        @php
                            $image =
                                auth()->guard('customer')->check() && auth()->guard('customer')->user()->image
                                    ? asset('/storage/avatars/' . auth()->guard('customer')->user()->image)
                                    : 'https://cdn.jsdelivr.net/gh/SantriKoding-com/assets-food-store/images/user.png';
                        @endphp
                        <img src="{{ $image }}" class="object-fit-cover rounded-circle" height="45" />
                        <span class="text-dark fw-bold">{{ auth('customer')->user()->name }}</span>
                    </div>
                    <hr>
                    <li class="nav-item ">
                        <a href="/" class="nav-link text-dark fw-bold"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 9v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9" />
                                <path d="M9 22V12h6v10M2 10.6L12 2l10 8.6" />
                            </svg> Dashboard</a>
                        <hr>
                    </li>
                    <li class="nav-item ">
                        <a href="/cart" class="nav-link text-dark fw-bold"><svg xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                                </path>
                            </svg> Keranjang</a>
                        <hr>
                    </li>
                    <li class="nav-item ">
                        <a href="/account/my-orders" class="nav-link text-dark fw-bold"><svg
                                xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                                class="bi bi-bag" viewBox="0 0 16 16">
                                <path
                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                            </svg> Pesanan</a>
                        <hr>
                    </li>
                    <li class="nav-item ">
                        <!-- component logout livewire -->
                        <livewire:auth.logout />
                        <!-- end component logout livewire -->
                        <hr>
                    </li>
                    {{-- menu yang muncul ketika belum login --}}
                @else
                    <li class="nav-item mb-3">
                        <a href="/" class="nav-link text-dark fw-bold"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 9v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9" />
                                <path d="M9 22V12h6v10M2 10.6L12 2l10 8.6" />
                            </svg> Beranda</a>
                        <hr>
                    </li>
                    <li class="nav-item mb-3">
                        <a href="/products" class="nav-link text-dark fw-bold"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21.5 12H16c-.7 2-2 3-4 3s-3.3-1-4-3H2.5" />
                                <path
                                    d="M5.5 5.1L2 12v6c0 1.1.9 2 2 2h16a2 2 0 002-2v-6l-3.4-6.9A2 2 0 0016.8 4H7.2a2 2 0 00-1.8 1.1z" />
                            </svg> Produk</a>
                        <hr>
                    </li>
                    <li class="nav-item mb-3">
                        <a href="/login" class="nav-link text-dark fw-bold"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M13.8 12H3" />
                            </svg> Masuk</a>
                        <hr>
                    </li>
                    <li class="nav-item mb-3">
                        <a href="/register" class="nav-link text-dark fw-bold"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg> Registrasi</a>
                        <hr>
                    </li>
                @endauth
                <li class="nav-item ">
                    <img src="{{ asset('images/logo33.png') }}" alt="Logo" style="width: 100%;">
                </li>
            </ul>
        </div>

        <!-- Konten Utama -->
        <div class="flex-grow-1 p-3" style="margin-left: 0; width: 100%; overflow-y: auto;"
            class="ms-md-250px w-100 w-md-auto">




            <!-- Konten lainnya -->
            <div>

                <!-- render content -->
                {{ $slot }}
                <!-- end render content -->
            </div>
        </div>

        <!-- Sidebar Kanan -->
        <div class="d-none d-lg-block bg-white shadow p-3"
            style="width: 250px; height: 100vh; position: fixed; top: 0; right: 0; z-index: 1030;">
            <!-- Sidebar Kanan - Bantuan -->
            <div class=" p-3 me-1 d-none d-md-block" style="width: 245px; z-index: 1050;">
                <div class="text-center">
                    <img src="{{ asset('images/thing.png') }}" alt="Bingung?" class="img-fluid mb-3"
                        style="max-height: 150px;">
                    <p class="mb-3">Masih bingung mau pesan apa?<br>Atau butuh saran?</p>
                    <a href="https://wa.me/6282124610492" target="_blank" class="btn btn-success w-100">
                        <i class="bi bi-whatsapp"></i> Hubungi Admin
                    </a>
                </div>
            </div>
            <!-- Sidebar Kanan - Saran -->
            <div class=" p-3 me-1 d-none d-md-block" style="width: 245px; z-index: 1050;">
                <div class="text-center">
                    <img src="{{ asset('images/saran.png') }}" alt="Bingung?" class="img-fluid mb-3"
                        style="max-height: 300px;">

                </div>
            </div>
        </div>

    </div>

    <!-- bottom menu -->
    <x-menus.bottom />
    <!-- end bottom menu -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @livewireScripts
    <script>
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('info'))
            toastr.info('{{ session('info') }}', 'INFO!');
        @elseif (session()->has('warning'))
            toastr.warning('{{ session('warning') }}', 'PERINGATAN!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
</body>

</html>
