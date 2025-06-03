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
  {{-- <meta property="og:title" content="Build a Smart World with INDONAV Precision Solutions ">
  <meta property="og:description"
    content="Discover CHC Navigation’s innovative solutions for geospatial, construction, navigation and agriculture.">
  <meta property="og:url" content="https://www.indonavtech.co.id/">
  <meta property="og:type" content="website">
  <meta property="og:image" content="{{ asset('img/og_image-indonav.jpg') }}">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:site_name" content="Indonav"> --}}
</head>

<body class="w-full bg-slate-100">
  <nav class="bg-white px-2 md:px-44 py-2">
    <div class="flex justify-between items-center">
      {{-- Brand --}}
      <a href="/">
        <img src="{{ asset('img/indonav_brand.png') }}" alt="logo" class="h-10 w-auto">
      </a>

      {{-- Menu nav --}}
      <ul class="flex gap-6 text-lg tracking-wide font-normal text-slate-600">
        <li class="hover:underline underline-offset-2 cursor-pointer hover:text-slate-800">Home</li>
        <li class="hover:underline underline-offset-2 cursor-pointer hover:text-slate-800">Products</li>
        <li class="hover:underline underline-offset-2 cursor-pointer hover:text-slate-800">Industries</li>
        <li class="hover:underline underline-offset-2 cursor-pointer hover:text-slate-800">About</li>
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
  <div class="h-2"></div>
  @yield('content')
  <footer class="text-white w-full bg-slate-800 px-2 md:px-44 py-10">
    <p class="mb-32"></p>

    <div class="flex justify-between items-center border-b border-slate-600 pb-2 mb-6">
      {{-- Second Menu --}}
      <div class="flex gap-4 items-end">
        <img src="{{ asset('img/logo_indonav_white.png') }}" class="h-8" alt="">
        <ul class="flex gap-8 font-medium">
          <li class="hover:underline underline-offset-2 cursor-pointer">Home</li>
          <li class="hover:underline underline-offset-2 cursor-pointer">Products</li>
          <li class="hover:underline underline-offset-2 cursor-pointer">Industries</li>
          <li class="hover:underline underline-offset-2 cursor-pointer">About</li>
        </ul>

      </div>
      {{-- Socmed --}}
      <div class="flex gap-2 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-auto" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-auto" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-brand-x">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
          <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-auto" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-brand-youtube">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z" />
          <path d="M10 9l5 3l-5 3z" />
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-auto" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
          <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
          <path d="M16.5 7.5v.01" />
        </svg>
      </div>
    </div>
    <p class="text-center text-xs text-slate-200 tracking-wide">Copyright © 2025 All Rights Reserved.</p>

  </footer>
</body>

</html>
