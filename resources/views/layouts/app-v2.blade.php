@php
  $sites = App\Models\Site::get()->keyBy('slug');
  $industry = App\Models\Industry::limit(5)->get();
  // product
@endphp

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <title>INDONAV | Bangun Dunia Cerdas dengan Solusi Presisi dari INDONAV</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Info -->
  <meta name="title" content="Bangun Dunia Cerdas dengan Solusi Presisi dari INDONAV">
  <meta name="description"
    content="Temukan solusi inovatif CHC Navigation untuk kebutuhan geospasial, konstruksi, navigasi, dan pertanian.">
  <meta name="image" content="{{ asset('img/og_image-indonav.jpg') }}">
  <meta name="keywords"
    content="smarter precision, mapping solutions, positioning solutions, navigation solutions, geospatial technologies, gnss, lidar, usv, uav, machine control, digital construction, excavators, dozers, graders, hybrid gnss ins, unmanned systems, robotics, autonomous driving, precision agriculture, autosteering systems, chc navigation, innovation, indonav">
  <meta name="author" content="indonav">

  {{-- Push for meta/seo/etc/js --}}
  @stack('header')

</head>

<body class="w-full bg-slate-50">
  <nav class="bg-white border-b border-slate-200 py-4">
    <div class="max-w-screen-lg px-2 md:px-0 mx-auto">
      <div class="flex justify-between items-center relative">
        {{-- Brand --}}
        <a href="/">
          <img src="{{ asset('img/indonav.png') }}" alt="LOGO INDONAV" class="block md:hidden h-6 w-auto">
          <img src="{{ asset('img/indonav_brand.png') }}" alt="LOGO INDONAV" class="hidden md:block h-8 w-auto">
        </a>
        {{-- Menu nav mobile --}}
        <button id="mobile-menu-button"
          class="block md:hidden p-2 border border-slate-200 rounded-lg text-slate-700 hover:bg-orange-600  hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 6l16 0" />
            <path d="M4 12l16 0" />
            <path d="M4 18l16 0" />
          </svg>
        </button>

        {{-- Menu nav desktop --}}
        <ul class="hidden md:flex gap-6 text-base capitalize font-semibold tracking-wide text-slate-600">
          <li
            class="{{ ($activePage ?? '') === 'home' ? 'text-orange-600' : 'hover:underline underline-offset-2 cursor-pointer hover:text-slate-800' }}">
            <a href="/">Beranda</a>
          </li>
          <li
            class="{{ ($activePage ?? '') === 'produk' ? 'text-orange-600' : 'hover:underline underline-offset-2 cursor-pointer hover:text-slate-800' }}">
            <a href="/produk">Produk</a>
          </li>
          <li
            class="{{ ($activePage ?? '') === 'about' ? 'text-orange-600' : 'hover:underline underline-offset-2 cursor-pointer hover:text-slate-800' }}">
            <a href="/tentang-kami">Tentang Kami</a>
          </li>
          <li
            class="{{ ($activePage ?? '') === 'kontak' ? 'text-orange-600' : 'hover:underline underline-offset-2 cursor-pointer hover:text-slate-800' }}">
            <a href="/kontak">Kontak</a>
          </li>
        </ul>

        {{-- Menu nav desktop --}}
        <div id="mobile-menu" class="hidden md:hidden absolute bg-white w-full h-svh top-16 right-0">
          <div class="h-fit w-full border border-slate-200 bg-white p-4 rounded-lg grid ">
            <ul class="text-lg grid gap-2">
              <li
                class="{{ ($activePage ?? '') === 'home' ? 'text-orange-600' : 'hover:underline underline-offset-2 cursor-pointer hover:text-slate-800' }}">
                <a href="/">Beranda</a>
              </li>
              <li
                class="{{ ($activePage ?? '') === 'produk' ? 'text-orange-600' : 'hover:underline underline-offset-2 cursor-pointer hover:text-slate-800' }}">
                <a href="/produk">Produk</a>
              </li>
              <li
                class="{{ ($activePage ?? '') === 'about' ? 'text-orange-600' : 'hover:underline underline-offset-2 cursor-pointer hover:text-slate-800' }}">
                <a href="/tentang-kami">Tentang Kami</a>
              </li>
              <li
                class="{{ ($activePage ?? '') === 'kontak' ? 'text-orange-600' : 'hover:underline underline-offset-2 cursor-pointer hover:text-slate-800' }}">
                <a href="/kontak">Kontak</a>
              </li>
            </ul>
            <div class="flex gap-2 mt-6">
              <a href="/kontak" class="w-full bg-orange-500 px-3 py-1 rounded-full flex justify-center">
                <span class="font-medium text-sm text-slate-100 text-center">Pemesanan</span>
              </a>
            </div>

          </div>
        </div>


        {{-- CTA --}}
        <div class="hidden md:flex items-center gap-4">
          <a href="/kontak" class="bg-orange-500 px-3 py-1 rounded-full">
            <span class="font-medium text-sm text-slate-100">Pemesanan</span>
          </a>
        </div>
      </div>
    </div>
  </nav>
  <div class="bg-white">
    @yield('content')
  </div>
  <footer class="text-white w-full bg-slate-800">

    {{-- Wrapper --}}
    <div class="max-w-screen-lg px-2 md:px-0 mx-auto py-16">
      {{-- Info --}}
      <div class="flex flex-col md:flex-row gap-2 justify-between items-center md:items-start">
        <div class="grid gap-2">
          <img src="{{ asset('img/indonav_white.png') }}" class="h-10 w-auto" alt="">
          <p class="text-lg font-light text-slate-400 text-center md:text-start">Official partner CHCNAV</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-1 gap-2 w-full md:w-fit">
          <a href="tel:{{ strip_tags($sites['phone']?->description) }}">
            <div class="flex gap-2 justify-start md:justify-end">
              <p class="order-2 md:order-1">{{ strip_tags($sites['phone']?->description) }}</p>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
                stroke="currentColor" class="h-auto w-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
              </svg>
            </div>
          </a>
          <a href="mailto:{{ strip_tags($sites['email']?->description) }}">
            <div class="flex gap-2 justify-start md:justify-end">
              <p class="order-2 md:order-1">{{ strip_tags($sites['email']?->description) }}</p>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
                stroke="currentColor" class="h-auto w-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
              </svg>
            </div>
          </a>
        </div>
      </div>

      <hr class="h-0.5 my-10">
      {{-- Link --}}
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
        <div class="space-y-4">
          <p class="text-lg font-medium text-slate-50">Tentang Kami</p>
          <p class="text-base font-light text-slate-200">{{ strip_tags($sites['tentang-kami-footer']?->description) }}
          </p>
        </div>
        <div class="space-y-4">
          <p class="text-lg font-medium text-slate-50">Alamat</p>
          <p class="text-base font-light text-slate-200">{{ strip_tags($sites['alamat']?->description) }}</p>
        </div>
        <div class="space-y-4">
          <p class="text-lg font-medium text-slate-50">Katalog</p>
          <ul class="font-light text-base text-slate-200 space-y-2">
            @foreach ($industry as $item)
              <li class="hover:underline underline-offset-2">
                <a href="/produk/kategori/{{ $item->slug }}">
                  {{ $item->title }}
                </a>
              </li>
            @endforeach
          </ul>
        </div>
        <div class="space-y-4">
          <p class="text-lg font-medium text-slate-50">Halaman lainnya</p>
          <ul class="font-light text-base text-slate-200 space-y-2">
            <li class="hover:underline underline-offset-2">
              <a href="/unduh" class="">
                Unduh Dokumen
              </a>
            </li>
            <li class="hover:underline underline-offset-2">
              <a href="/kontak">Kontak</a>
            </li>
          </ul>
        </div>

      </div>
      <p class="mb-20"></p>

      <div class="flex justify-between items-center sm:items-end border-b border-slate-600 pb-2 mb-6">
        {{-- Second Menu --}}
        <div class="flex gap-4 items-end">
          <img src="{{ asset('img/logo_indonav_white.png') }}" class="h-8" alt="">
          <ul class="sm:flex gap-8 font-medium hidden">
            <li class="hover:underline underline-offset-2 cursor-pointer">
              <a href="/">Beranda</a>
            </li>
            <li class="hover:underline underline-offset-2 cursor-pointer">
              <a href="/produk">Produk</a>
            </li>
            <li class="hover:underline underline-offset-2 cursor-pointer">Tentang Kami</li>
          </ul>
        </div>
        {{-- Socmed --}}
        <div class="flex gap-2 items-center">
          {{-- Linkedin Icon --}}
          <a href="{!! $sites['linkedin']?->url !!}" target="_blank">
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

          <a href="{!! $sites['instagram']?->url !!}" target="_blank">
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
      <p class="text-center text-xs text-slate-200 tracking-wide">INDONAV © 2025 Seluruh hak cipta dilindungi</p>

    </div>
  </footer>
</body>

</html>
