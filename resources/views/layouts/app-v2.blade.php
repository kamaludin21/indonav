<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <title>INDONAV | Build a Smart World with INDONAV Precision Solutions</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Info -->
  <meta name="title" content="Build a Smart World with INDONAV Precision Solutions">
  <meta name="description"
    content="Discover CHC Navigation’s innovative solutions for geospatial, construction, navigation and agriculture.">
  <meta name="image" content="{{ asset('img/og_image-indonav.jpg') }}">
  <meta name="keywords"
    content="smarter precision, mapping solutions, positioning solutions, navigation solutions, geospatial technologies, gnss, lidar, usv, uav, machine control, digital construction, excavators, dozers, graders, hybrid gnss ins, unmanned systems, robotics, autonomous driving, precision agriculture, autosteering systems, chc navigation, innovation, indonav">
  <meta name="author" content="indonav">
  @stack('header')

</head>

<body class="w-full bg-slate-50">
  <nav class="bg-white border-b border-slate-200 px-2 md:px-44 py-4">
    <div class="flex justify-between items-center">
      {{-- Brand --}}
      <a href="/">
        <img src="{{ asset('img/indonav_brand.png') }}" alt="logo" class="h-8 w-auto">
      </a>

      {{-- Menu nav --}}
      <ul class="flex gap-6 text-base capitalize font-semibold tracking-wide text-slate-600">
        <li
          class="{{ ($activePage ?? '') === 'home' ? 'text-orange-600' : 'hover:underline underline-offset-2 cursor-pointer hover:text-slate-800' }}">
          <a href="/new/">Home</a>
        </li>
        <li
          class="{{ ($activePage ?? '') === 'products' ? 'text-orange-600 underline underline-offset-2' : 'hover:underline underline-offset-2 cursor-pointer hover:text-slate-800' }}">
          <a href="/new/product">Products</a>
        </li>
        <li
          class="{{ ($activePage ?? '') === 'about' ? 'text-orange-600 underline underline-offset-2' : 'hover:underline underline-offset-2 cursor-pointer hover:text-slate-800' }}">
          <a href="/">About Us</a>
        </li>
      </ul>


      {{-- CTA --}}
      <div class="flex items-center gap-4">
        {{-- <p class="flex items-center gap-0.2 text-lg">
          <span class="text-sm font-medium">EN</span>
          |
          <span class="text-sm font-medium">ID</span>
        </p> --}}
        <button class="bg-orange-500 px-3 py-1 rounded-full">
          <span class="font-medium text-sm text-slate-100">ORDER</span>
        </button>
      </div>

    </div>
  </nav>
  @yield('content')
  <footer class="text-white w-full bg-slate-800 px-2 md:px-44 py-10">
    <div class="flex justify-between items-start gap-6">
      <div class="w-1/4 grid gap-4">
        <img src="{{ asset('img/indonav_white.png') }}" class="h-10 w-auto" alt="">
        <p class="text-sm font-light">INDONAV adalah dealer resmi CHCNAV untuk wilayah Indonesia. Kami berkomitmen untuk
          memberikan dukungan dan pelayanan terbaik kepada setiap mitra dan pengguna CHCNAV di seluruh Indonesia.</p>
      </div>
      <div class="w-1/4 grid gap-4">
        <p>Kontak</p>
        <ul>
          <li>Phone</li>
          <li>Mail</li>
        </ul>
      </div>
      {{--  --}}
      <div class="flex-0 space-y-4">
        <p class="text-lg font-medium text-slate-50">Katalog</p>
        <ul class="font-light text-base text-slate-100 space-y-2">
          <li>Surveying and Engineering</li>
          <li>3D Mobile Mapping</li>
        </ul>
      </div>
      <div class="flex-0 space-y-4">
        <p class="text-lg font-medium text-slate-50">Halaman lainnya</p>
        <ul class="font-light text-base text-slate-100 space-y-2">
          <li>All Products</li>
          <li>Download</li>
          <li>Contact</li>
        </ul>
      </div>

    </div>
    <p class="mb-20"></p>

    <div class="flex justify-between items-center border-b border-slate-600 pb-2 mb-6">
      {{-- Second Menu --}}
      <div class="flex gap-4 items-end">
        <img src="{{ asset('img/logo_indonav_white.png') }}" class="h-8" alt="">
        <ul class="flex gap-8 font-medium">
          <li class="hover:underline underline-offset-2 cursor-pointer">Home</li>
          <li class="hover:underline underline-offset-2 cursor-pointer">About Us</li>
          <li class="hover:underline underline-offset-2 cursor-pointer">Contact</li>
        </ul>
      </div>
      {{-- Socmed --}}
      <div class="flex gap-2 items-center">
        {{-- Linkedin Icon --}}
        <a href="https://www.linkedin.com/company/indonavindonesia/" target="_blank">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-auto" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-brand-linkedin">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M8 11v5" />
            <path d="M8 8v.01" />
            <path d="M12 16v-5" />
            <path d="M16 16v-3a2 2 0 1 0 -4 0" />
            <path d="M3 7a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z" />
          </svg>
        </a>

        <a href="https://www.instagram.com/indonav_official?igsh=djh6NzF5aTVkczNm" target="_blanl">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-auto" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
            <path d="M16.5 7.5v.01" />
          </svg>
        </a>
      </div>
    </div>
    <p class="text-center text-xs text-slate-200 tracking-wide">Copyright © 2025 All Rights Reserved.</p>

  </footer>
</body>

</html>
