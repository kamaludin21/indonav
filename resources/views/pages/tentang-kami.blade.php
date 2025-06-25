@php
  $sites = App\Models\Site::get()->keyBy('slug');
@endphp

@extends('layouts.app-v2', ['activePage' => 'about'])

@push('header')
  <title>Tentang Kami | INDONAV</title>
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
  <div class="max-w-screen-lg px-2 md:px-0 mx-auto py-16 grid gap-8">
    <div>
      <p class="text-5xl text-slate-800 font-bold">Tentang Kami</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 items-start gap-10">
      {{-- Follow Us --}}
      <div class="order-3 md:order-1 place-self-end w-full">
        <div class="py-1 border-b border-slate-300">
          <p class="text-lg font-medium text-slate-700">Ikuti kami</p>
        </div>
        <a href="{!! $sites['linkedin']?->url !!}" target="_blank">
          <div
            class="py-1 border-b border-slate-300 hover:bg-orange-50 duration-200 flex w-full items-center justify-between">
            <p class="text-base text-slate-700">Linkedin</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-4 h-4 text-orange-600">
              <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
            </svg>
          </div>
        </a>
        <a href="{!! $sites['instagram']?->url !!}" target="_blank">
          <div
            class="py-1 border-b border-slate-300 hover:bg-orange-50 duration-200 flex w-full items-center justify-between">
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
    </div>
  </div>
  <hr>
@endsection
