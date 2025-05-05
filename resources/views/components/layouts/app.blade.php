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
<!-- Wrapper AlpineJS -->
<div class="d-flex">

    <!-- Sidebar -->
    <div class="sidebar d-none d-md-block bg-white p-3 shadow h-100" style="width: 250px; min-height: 100vh;">
        <ul class="nav flex-column">
            <li class="nav-item mb-3">
                <a href="/" class="nav-link text-dark fw-bold"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-house"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z">
                    </path>
                    <path fill-rule="evenodd"
                        d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z">
                    </path>
                </svg> Home</a>
                <hr>
            </li>
            <li class="nav-item mb-3">
                <a href="/cart" class="nav-link text-dark fw-bold"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                    class="bi bi-cart" viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                    </path>
                </svg> Cart</a>
                <hr>
            </li>
            <li class="nav-item mb-3">
                <a href="/account/my-orders" class="nav-link text-dark fw-bold"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                    class="bi bi-bag" viewBox="0 0 16 16">
                    <path
                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                </svg> Orders</a>
                <hr>
            </li>
            <li class="nav-item mb-3">
                <img src="{{ asset('images/logo33.png') }}" alt="Logo" style="width: 100%;">
            </li>
        </ul>
        <br><br><br><br><br>
        <br><br>
        <div class="text-center text-muted medium mt-3 ">
            © {{ now()->year }} TiwiVirgianti
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="flex-grow-1 p-3">



        <!-- Konten lainnya -->
        <div>

    <!-- render content -->
    {{ $slot }}
    <!-- end render content -->
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
