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
          'title' => 'Portofolio',
          'url' => url('/portofolio/pengalaman'),
          'active_pattern' => 'portofolio*',
          'children' => [
              ['title' => 'Pengalaman', 'url' => url('/portofolio/pengalaman')],
              ['title' => 'Kaleidoskop Survey', 'url' => url('/portofolio/kaleidoskop-survey')],
          ],
      ],
      [
          'title' => 'Tentang Kami',
          'url' => url('/tentang-kami/visi-misi'),
          'active_pattern' => 'tentang-kami*',
          'children' => [
              ['title' => 'Visi Misi', 'url' => url('/tentang-kami/visi-misi')],
              ['title' => 'Perjalanan Perusahaan', 'url' => url('/tentang-kami/perjalanan-perusahaan')],
          ],
      ],
      [
          'title' => 'Kontak',
          'url' => url('/kontak'),
          'active_pattern' => 'kontak*',
          'children' => [],
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
