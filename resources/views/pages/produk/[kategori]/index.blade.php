@php
  // 1. Tangkap input dan data dasar
  $search = request('search');
  $tagFilter = request('tag');
  $industry = App\Models\Industry::orderBy('title', 'asc')->get();

  // 2. Definisikan $getIndustry di luar IF/ELSE agar selalu tersedia untuk SEO dan Filter
  // $kategori berasal dari Route parameter
  $getIndustry = App\Models\Industry::where('slug', $kategori)->firstOrFail();

  if ($search) {
      // PENCARIAN GLOBAL (Mengabaikan industry_id)
      $products = App\Models\Product::query()
          ->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($search) . '%'])
          ->when($tagFilter, function ($query, $tagFilter) {
              return $query->whereHas('tags', function ($q) use ($tagFilter) {
                  $q->where('slug', $tagFilter);
              });
          })
          ->paginate(12)
          ->withQueryString();

      $pageTitle = 'Hasil Pencarian: ' . $search;
  } else {
      // FILTER PER KATEGORI (Default browsing)
      $products = App\Models\Product::where('industry_id', $getIndustry->id)
          ->when($tagFilter, function ($query, $tagFilter) {
              return $query->whereHas('tags', function ($q) use ($tagFilter) {
                  $q->where('slug', $tagFilter);
              });
          })
          ->paginate(12)
          ->withQueryString();

      $pageTitle = $getIndustry->title;
  }

  // 3. Ambil Tags yang relevan
  // Jika sedang mencari global, tampilkan semua tag. Jika di kategori, tampilkan tag kategori tersebut.
  $allTags = App\Models\Tag::whereHas('products', function ($q) use ($search, $getIndustry) {
      if (!$search) {
          $q->where('industry_id', $getIndustry->id);
      }
  })->get();
@endphp
@extends('layouts.app-v3', ['activePage' => 'produk'])

@push('header')
  <title>{{ $getIndustry->title }} | INDONAV</title>
  <meta name="title" content="{{ $getIndustry->title }} | INDONAV">
  <meta name="description"
    content="Temukan beragam produk solusi pemetaan dan survei dari INDONAV untuk kebutuhan {{ $getIndustry->title }}.">

  {{-- OG Tags --}}
  <meta property="og:title" content="{{ $getIndustry->title }} | INDONAV">
  <meta property="og:description" content="Solusi presisi tinggi untuk dunia {{ $getIndustry->title }} dari INDONAV.">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:type" content="website">
  <meta property="og:image" content="{{ asset('storage/' . $getIndustry->image) }}">
@endpush

@section('content')
  <div class="h-16"></div>
  <div class="bg-white pb-20">

    {{-- Judul Halaman --}}
    <div class="capitalize text-center mt-20 mb-10 px-4">
      <p class="text-4xl md:text-5xl text-slate-800 font-bold">
        Koleksi Produk <span class="text-orange-500">{{ $getIndustry->title }}</span>
      </p>
    </div>

    <div class="max-w-6xl px-4 md:px-0 mx-auto space-y-8">

      {{-- SEARCH BAR --}}
      <div class="flex justify-center">
        <form action="{{ url()->current() }}" method="GET" class="relative w-full md:w-2/3 lg:w-1/2">
          {{-- Tetap simpan filter tag saat mencari --}}
          @if ($tagFilter)
            <input type="hidden" name="tag" value="{{ $tagFilter }}">
          @endif

          <input type="text" name="search" value="{{ $search }}" placeholder="Cari model atau spesifikasi..."
            class="w-full pl-12 pr-4 py-4 rounded-2xl border-2 border-slate-100 focus:border-orange-500 focus:ring-0 transition-all outline-none shadow-sm text-lg">
          <div class="absolute left-4 top-4 text-slate-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
        </form>
      </div>

      {{-- FILTER SECTION --}}
      <div class="space-y-6">
        {{-- 1. Chips Kategori (Industri) --}}
        <div class="flex flex-col md:flex-row md:items-center gap-3">
          <span class="text-xs font-bold uppercase text-slate-400 tracking-widest">Kategori:</span>
          <div class="flex flex-wrap gap-2">
            {{-- <a href="/produk"
              class="px-4 py-1.5 rounded-full text-sm font-medium transition-all bg-slate-100 text-slate-600 hover:bg-slate-200">
              Semua
            </a> --}}
            @foreach ($industry as $item)
              <a href="/produk/{{ $item->slug }}"
                class="px-4 py-1.5 rounded-full text-sm font-medium transition-all {{ $item->slug === $kategori ? 'bg-orange-600 text-white shadow-md shadow-orange-100' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                {{ $item->title }}
              </a>
            @endforeach
          </div>
        </div>

        {{-- 2. Chips Tags (Sub-Filter) --}}
        @if ($allTags->count() > 0)
          <div class="flex flex-col md:flex-row md:items-center gap-3 border-t border-slate-100 pt-6">
            <span class="text-xs font-bold uppercase text-slate-400 tracking-widest">Filter Tag:</span>
            <div class="flex flex-wrap gap-2">
              <a href="{{ url()->current() }}?{{ http_build_query(request()->except('tag', 'page')) }}"
                class="px-4 py-1.5 rounded-full text-xs font-semibold uppercase transition-all {{ !$tagFilter ? 'bg-slate-800 text-white' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                Semua Tag
              </a>
              @foreach ($allTags as $tag)
                <a href="{{ url()->current() }}?{{ http_build_query(array_merge(request()->query(), ['tag' => $tag->slug, 'page' => 1])) }}"
                  class="px-4 py-1.5 rounded-full text-xs font-semibold uppercase transition-all {{ $tagFilter === $tag->slug ? 'bg-slate-800 text-white shadow-md' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                  {{ $tag->name }}
                </a>
              @endforeach
            </div>
          </div>
        @endif
      </div>

      {{-- PRODUCT GRID --}}
      <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
        @forelse ($products as $item)
          <div
            class="bg-white ring-1 ring-zinc-200 rounded-xl flex flex-col h-full hover:shadow-xl transition-all duration-300 group overflow-hidden">
            {{-- Image Area --}}
            <div class="h-48 flex items-center justify-center p-6 bg-slate-50/50 relative">
              <img src="{{ asset('storage/' . $item->image_product) }}"
                class="max-h-full max-w-full object-contain group-hover:scale-110 duration-500"
                alt="{{ $item->title }}">
            </div>

            {{-- Text Area --}}
            <div class="p-4 border-t border-zinc-100 flex flex-col flex-grow">
              <div class="flex-grow space-y-2">
                <h3
                  class="text-lg font-bold text-slate-900 line-clamp-1 group-hover:text-orange-600 transition-colors uppercase">
                  {{ $item->title }}
                </h3>
                <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed min-h-[32px]">
                  {{ $item->description }}
                </p>
              </div>

              {{-- Footer Card --}}
              <div class="flex items-center justify-between border-t border-dashed border-orange-200 pt-4 mt-4">
                <span
                  class="text-[10px] font-bold text-orange-600 bg-orange-50 px-2 py-1 rounded border border-orange-100 uppercase">
                  {{ $item->tags->first()->name ?? 'Produk' }}
                </span>
                <a href="/produk/{{ $item->industry->slug }}/{{ $item->slug }}"
                  class="flex items-center text-xs font-bold text-slate-800 hover:text-orange-600 gap-1 transition-colors">
                  Detail <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        @empty
          <div
            class="col-span-full flex flex-col items-center justify-center text-center py-20 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200">
            <p class="text-xl font-bold text-slate-800">Oops! Produk tidak ditemukan</p>
            <p class="text-sm text-slate-500 mt-1">Coba hapus filter atau cari dengan kata kunci lain.</p>
          </div>
        @endforelse
      </div>

      {{-- CUSTOM PAGINATION --}}
      @if ($products->hasPages())
        <div class="mt-16 pt-10 border-t border-slate-100 flex flex-col items-center gap-6">
          <div class="flex justify-center items-center gap-2">
            {{-- Previous --}}
            @if ($products->onFirstPage())
              <span
                class="w-10 h-10 rounded-xl border border-slate-100 flex items-center justify-center text-slate-200 cursor-not-allowed">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
              </span>
            @else
              <a href="{{ $products->previousPageUrl() }}"
                class="w-10 h-10 rounded-xl border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-orange-600 hover:text-white transition-all shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
              </a>
            @endif

            {{-- Page Numbers --}}
            @foreach ($products->getUrlRange(max(1, $products->currentPage() - 1), min($products->lastPage(), $products->currentPage() + 1)) as $page => $url)
              @if ($page == $products->currentPage())
                <span
                  class="w-10 h-10 rounded-xl bg-orange-600 flex items-center justify-center text-white font-bold shadow-md shadow-orange-100 ring-2 ring-orange-100">
                  {{ $page }}
                </span>
              @else
                <a href="{{ $url }}"
                  class="w-10 h-10 rounded-xl border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-orange-600 hover:text-white transition-all shadow-sm">
                  {{ $page }}
                </a>
              @endif
            @endforeach

            {{-- Next --}}
            @if ($products->hasMorePages())
              <a href="{{ $products->nextPageUrl() }}"
                class="w-10 h-10 rounded-xl border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-orange-600 hover:text-white transition-all shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </a>
            @else
              <span
                class="w-10 h-10 rounded-xl border border-slate-100 flex items-center justify-center text-slate-200 cursor-not-allowed">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </span>
            @endif
          </div>

          <p class="text-[10px] text-slate-400 uppercase tracking-[0.2em] font-semibold">
            Menampilkan {{ $products->firstItem() }} - {{ $products->lastItem() }} dari {{ $products->total() }} Produk
          </p>
        </div>
      @endif

    </div>
  </div>
@endsection
