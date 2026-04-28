@php
  $sites = App\Models\Site::get()->keyBy('slug');
@endphp

@extends('layouts.app-v3', ['activePage' => 'kontak'])

@push('header')
  <title>Kontak | INDONAV</title>
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
  <div class="h-14"></div>
  {{-- Section 3 --}}
  <div class="max-w-screen-lg px-6 lg:px-0 mx-auto py-20">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

      <div class="">
        <img src="{{ asset('img/company.jpeg') }}"
          class="w-full opacity-80" alt="Indonav Contact">
      </div>
      <div class="grid grid-cols-1 gap-6 border-l border-slate-200 pl-0 pl-4 md:pl-12">
        <div class="lg:col-span-1">
          <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">
            Informasi Kontak
          </h2>
        </div>
        <div class="pt-6 border-t border-slate-100">
          <p class="text-xs font-semibold uppercase tracking-widest text-slate-400 mb-2">Layanan Telepon</p>
          <a href="tel:{{ strip_tags($sites['phone']?->description) }}"
            class="text-lg font-medium text-slate-800 hover:text-blue-700 transition-colors duration-200">
            {{ strip_tags($sites['phone']?->description) }}
          </a>
          <p class="text-sm text-slate-400 mt-1">Tersedia pada jam kerja (08:00 - 18:00)</p>
        </div>
        <div class="pt-6 border-t border-slate-100">
          <p class="text-xs font-semibold uppercase tracking-widest text-slate-400 mb-2">Korespondensi Email</p>
          <a href="mailto:{{ strip_tags($sites['email']?->description) }}"
            class="text-lg font-medium text-slate-800 hover:text-blue-700 transition-colors duration-200 break-words">
            {{ strip_tags($sites['email']?->description) }}
          </a>  
        </div>
        <div class="pt-6 border-t border-slate-100">
          <p class="text-xs font-semibold uppercase tracking-widest text-slate-400 mb-2">Kantor Operasional</p>
          <p class="text-lg text-slate-700 leading-snug">
            {{ strip_tags($sites['alamat']?->description) }}
          </p>
        </div>
      </div>
    </div>
  </div>
  <hr class="border-slate-100">s
@endsection
