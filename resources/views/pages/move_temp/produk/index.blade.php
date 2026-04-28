@php
  $industry = App\Models\Industry::get();
  $products = App\Models\Product::orderByDesc('updated_at')->paginate(8);
@endphp

@extends('layouts.app-v2', ['activePage' => 'produk'])

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
  <div class="bg-slate-100">
    <div class="max-w-screen-lg px-2 md:px-0 mx-auto py-16 space-y-4">
      <p class="text-4xl text-orange-600 font-bold mb-10">Jelajah Produk</p>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($industry as $item)
          <div class="flex h-full rounded border border-slate-300">
            <div class="w-1/2">
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
            <div class="w-1/2 p-2 space-y-2">
              <p class="text-xl font-medium text-slate-800">{{ $item->title }}</p>
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
    </div>
  </div>
@endsection
