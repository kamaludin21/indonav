@php
  $sites = App\Models\Site::get()->keyBy('slug');
  $industry = App\Models\Industry::limit(5)->get();
  $products = App\Models\Product::orderByDesc('created_at')->limit(5)->get();
  $partners = App\Models\Partner::orderBy('order', 'asc')->get();
@endphp

@extends('layouts.app-v2', ['activePage' => 'home'])

@push('header')
  <title>INDONAV | Bangun Dunia Cerdas dengan Solusi Presisi dari INDONAV</title>
  <meta name="title" content="Bangun Dunia Cerdas dengan Solusi Presisi dari INDONAV">
  <meta name="description"
    content="Temukan solusi inovatif CHC Navigation untuk kebutuhan geospasial, konstruksi, navigasi, dan pertanian.">

  <meta property="og:title" content="Build a Smart World with INDONAV Precision Solutions ">
  <meta property="og:description"
    content="Discover CHC Navigation’s innovative solutions for geospatial, construction, navigation and agriculture.">
  <meta property="og:url" content="https://www.indonavtech.co.id/">
  <meta property="og:type" content="website">
  <meta property="og:image" content="{{ asset('img/og_image-indonav.jpg') }}">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:site_name" content="Indonav">
@endpush


@section('content')
  <div class="w-full h-auto border-b-2 bg-topo">
    <div class="max-w-screen-lg px-2 lg:px-0 mx-auto py-16 md:py-28 flex">
      <div class="w-full md:w-2/3 space-y-6 z-10">
        <h1 class="text-4xl font-bold text-slate-800">
          {{ strip_tags($sites['hero-title']?->description ?? 'INDONAV TEKNOLOGI') }}</h1>
        <p class="text-lg font-light text-slate-700">
          {{ strip_tags($sites['hero-description']?->description ?? 'INDONAV hadir sebagai mitra terpercaya untuk kebutuhan survei darat, laut, dan udara—mulai dari penjualan alat, jasa profesional, hingga layanan purna jual. Kami menawarkan solusi terintegrasi dengan teknologi terkini dan tim berpengalaman untuk memastikan setiap proyek berjalan efisien, akurat, dan tepat sasaran.') }}
        </p>
        <div>
          <a href="/tentang-kami" class="bg-slate-800 hover:bg-orange-600 cursor-pointer px-4 py-2 rounded-md">
            <span class="text-white text-lg">Tentang Kami</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  {{-- Section 1 --}}
  <div class="max-w-screen-lg px-2 lg:px-0 mx-auto py-16 md:py-28">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
      <div class="w-full h-72 bg-orange-600 flex items-center justify-center p-4 rounded-2xl">
        <p class="text-xl font-medium text-slate-100 leading-6 tracking-wide">
          {{ strip_tags($sites['intro-box']?->description) }}
        </p>
      </div>
      @foreach ($products as $item)
        <div class="w-full h-72 bg-slate-200 p-2 flex flex-col items-center space-y-6 justify-center rounded-2xl group">
          <img src="{{ asset('storage/' . $item->image_product) }}"
            class="w-2/3 md:w-1/2 group-hover:scale-125 duration-200" alt="{{ $item->title }}">
          <a href="/produk/{{ $item->slug }}">
            <p class="text-2xl text-center text-slate-700 hover:underline font-medium line-clamp-2">
              {{ $item->title }}
            </p>
          </a>
        </div>
      @endforeach

      @foreach ($industry->take(2) as $item)
        <a href="/produk/kategori/{{ $item->slug }}">
          <div
            class="w-full h-72 {{ $loop->even ? 'bg-slate-800' : 'bg-orange-600' }} flex items-center justify-center text-center p-4 rounded-2xl">
            <p
              class="text-xl hover:underline underline-offset-2 cursor-pointer font-medium text-slate-100 leading-6 tracking-wide">
              {{ $item->title }}
            </p>
          </div>
        </a>
      @endforeach
    </div>
  </div>
  <hr>
  <div class="grid gap-14 px-2 lg:px-0 py-16 md:py-28 max-w-screen-lg mx-auto">
    @foreach ($industry as $item)
      <div class="flex flex-col md:flex-row w-full items-start gap-4 md:gap-8">
        <div class="w-full md:w-1/4">
          <p class="text-5xl text-slate-800 font-semibold">{{ $item->title }}</p>
        </div>
        <div class="flex-1 w-full md:w-2/4 h-80">
          @if ($item->media_type === 'video' && $item->embed_url)
            <iframe class="min-h-56 w-full h-full" src="{{ $item->embed_url }}" title="YouTube video player"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
            </iframe>
          @elseif ($item->media_type === 'image' && $item->image)
            <img class="min-h-56  w-full h-full object-cover" src="{{ asset('storage/' . $item->image) }}"
              alt="{{ $item->title }}">
          @endif
        </div>
        <div class="w-full md:w-1/4 h-full flex flex-col gap-4">
          <p class="text-lg text-slate-700">{{ $item->description }}</p>
          <a href="/produk/kategori/{{ $item->slug }}"
            class="border-b-2 w-fit flex items-center gap-2 hover:gap-3 duration-200 text-slate-600 hover:text-slate-800">
            <span>Jelajah Produk</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M5 12l14 0" />
              <path d="M13 18l6 -6" />
              <path d="M13 6l6 6" />
            </svg>
          </a>
        </div>
      </div>
    @endforeach
  </div>
  <hr>
  {{-- Infinite Slider --}}
  <div class="py-16 md:py-28 no-scrollbar">
    <div class="pb-10 md:pb-16 capitalize">
      <p class="text-3xl text-slate-800 font-medium text-center">our trusted partner</p>
    </div>
    <div class="h-36 w-full overflow-hidden" id="slidable-content">
      <div class="relative h-auto w-full">
        <div class="absolute hidden md:block z-40 h-full w-24 bg-gradient-to-r from-white to-transparent"></div>
        <ul class="infinite-translate flex h-full w-[200%]">
          @for ($i = 0; $i < 3  ; $i++)
            {{-- Repeat to create seamless animation --}}
            @foreach ($partners as $item)
              <li
                class="flex w-1/6 md:w-1/6 flex-none items-center justify-center px-4 md:px-6 ring-inset hover:ring-2 ring-orange-600">
                <a href="{{ $item->url ?? '#' }}" target="_blank" class="flex items-center justify-center h-full w-full">
                  <img class="h-10 sm:h-12 md:h-14 object-contain" src="{{ asset('storage/' . $item->image) }}"
                    alt="{{ $i }} {{ $item->title }}">
                </a>
              </li>
            @endforeach
          @endfor
        </ul>
        <div class="absolute hidden md:block right-0 top-0 z-40 h-full w-24 bg-gradient-to-l from-white to-transparent">
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div class="max-w-screen-lg px-2 lg:px-0 mx-auto py-16 md:py-28 grid gap-8">
    <div>
      <p class="text-5xl text-slate-800 font-bold">Tentang Kami</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 items-start gap-10">
      {{-- Follow Us --}}
      <div class="order-3 md:order-1 place-self-end w-full">
        <div class="py-1 border-b border-slate-300">
          <p class="text-lg font-medium text-slate-700">Ikuti kami</p>
        </div>
        <a href="{!! $sites['linkedin']?->url !!}" target="_blank">
          <div
            class="py-1 border-b border-slate-300 hover:bg-orange-50 duration-200 flex w-full items-center justify-between cursor-pointer">
            <p class="text-base text-slate-700">Linkedin</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-4 h-4 text-orange-600">
              <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
            </svg>
          </div>
        </a>
        <a href="{!! $sites['instagram']?->url !!}" target="_blank">
          <div
            class="py-1 border-b border-slate-300 hover:bg-orange-50 duration-200 flex w-full items-center justify-between cursor-pointer">
            <p class="text-base text-slate-700">Instagram</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-4 h-4 text-orange-600">
              <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
            </svg>
          </div>
        </a>
      </div>
      {{-- Desc --}}
      <div class="order-1 md:order-2 text-lg grid gap-2 text-slate-700">
        {!! $sites['tentang-kami']?->description !!}
      </div>
      {{-- Alamat --}}
      <div class="order-2 md:order-3 grid gap-2 text-lg h-full text-slate-700">
        <div class="flex gap-2 items-start">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6 flex-shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
          </svg>
          {!! $sites['alamat']?->description !!}
        </div>
        <a href="tel:{{ strip_tags($sites['phone']?->description) }}">
          <div class="flex gap-2 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
              stroke="currentColor" class="h-auto w-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
            </svg>
            {!! $sites['phone']?->description !!}
          </div>
        </a>
        <a href="mailto:{{ strip_tags($sites['email']?->description) }}">
          <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
              stroke="currentColor" class="h-auto w-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>
            {!! $sites['email']?->description !!}
          </div>
        </a>
      </div>
    </div>
  </div>
  <hr>
@endsection
