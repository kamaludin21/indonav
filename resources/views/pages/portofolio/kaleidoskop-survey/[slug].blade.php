@php
  // Ambil data spesifik berdasarkan slug dari URL
  $item = App\Models\Gallery::where('slug', $slug)->firstOrFail();

  // Ambil koleksi gambar (asumsi data tersimpan sebagai JSON/Array)
  $photos = $item->images ?? [];
  $totalPhotos = count($photos);
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
  <div class="bg-white min-h-screen font-sans">
    {{-- Navigation --}}
    <nav
      class="fixed top-0 left-0 w-full z-50 px-6 py-6 flex justify-between items-center bg-white/80 backdrop-blur-md border-b border-gray-100">
      <a href="/portofolio/kaleidoskop-survey" class="flex items-center gap-2 group">
        <div
          class="w-8 h-8 rounded-full border border-orange-600 flex items-center justify-center group-hover:bg-orange-600 group-hover:text-white transition-all">
          <span class="-mt-0.5">&larr;</span>
        </div>
        <span class="font-bold text-xs tracking-widest uppercase text-slate-900">Kembali</span>
      </a>

      <div class="text-center">
        <h2 class="text-sm font-black uppercase tracking-[0.5em] text-orange-500">{{ $item->title }}</h2>
        <p class="text-[10px] text-gray-400 uppercase tracking-widest mt-1">{{ $totalPhotos }} Objects</p>
      </div>

      {{-- Spacer agar judul tetap di tengah --}}
      <div class="w-24 hidden md:block"></div>
    </nav>

    <main class="pt-32 pb-20 px-4 md:px-10">
      {{-- Masonry Layout menggunakan Tailwind Columns --}}
      <div class="columns-1 md:columns-2 lg:columns-4 gap-6 space-y-6">

        @foreach ($photos as $photo)
          <div class="break-inside-avoid relative group cursor-crosshair">
            {{-- Image --}}
            <img src="{{ asset('storage/' . $photo['image']) }}" alt="{{ $photo['description'] ?? $item->title }}"
              class="w-full rounded-2xl transition-all duration-700 shadow-sm hover:shadow-xl" loading="lazy">

            {{-- Caption Overlay (Opsional - Muncul saat Hover) --}}
            @if (!empty($photo['description']))
              <div
                class="mt-3 px-2 flex justify-between items-start opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                <p class="text-xs font-bold text-slate-900">{{ $photo['description'] }}</p>
              </div>
            @endif
          </div>
        @endforeach

      </div>

      {{-- Empty State jika tidak ada gambar --}}
      @if ($totalPhotos === 0)
        <div class="flex flex-col items-center justify-center py-20 text-gray-400">
          <p class="italic">Belum ada foto untuk kategori ini.</p>
        </div>
      @endif
    </main>
  </div>
@endsection
