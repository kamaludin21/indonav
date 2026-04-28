@php
  $sites = App\Models\Site::get()->keyBy('slug');
  $industry = App\Models\Industry::limit(5)->get();
  $products = App\Models\Product::orderByDesc('created_at')->limit(5)->get();
  $partners = App\Models\Partner::orderBy('order', 'asc')->get();
  $tags = App\Models\Tag::with([
      'products' => function ($q) {
          $q->limit(4);
      },
  ]) ->limit(5)
      ->get();
@endphp

@extends('layouts.app-v3', ['activePage' => 'home'])

@section('content')
  {{-- Buat overlay video  --}}
  <section class="relative h-screen w-full overflow-hidden">
    <video autoplay muted loop playsinline class="absolute z-0 min-w-full min-h-full object-cover">
      <source src="{{ asset('videos/view_karimun.mp4') }}" type="video/mp4">
      Your browser does not support the video tag.
    </video>

    <div class="absolute inset-0 z-10 bg-black/40"></div>

    <div class="relative z-20 flex h-full items-center justify-center text-center px-4">
      <div class="max-w-3xl text-white">
        <h1 class="text-5xl md:text-7xl font-bold mb-6 tracking-tight">
          <span class="text-orange-500">Indonav</span> Teknologi
        </h1>
        <p class="text-lg md:text-xl mb-8 text-gray-200">
          Solusi survei darat, laut, dan udara terintegrasi dengan teknologi terkini dan layanan profesional akurat.
        </p>
        <div class="flex gap-4 justify-center">
          <button class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-full font-semibold transition">
            Mulai Konsultasi
          </button>
          <button
            class="bg-white/10 hover:bg-white/20 backdrop-blur-md text-white border border-white/30 px-8 py-3 rounded-full font-semibold transition">
            Pelajari Lebih Lanjut
          </button>
        </div>
      </div>
    </div>
  </section>

  <div class="w-full space-y-12">
    <x-commons.slider :partners="$partners" />
    <x-commons.line>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"
        class="h-7 w-auto text-orange-600">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M7 21l4 -12m2 0l1.48 4.439m.949 2.847l1.571 4.714" />
        <path d="M10 7a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
        <path d="M4 12c1.526 2.955 4.588 5 8 5c3.41 0 6.473 -2.048 8 -5" />
        <path d="M12 5v-2" />
      </svg>
    </x-commons.line>
    <x-commons.products :tags="$tags" />
    <x-commons.line>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"
        class="h-7 w-auto text-orange-600">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
        <path d="M12 12l8 -4.5" />
        <path d="M12 12l0 9" />
        <path d="M12 12l-8 -4.5" />
      </svg>
    </x-commons.line>
    <x-commons.solutions />
    <x-commons.line>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"
        class="h-7 w-auto text-orange-600">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M10 10h4v4h-4l0 -4" />
        <path d="M10 10l-3.5 -3.5" />
        <path d="M9.96 6a3.5 3.5 0 1 0 -3.96 3.96" />
        <path d="M14 10l3.5 -3.5" />
        <path d="M18 9.96a3.5 3.5 0 1 0 -3.96 -3.96" />
        <path d="M14 14l3.5 3.5" />
        <path d="M14.04 18a3.5 3.5 0 1 0 3.96 -3.96" />
        <path d="M10 14l-3.5 3.5" />
        <path d="M6 14.04a3.5 3.5 0 1 0 3.96 3.96" />
      </svg>
    </x-commons.line>
    <x-commons.cta />
  </div>
@endsection
