@php
  $sites = App\Models\Site::get()->keyBy('slug');
  $industry = App\Models\Industry::limit(5)->get();

  $dbServices = App\Models\ServicePage::select('label', 'slug')
      ->get()
      ->map(function ($item) {
          return [
              'title' => $item->label,
              'url' => "/layanan/{$item->slug}",
          ];
      });

  // 1. Ambil data dinamis dari database
  $dbServices = App\Models\ServicePage::select('label', 'slug')
      ->get()
      ->map(function ($item) {
          return [
              'title' => $item->label,
              'url' => "/layanan/{$item->slug}",
          ];
      })
      ->toArray();
  $dbProducts = App\Models\Industry::select('title', 'slug')
      ->get()
      ->map(function ($item) {
          return [
              'title' => $item->title,
              'url' => "/produk/{$item->slug}",
          ];
      })
      ->toArray();
  $allMenus = [
      [
          'title' => 'Beranda',
          'url' => '/',
          'children' => [],
      ],
      [
          'title' => 'Produk',
          'url' => '/produk',
          'children' => $dbProducts,
      ],
      [
          'title' => 'Layanan',
          'url' => '/layanan',
          'children' => $dbServices,
      ],
      [
          'title' => 'Portofolio',
          'url' => '/portofolio',
          'children' => [
              ['title' => 'Artikel', 'url' => '/portofolio/artikel'],
              ['title' => 'Kaleidoskop Survey', 'url' => '/portofolio/kaleidoskop-survey'],
          ],
      ],
      [
          'title' => 'Tentang Kami',
          'url' => '/tentang-kami',
          'children' => [
              ['title' => 'Visi Misi', 'url' => '/tentang-kami/visi-misi'],
              ['title' => 'Pemesanan', 'url' => '/tentang-kami/pemesanan'],
              ['title' => 'Company Background', 'url' => '/tentang-kami/company-background'],
          ],
      ],
      [
          'title' => 'Kontak',
          'url' => '/kontak',
          'children' => [],
      ],
  ];

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
  <!-- Alpine Plugins -->
  <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}

  @stack('header')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="INDONAV">
  <meta name="image" content="{{ asset('img/og_image-indonav.jpg') }}">
  <meta name="keywords"
    content="smarter precision, mapping solutions, positioning solutions, navigation solutions, geospatial technologies, gnss, lidar, usv, uav, machine control, digital construction, excavators, dozers, graders, hybrid gnss ins, unmanned systems, robotics, autonomous driving, precision agriculture, autosteering systems, chc navigation, innovation, indonav">
</head>

<body class="w-full bg-slate-50 relative">
  <header x-data="{ scrolled: {{ request()->is('/') ? 'false' : 'true' }} }"
    @scroll.window="scrolled = (window.pageYOffset > 50) ? true : {{ request()->is('/') ? 'false' : 'true' }}"
    :class="scrolled
        ?
        'bg-white shadow-md text-slate-800 py-4' :
        'bg-transparent text-slate-100 py-6'"
    class="fixed top-0 w-full z-50 transition-all duration-300">

    <div class="max-w-6xl mx-auto flex items-center justify-between px-6">
      <div class="font-bold text-lg">
        <img src="{{ asset('img/indonav.png') }}"
          :src="scrolled
              ?
              '{{ asset('img/indonav.png') }}' :
              '{{ asset('img/indonav_white.png') }}'"
          class="h-6 w-auto" alt="INDONAV">
      </div>
      {{-- Nav Menu --}}
      <nav class="flex items-center space-x-1" x-data="{
          menus: {{ json_encode($allMenus) }},
          openMenu: null,
          scrolled: false,
          init() {
              window.addEventListener('scroll', () => { this.scrolled = window.scrollY > 20; });
          }
      }">
        <template x-for="(menu, index) in menus" :key="index">
          <div class="relative" @mouseenter="menu.children.length > 0 ? openMenu = menu.title : openMenu = null"
            @mouseleave="openMenu = null">
            <a :href="menu.url" :class="scrolled ? 'text-slate-700 hover:bg-slate-100' : 'hover:bg-white/20'"
              class="inline-flex items-center gap-1 px-4 py-2 rounded-md font-semibold transition-colors duration-300 no-underline">
              <span x-text="menu.title"></span>
            </a>

            <template x-if="menu.children.length > 0">
              <div x-show="openMenu === menu.title" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute left-1/2 -translate-x-1/2 mt-2 w-56 bg-white shadow-xl rounded-lg z-50 border border-slate-100">
                <div class="py-2 px-1">
                  <template x-for="child in menu.children" :key="child.title">
                    <a :href="child.url"
                      class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-100 rounded-md no-underline"
                      x-text="child.title"></a>
                  </template>
                </div>
              </div>
            </template>
          </div>
        </template>
      </nav>
      {{-- Nav Menu --}}
    </div>
  </header>

  <div class="bg-white border">
    @yield('content')
  </div>

  <x-commons.footer :sites="$sites" :industry="$industry" />

</body>

</html>
