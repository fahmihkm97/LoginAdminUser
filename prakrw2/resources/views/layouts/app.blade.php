<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $title ?? 'Laravel App' }}</title>

{{-- Menambahkan asset Breeze (Tailwind CSS) --}}
@vite(['resources/css/app.css', 'resources/js/app.js']) 

{{-- CSS Kustom Sederhana untuk body agar tidak terlalu kosong --}}
<style>
    .page-content-wrapper {
        margin-top: 20px; /* Jarak dari navigasi */
        min-height: 80vh; /* Agar footer tidak terlalu ke atas */
    }
</style>


</head>
<body class="font-sans antialiased bg-gray-100">

<div class="min-h-screen">
    {{-- Navigasi Breeze (mengandung link Login/Register/Dashboard) --}}
    @include('layouts.navigation') 

    <main class="page-content-wrapper">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Tempat konten spesifik halaman diisi oleh @section('content') --}}
            @yield('content') 
        </div>
    </main>
</div>

<footer class="text-center py-4 text-gray-500 text-sm">
    <p>Fahmi Hakim | G.211.23.0019 | Praktikum Rekayasa Web</p>
</footer>


</body>
</html>