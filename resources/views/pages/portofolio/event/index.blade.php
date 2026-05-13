@php
  $events = App\Models\Event::orderBy('title', 'asc')->get();
@endphp

@extends('layouts.app-v3', ['activePage' => 'portofolio'])

@push('header')
  <title>INDONAV | Bangun Dunia Cerdas dengan Solusi Presisi dari INDONAV</title>
  <meta name="title" content="Bangun Dunia Cerdas dengan Solusi Presisi dari INDONAV">
  <meta name="description"
    content="Temukan solusi inovatif CHC Navigation untuk kebutuhan geospasial, konstruksi, navigasi, dan pertanian.">

  <meta property="og:title" content="Build a Smart World with INDONAV Precision Solutions ">
  <meta property="og:description"
    content="Discover CHC Navigation’s innovative solutions for geospatial, construction, navigation and agriculture.">
  <meta property="og:url" content="https://indonavtech.co.id/">
  <meta property="og:type" content="website">
  <meta property="og:image" content="{{ asset('img/og_image-indonav.jpg') }}">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:site_name" content="Indonav">
@endpush

@section('content')
  <div class="bg-zinc-50 min-h-screen font-sans text-slate-800 overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
      <div class="absolute -top-24 -left-24 w-96 h-96 bg-orange-600/10 rounded-full blur-[120px]"></div>
    </div>

    <main class="max-w-6xl mx-auto pb-20 pt-28 relative z-10 px-4 lg:px-0">
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-6">
        <div>
          <h2 class="text-orange-600 font-black tracking-widest uppercase text-sm mb-4">Portofolio</h2>
           <h1 class="text-4xl md:text-6xl font-black tracking-tighter uppercase">
          EVENT
        </h1>
        </div>
      </div>

      <div class="grid grid-cols-12 gap-4">
        @foreach ($events as $item)
          @php
            // Logika Bento Grid:
            // Baris 1: 8 & 4 (Index 0, 1)
            // Baris 2: 4 & 8 (Index 2, 3)
            // Kita gunakan modulo 4 untuk menentukan pola berulang
            $isLarge = $loop->index % 4 == 0 || $loop->index % 4 == 3;

            // Ambil gambar pertama dari array images sebagai thumbnail
            $thumbnail = !empty($item->images) ? $item->images[0]['image'] : 'https://via.placeholder.com/800x600';
          @endphp

          <a href="/portofolio/event/{{ $item->slug }}"
            class="col-span-12 {{ $isLarge ? 'md:col-span-8' : 'md:col-span-4' }} group relative overflow-hidden rounded-3xl {{ $isLarge ? 'aspect-[16/9] md:h-[500px]' : 'aspect-square' }} md:aspect-auto">

            <img src="{{ asset('storage/' . $thumbnail) }}"
              class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

            <div class="absolute inset-0 bg-gradient-to-t from-[#0a0f1a] via-transparent to-transparent opacity-80"></div>

            <div
              class="absolute inset-0 flex flex-col items-center justify-center text-center p-4 bg-slate-900/40 group-hover:bg-slate-900/20 transition-all duration-500">
              <h3
                class="text-3xl md:text-4xl font-black uppercase tracking-tighter text-white mb-4 transform group-hover:scale-105 transition-transform duration-500">
                {{ $item->title }}
              </h3>

              <div
                class="inline-flex items-center justify-center px-8 py-3 border-2 border-orange-600 text-orange-600 group-hover:bg-orange-600 group-hover:text-white font-bold uppercase text-xs tracking-widest rounded-full transition-all duration-300 transform translate-y-8 group-hover:translate-y-0 opacity-0 group-hover:opacity-100">
                Selengkapnya
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
              </div>
            </div>
          </a>
        @endforeach
      </div>
    </main>
  </div>
@endsection
