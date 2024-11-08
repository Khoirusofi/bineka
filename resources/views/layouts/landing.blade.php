<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <link rel="icon" href="{{ asset('public/images/logo/logo.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700;800;900&display=swap"rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />




    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @stack('styles')
</head>

<body class="font-['Poppins']" x-data x-cloak>
    <x-navigation />
    <main class="w-content">
        {{ $slot }}
    </main>
    <x-footer />

    <!-- Lucide -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>

    <!-- Scripts -->
    @stack('scripts')

    <a href="#"
        class="scrollup px-2 py-2 bg-[#3e6553] text-white rounded-md font-medium text-sm hover:bg-[#365949] transition duration-300 transform hover:-translate-y-1 fixed right-10 bottom-10 inline-flex z-10 opacity-0 pointer-events-none"
        id="scroll-up">
        <i class="ri-arrow-up-line"></i>
    </a>
    <!-- scrollbar -->
    <style>
        /* Gaya scrollbar */
        ::-webkit-scrollbar {
            width: 0.4rem;
            background: #858e8a;
            opacity: 0;
            /* Menyembunyikan scrollbar secara default */
            transition: opacity 0.3s;
            /* Transisi halus saat scrollbar muncul */
        }

        ::-webkit-scrollbar-thumb {
            background: #365949;
            border-radius: 0.3rem;
        }

        ::-webkit-scrollbar-thumb:hover {
            cursor: pointer;
            background: #2c473b;
        }

        /* Menampilkan scrollbar saat di-hover */
        .scrollable-area:hover::-webkit-scrollbar {
            opacity: 1;
            /* Menampilkan scrollbar saat area di-hover */
        }

        /* Gaya area scrollable */
        .scrollable-area {
            overflow-y: auto;
            /* Menambahkan scrollbar jika diperlukan */
        }

        /* Menyembunyikan scrollbar di seluruh area */
        .scrollable-area {
            scrollbar-width: thin;
            /* Menetapkan lebar scrollbar di Firefox */
            scrollbar-color: transparent transparent;
            /* Menetapkan warna scrollbar dan latar belakang */
        }

        .scrollable-area::-webkit-scrollbar {
            width: 0;
            /* Menyembunyikan scrollbar di Webkit browser */
        }

        .scrollable-area:hover::-webkit-scrollbar {
            width: 0.4rem;
            /* Menampilkan scrollbar saat di-hover */
            background: #858e8a;
        }
    </style>


</body>

<script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox-plus-jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

</html>
