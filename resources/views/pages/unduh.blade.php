@php
  $sites = App\Models\Site::get()->keyBy('slug');
  $products = App\Models\Product::whereNotNull('specifications')
      ->whereRaw('JSON_LENGTH(specifications) > 0')
      ->paginate(2);
@endphp

@extends('layouts.app-v2', ['activePage' => ''])

@push('header')
  <title>Unduh | INDONAV</title>
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
  {{-- Section 3 --}}
  <div class="max-w-screen-lg px-2 md:px-0 mx-auto py-16 grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
    <div class="col-span-full">
      <p class="text-5xl text-slate-800 font-bold">Unduh Dokumen</p>
    </div>
    @foreach ($products as $item)
      <div class="bg-white border-2 border-slate-200 rounded-lg shadow-md p-4 flex flex-col justify-between">
        <div class="space-y-4 ">
          <h3 class="text-xl font-semibold text-slate-700 mb-4">{{ $item->title }}</h3>
          <hr>
          @if (is_array($item->specifications))
            @foreach ($item->specifications as $specs)
              <div class="space-y-0">
                <p class="text-lg text-slate-600 font-medium">{{ $specs['title'] }}</p>
                <a href="{{ asset('storage/' . $item['document']) }}" target="_blank"
                  class="mt-4 inline-flex items-center w-full justify-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                  <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                  </svg>
                  Download
                </a>
              </div>
            @endforeach
          @else
            <p class="text-slate-600">Data dokumen kosong</p>
          @endif
        </div>
      </div>
    @endforeach
    <div class="">
      {{ $products->links() }}
    </div>
  </div>
  <hr>
@endsection
