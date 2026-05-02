@php
  // Menangkap input pencarian dari query string (?search=...)
  $search = request('search');

  $articles = App\Models\Article::query()
      ->when($search, function ($query, $search) {
          return $query->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($search) . '%']);
      })
      ->orderBy('created_at', 'desc')
      ->paginate(9)
      ->withQueryString();
@endphp

@extends('layouts.app-v3', ['activePage' => 'portofolio'])

@push('header')
  <title>Pengalaman, Artikel & Kegiatan | INDONAV</title>
  <meta name="description"
    content="Beragam dokumentasi pengalaman, artikel, dan kegiatan yang mencerminkan peran kami dalam bidang survei, pemetaan, serta pengembangan teknologi geospasial.">
  <meta name="keywords"
    content="pengalaman indonav, artikel indonav, kegiatan indonav, survei, pemetaan, teknologi geospasial, indonav">
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
  <div class="bg-zinc-100">

    <header class="bg-slate-800 pt-24 pb-12 px-6 text-center">
      <span class="text-orange-600 font-bold tracking-widest uppercase text-sm">Portofolio</span>
      <h1 class="text-white text-4xl md:text-5xl font-bold mt-2">Pengalaman, Artikel & Kegiatan</h1>
      <p class="text-gray-400 mt-4 max-w-2xl mx-auto mb-10">
        Beragam dokumentasi pengalaman, artikel, dan kegiatan yang mencerminkan peran kami dalam bidang survei, pemetaan,
        serta pengembangan teknologi geospasial.
      </p>
      <form action="{{ request()->url() }}" method="GET" class="max-w-xl mx-auto relative group">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
          <svg class="h-5 w-5 text-gray-400 group-focus-within:text-orange-600 transition-colors"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
        <input type="text" name="search" value="{{ $search }}"
          placeholder="Cari artikel (misal: Digital Twin)..."
          class="w-full bg-slate-900 border border-slate-700 text-white pl-12 pr-4 py-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-transparent transition-all placeholder:text-gray-500 shadow-lg">
        @if ($search)
          <a href="{{ request()->url() }}"
            class="absolute inset-y-0 right-4 flex items-center text-gray-500 hover:text-white text-[10px] uppercase tracking-widest font-bold">
            Reset
          </a>
        @endif
      </form>
    </header>

    <main class="max-w-6xl mx-auto px-4 lg:px-0 py-12">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($articles as $article)
          <article
            class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-gray-100 group">
            <div class="h-52 bg-gray-200 overflow-hidden">
              <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            <div class="p-6">
              <div class="flex items-center gap-3 mb-3">
                <span
                  class="bg-orange-100 text-orange-600 text-xs font-bold px-3 py-1 rounded-full uppercase">{{ $article->category->name }}</span>
                <span class="text-gray-400 text-sm">{{ $article->created_at->translatedFormat('d F Y') }}</span>
              </div>
              <a href="/portofolio/pengalaman/{{ $article->slug }}" class="block">
                <h2 class="text-xl font-bold text-slate-900 group-hover:text-orange-600 transition-colors leading-tight">
                  {{ $article->title }}
                </h2>
              </a>
              <div class="mt-6">
                <a href="/portofolio/pengalaman/{{ $article->slug }}"
                  class="text-orange-600 font-semibold text-sm inline-flex items-center gap-1 hover:gap-2 transition-all">
                  Baca Selengkapnya <span>&rarr;</span>
                </a>
              </div>
            </div>
          </article>
        @empty
          <div class="col-span-full text-center py-20 bg-zinc-200/50 rounded-3xl border-2 border-dashed border-zinc-300">
            <p class="text-zinc-500 font-medium italic">Hasil untuk "{{ $search }}" tidak ditemukan.</p>
            <a href="{{ request()->url() }}" class="text-orange-600 font-bold mt-2 inline-block underline">Lihat semua
              artikel</a>
          </div>
        @endforelse

      </div>

      <!-- Pagination Section -->
      <div class="mt-16 flex justify-center items-center gap-2">

        {{-- Tombol Previous --}}
        @if ($articles->onFirstPage())
          <span
            class="w-10 h-10 rounded border border-gray-200 flex items-center justify-center text-gray-300 cursor-not-allowed">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </span>
        @else
          <a href="{{ $articles->previousPageUrl() }}"
            class="w-10 h-10 rounded border border-gray-300 flex items-center justify-center text-gray-600 hover:bg-orange-600 hover:text-white hover:border-orange-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </a>
        @endif

        {{-- Nomor Halaman Dinamis --}}
        @foreach ($articles->getUrlRange(max(1, $articles->currentPage() - 1), min($articles->lastPage(), $articles->currentPage() + 1)) as $page => $url)
          @if ($page == $articles->currentPage())
            {{-- Halaman Aktif --}}
            <span
              class="w-10 h-10 rounded border border-orange-600 bg-orange-600 flex items-center justify-center text-white font-bold shadow-sm">
              {{ $page }}
            </span>
          @else
            {{-- Halaman Lainnya --}}
            <a href="{{ $url }}"
              class="w-10 h-10 rounded border border-gray-300 flex items-center justify-center text-gray-600 hover:bg-orange-600 hover:text-white hover:border-orange-600 transition-colors">
              {{ $page }}
            </a>
          @endif
        @endforeach

        {{-- Tombol Next --}}
        @if ($articles->hasMorePages())
          <a href="{{ $articles->nextPageUrl() }}"
            class="w-10 h-10 rounded border border-gray-300 flex items-center justify-center text-gray-600 hover:bg-orange-600 hover:text-white hover:border-orange-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </a>
        @else
          <span
            class="w-10 h-10 rounded border border-gray-200 flex items-center justify-center text-gray-300 cursor-not-allowed">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </span>
        @endif
      </div>
      <div class="text-center mt-4">
        <p class="text-xs text-gray-400 uppercase tracking-widest">
          Menampilkan {{ $articles->firstItem() }} - {{ $articles->lastItem() }} dari {{ $articles->total() }} Artikel
        </p>
      </div>
      <!-- Pagination Section -->
    </main>
  </div>
@endsection
