@php
  $sites = App\Models\Site::get()->keyBy('slug');
  $industry = App\Models\Industry::limit(5)->get();
  $products = App\Models\Product::orderByDesc('created_at')->limit(5)->get();
  $partners = App\Models\Partner::orderBy('order', 'asc')->get();
  $chunks = $partners->chunk(5);
@endphp

@extends('layouts.app-v2', ['activePage' => 'home'])

@push('header')
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
  {{-- Section 1 --}}
  <div class="max-w-screen-lg px-2 md:px-0 mx-auto py-16">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
      <div class="w-full h-72 bg-orange-600 flex items-center justify-center p-4 rounded-2xl">
        <p class="text-xl font-medium text-slate-100 leading-6 tracking-wide">
          {{ strip_tags($sites['intro-box']?->description) }}
        </p>
      </div>
      @foreach ($products as $item)
        <div class="w-full h-72 bg-slate-200 flex flex-col items-center justify-center rounded-2xl group">
          <img src="{{ asset('storage/' . $item->image_product) }}" class="w-1/2 group-hover:scale-110 duration-200"
            alt="{{ $item->title }}">
          <a href="/produk/{{ $item->slug }}">
            <p class="text-xl text-slate-700 hover:underline font-medium">{{ $item->title }}</p>
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
  <div class="grid gap-14 px-2 md:px-0 py-16 max-w-screen-lg px-2 md:px-0 mx-auto">
    @foreach ($industry as $item)
      <div class="flex flex-col md:flex-row w-full items-start gap-4 md:gap-8">
        <div class="w-full md:w-1/4">
          <p class="text-5xl text-slate-800 font-semibold">{{ $item->title }}</p>
        </div>
        <div class="flex-1 w-full md:w-2/4 h-80">
          <img class="w-full h-full bg-cover" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
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
  <div class="py-16 no-scrollbar">
    <div class="pb-10 capitalize">
      <p class="text-3xl text-slate-800 font-medium text-center">our trusted partner</p>
    </div>
    @foreach ($chunks as $index => $chunk)
      @php
        $shouldReverse = $index % 2 === 1;
      @endphp

      <div class="h-36 w-full overflow-hidden" id="slidable-content-{{ $index + 1 }}">
        <div class="relative h-auto w-full">

          <div class="absolute hidden md:block z-40 h-full w-24 bg-gradient-to-r from-white to-transparent"></div>
          <ul class="infinite-translate flex h-full w-[200%] {{ $shouldReverse ? 'reverse' : '' }}">
            @for ($i = 0; $i < 3; $i++)
              @foreach ($chunk as $item)
                <li
                  class="flex w-1/6 md:w-1/6 flex-none items-center justify-center px-4 md:px-6 ring-inset hover:ring-2 ring-orange-600">
                  <a href="{{ $item->url ?? '#' }}" target="_blank"
                    class="flex items-center justify-center h-full w-full">
                    <img class="h-10 sm:h-12 md:h-14 object-contain" src="{{ asset('storage/' . $item->image) }}"
                      alt="{{ $item->title }}">
                  </a>
                </li>
              @endforeach
            @endfor
          </ul>
          <div class="absolute hidden md:block right-0 top-0 z-40 h-full w-24 bg-gradient-to-l from-white to-transparent">
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <hr>
  <div class="max-w-screen-lg px-2 md:px-0 mx-auto py-16 grid gap-8">
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
          <div class="py-1 border-b border-slate-300 flex w-full items-center justify-between">
            <p class="text-base text-slate-700">Linkedin</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-4 h-4 text-orange-600">
              <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
            </svg>
          </div>
        </a>
        <a href="{!! $sites['instagram']?->url !!}" target="_blank">
          <div class="py-1 border-b border-slate-300 flex w-full items-center justify-between">
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
            stroke="currentColor" class="h-auto w-16 flex-0">
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
