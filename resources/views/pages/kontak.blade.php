@php
  $sites = App\Models\Site::get()->keyBy('slug');
@endphp

@extends('layouts.app-v2', ['activePage' => 'kontak'])

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
  {{-- Section 3 --}}
  <div class="max-w-screen-lg px-2 md:px-0 mx-auto py-16 grid gap-8">
    <div>
      <p class="text-5xl text-slate-800 font-bold">Silakan hubungi kami</p>
    </div>
    <div class="flex flex-col md:flex-row items-start gap-4">
      <div class="w-full md:w-1/2 grid gap-4 order-2 md:order-1 ">
        <p class="text-2xl text-slate-700 font-medium">Jangan ragu untuk menyapa kami</p>
        <div>
          <p class="text-slate-600">Nomor telepon</p>
          <a href="tel:{{ strip_tags($sites['phone']?->description) }}">
            <p class="text-slate-700 font-medium">{{ strip_tags($sites['phone']?->description) }}</p>
          </a>
        </div>
        <div>
          <p class="text-slate-600">Alamat email</p>
          <a href="mailto:{{ strip_tags($sites['email']?->description) }}">
            <p class="text-slate-700 font-medium">{{ strip_tags($sites['email']?->description) }}</p>
          </a>
        </div>
        <div>
          <p class="text-slate-600">Alamat</p>
          <p class="text-slate-700 font-medium">{{ strip_tags($sites['alamat']?->description) }}</p>
        </div>
      </div>
      <div class="order-1 md:order-2 w-full md:w-1/2">
        <img src="{{ asset('img/hello-robot.png') }}" class="w-1/2 mx-auto" alt="">
      </div>
    </div>
  </div>
  <hr>
@endsection
