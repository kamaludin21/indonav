@extends('layouts.app-v2', ['activePage' => 'home'])

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
  {{-- Section 1 --}}
  <div class="pb-20 px-2 md:px-44 pt-10">
    <div class="grid grid-cols-4 gap-8">
      <div class="w-full h-72 bg-orange-600 flex items-center justify-center p-4 rounded-2xl">
        <p class="text-xl font-medium text-slate-100 leading-6 tracking-wide">
          Explore our range of high-precision GNSS products where performance meets reliability.
        </p>
      </div>
      <div class="w-full h-72 bg-slate-200 flex flex-col items-center justify-center rounded-2xl group">
        <img
          src="https://geospatial.chcnav.com/dam/geospatial/products/Surveying-Engineering/GNSS-Smart-Antennas/i93/top_banner/gnss-smart-full-antennas-chcnav-i93.png0"
          class="w-1/2 group-hover:scale-110 duration-200" alt="">
        <p class="text-xl font-medium">CHCNAV i93</p>
      </div>
      <div class="w-full h-72 bg-slate-200 flex flex-col items-center justify-center rounded-2xl ">
        <img
          src="https://geospatial.chcnav.com/dam/geospatial/products/Surveying-Engineering/GNSS-Smart-Antennas/iBase/top_banner/gnss-smart-full-antennas-chcnav-ibase.png"
          class="w-1/2" alt="">
        <p class="text-xl font-medium">CHCNAV iBase</p>
      </div>
      <div class="w-full h-72 bg-slate-200 flex flex-col items-center justify-center rounded-2xl ">
        <img
          src="https://geospatial.chcnav.com/dam/geospatial/products/Surveying-Engineering/GNSS-Smart-Antennas/i89/top_banner/gnss-smart-full-antennas-chcnav-i89.png0"
          class="w-1/2" alt="">
        <p class="text-xl font-medium">CHCNAV i89</p>
      </div>
      <div class="w-full h-72 bg-slate-200 flex flex-col items-center justify-center rounded-2xl ">
        <img
          src="https://geospatial.chcnav.com/dam/geospatial/products/3d-mobile-mapping/Handheld-Laser-Scanners/RS10/top_banner/handheld--Laser-scanners-chcnav-RS10--1-.png"
          class="w-1/2" alt="">
        <p class="text-xl font-medium">CHCNAV RS10</p>
      </div>
      <div class="w-full h-72 bg-slate-200 flex flex-col items-center justify-center rounded-2xl ">
        <img
          src="https://geospatial.chcnav.com/dam/geospatial/products/3d-mobile-mapping/UAV-Platforms/x500/product_spec/PD-card/X500.png"
          class="w-1/2" alt="">
        <p class="text-xl font-medium">CHCNAV X500</p>
      </div>
      <div class="w-full h-72 bg-slate-800 flex items-center justify-center text-center p-4 rounded-2xl ">
        <p class="text-xl font-medium text-slate-100 leading-6 tracking-wide">
          Surveying and Engineering
        </p>
      </div>
      <div class="w-full h-72 bg-orange-600 flex items-center justify-center text-center p-4 rounded-2xl">
        <p class="text-xl font-medium text-slate-100 leading-6 tracking-wide">
          3D Mobile Mapping
        </p>
      </div>
    </div>
  </div>

  <hr>

  {{-- Section 2 --}}

  <div class="pb-20 grid gap-8 px-2 md:px-44 pt-10">
    <div class="flex w-full gap-4">
      <div class="w-1/4">
        <p class="text-5xl">Category 1</p>
      </div>
      <div class="flex-1 w-2/4 h-80 bg-slate-200 items-center justify-center flex">
        <p>Image 1</p>
      </div>
      <div class="w-1/4">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis ipsam, voluptate nihil illo aut accusantium
          assumenda. Dicta a nihil sunt earum architecto ex dolore nisi, amet dolores reprehenderit, molestias inventore.
        </p>
      </div>
    </div>
    <div class="flex w-full gap-4">
      <div class="w-1/4">
        <p class="text-5xl">Category 2</p>
      </div>
      <div class="flex-1 w-2/4 h-80 bg-slate-200 items-center justify-center flex">
        <p>Image 2</p>
      </div>
      <div class="w-1/4">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis ipsam, voluptate nihil illo aut accusantium
          assumenda. Dicta a nihil sunt earum architecto ex dolore nisi, amet dolores reprehenderit, molestias inventore.
        </p>
      </div>
    </div>
  </div>

  <hr>

  <div class="pb-20 grid gap-8 px-2 md:px-44 pt-10">
    <p class="text-2xl font-medium text-center">Why choose us</p>
    <div class="flex gap-6">
      <div class="w-1/3 items-center flex justify-center bg-slate-200 h-96">
        <p>Content 1</p>
      </div>
      <div class="w-1/3 items-center flex justify-center bg-slate-200 h-96">
        <p>Content 2</p>
      </div>
      <div class="w-1/3 items-center flex justify-center bg-slate-200 h-96">
        <p>Content 3</p>
      </div>
    </div>
  </div>
@endsection
