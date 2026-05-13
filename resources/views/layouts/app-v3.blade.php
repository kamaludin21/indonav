@php
  $sites = App\Models\Site::get()->keyBy('slug');
  $industry = App\Models\Industry::limit(5)->get();

  $currentUrl = request()->url();

  // 1. Ambil data dari Database
  $dbServices = App\Models\ServicePage::select('label', 'slug')
      ->orderBy('label', 'asc')
      ->get()
      ->map(function ($item) use ($currentUrl) {
          $url = url("/layanan/{$item->slug}");
          return [
              'title' => $item->label,
              'url' => $url,
              'is_active' => $currentUrl == $url,
          ];
      });

  $dbProducts = App\Models\Industry::select('title', 'slug')
      ->orderBy('title', 'asc')
      ->get()
      ->map(function ($item) use ($currentUrl) {
          $url = url("/produk/{$item->slug}");
          return [
              'title' => $item->title,
              'url' => $url,
              'is_active' => $currentUrl == $url,
          ];
      })
      ->toArray();

  // 2. Susun Struktur Menu
  $allMenus = [
      [
          'title' => 'Beranda',
          'url' => url('/'),
          'active_pattern' => '/',
          'children' => [],
      ],
      [
          'title' => 'Produk',
          'url' => url('/produk'),
          'active_pattern' => 'produk*',
          'children' => $dbProducts,
      ],
      [
          'title' => 'Layanan',
          'url' => url('/layanan'),
          'active_pattern' => 'layanan*',
          'children' => $dbServices,
      ],
      [
          'title' => 'Download Center',
          'url' => url('/download-center'),
          'active_pattern' => 'download-center*',
          'children' => [],
      ],
      [
          'title' => 'Portofolio',
          'url' => url('/portofolio/pengalaman'),
          'active_pattern' => 'portofolio*',
          'children' => [
              ['title' => 'Event', 'url' => url('/portofolio/event')],
              ['title' => 'Video', 'url' => url('/portofolio/video')],
              ['title' => 'Pengalaman', 'url' => url('/portofolio/pengalaman')],
              ['title' => 'Kaleidoskop Survey', 'url' => url('/portofolio/kaleidoskop-survey')],
          ],
      ],
      [
          'title' => 'Tentang Kami',
          'url' => url('/tentang-kami/kontak'),
          'active_pattern' => 'tentang-kami*',
          'children' => [
              ['title' => 'Kontak', 'url' => url('/tentang-kami/kontak')],
              ['title' => 'Visi Misi', 'url' => url('/tentang-kami/visi-misi')],
              ['title' => 'Perjalanan Perusahaan', 'url' => url('/tentang-kami/perjalanan-perusahaan')],
          ],
      ],
  ];

  // 3. Logika Is Active untuk Parent & Statis Children
  foreach ($allMenus as &$menu) {
      $menu['is_active'] =
          $menu['active_pattern'] === '/' ? request()->is('/') : request()->is($menu['active_pattern']);

      foreach ($menu['children'] as &$child) {
          if (!isset($child['is_active'])) {
              $child['is_active'] = $currentUrl == $child['url'];
          }
      }
  }

@endphp

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  @stack('header')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="INDONAV">
  <meta name="image" content="{{ asset('img/og_image-indonav.jpg') }}">
  <meta name="keywords"
    content="smarter precision, mapping solutions, positioning solutions, navigation solutions, geospatial technologies, gnss, lidar, usv, uav, machine control, digital construction, excavators, dozers, graders, hybrid gnss ins, unmanned systems, robotics, autonomous driving, precision agriculture, autosteering systems, chc navigation, innovation, indonav">
</head>

<body class="w-full bg-slate-50 relative">
  <a href="{!! $sites['wa-link']?->url !!}" target="_blank"
    class="group fixed right-6 bottom-6 z-[9999] flex items-center gap-2">
    <span
      class="rounded-full border border-slate-100 bg-white px-4 py-2 text-sm font-bold text-slate-800 opacity-0 shadow-xl transition-opacity duration-300 group-hover:opacity-100">
      Hubungi Kami </span>
    <div
      class="animate-bounce-slow rounded-full bg-[#25D366] p-4 shadow-2xl transition-colors duration-300 hover:bg-[#20ba5a]">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
        stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="h-10 md:h-14 w-auto text-white">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
        <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
      </svg>
    </div>
  </a>
  <header x-data="{
      scrolled: {{ request()->is('/') ? 'false' : 'true' }},
      isMobile: window.innerWidth < 1024
  }" @resize.window="isMobile = window.innerWidth < 1024"
    @scroll.window="scrolled = (window.pageYOffset > 50) ? true : {{ request()->is('/') ? 'false' : 'true' }}"
    :class="(scrolled || isMobile) ?
    'bg-white shadow-md text-slate-800 py-4' :
    'bg-transparent text-slate-100 py-6'"
    class="fixed top-0 w-full z-50 transition-all duration-300">

    <div class="max-w-6xl mx-auto flex px-4 lg:px-0 items-center justify-between">
      <div class="font-bold text-lg">
        <a href="/">
          <img
            :src="(scrolled || isMobile) ?
            '{{ asset('img/indonav.png') }}' :
            '{{ asset('img/indonav_white.png') }}'"
            class="h-6 w-auto" alt="INDONAV">
        </a>
      </div>

      {{-- Desktop Menu --}}
      <div class="hidden lg:block">
        <x-nav.desktop :all-menus="$allMenus" />
      </div>

      {{-- Mobile Menu --}}
      <div class="lg:hidden">
        <x-nav.mobile :all-menus="$allMenus" />
      </div>
    </div>
  </header>
  <div class="bg-white border">
    @yield('content')
  </div>
  <x-commons.footer :sites="$sites" :industry="$industry" />
</body>

</html>
