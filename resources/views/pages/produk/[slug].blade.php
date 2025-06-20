@php
  $product = App\Models\Product::where('slug', $slug)->firstOrFail();
@endphp

@extends('layouts.app-v2', ['activePage' => 'produk'])

@push('header')
  {{-- TODO: Replace with product information --}}
  <meta property="og:title" content="{{ $product->title }}">
  <meta property="og:description"
    content="{{ $product->description }}">
  <meta property="og:url" content="https://www.indonavtech.co.id/produk/{{ $product->slug }}">
  <meta property="og:type" content="website">
  <meta property="og:image" content="{{ asset('storage/' . $product->image_highlight) }}">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:site_name" content="Indonav">
@endpush

@section('content')
  {{-- Product Nav --}}
  <div class="py-5 bg-slate-800 text-slate-100 w">
    <div class="flex gap-2 flex-wrap justify-between items-center max-w-screen-lg px-2 md:px-0 mx-auto">
      <p class="text-lg font-medium">{{ $product->title }}</p>
      <div>
        <ul class="flex gap-2 tracking-wide text-sm font-medium uppercase">
          <li>highlight</li>
          <li>spesification</li>
          <li>download</li>
        </ul>
      </div>
    </div>
  </div>
  {{-- Product header --}}
  <div class="w-full bg-slate-200">
    <div class="max-w-screen-lg px-2 md:px-0 mx-auto py-16">
    <div class="flex flex-wrap justify-between items-center relative">
      <div class="order-2 md:order-1 grid gap-2">
        <p class="text-5xl font-bold text-slate-800">{{ $product->title }}</p>
        <p class="text-2xl font-light text-slate-700">{{ $product->description }}</p>
      </div>
      <div class="z-10 order-1 md:order-2">
        <img src="{{ asset('img/product1.png') }}" class="w-72 h-auto" alt="">
      </div>
      {{-- Absolute el: --}}
      <div class="hidden sm:block absolute top-2/3 w-full z-0 overflow-hidden">
        <p class="text-9xl font-bold text-slate-100 whitespace-nowrap text-right">{{ $product->title }}</p>
      </div>
    </div>
  </div>
  </div>

  {{-- Highlight section --}}
  <div class="max-w-screen-lg px-2 md:px-0 mx-auto py-16">
    <p class="text-4xl text-orange-600 font-bold">Highlight</p>
    <hr class="my-4">
    <div class="flex flex-col md:flex-row items-start gap-6">
      <div class="w-full md:w-1/3">
        {{-- Slidable --}}
        <img class="w-full h-auto bg-cover rounded-lg"
          src="{{ asset('storage/' . $product->image_highlight) }}"
          alt="{{ $product->title }}">
      </div>
      <div class="flex-1 grid gap-2 text-lg text-slate-700">
        {!! $product->highlight !!}
      </div>
    </div>
  </div>

  {{-- Feature Section --}}
  <div class="max-w-screen-lg px-2 md:px-0 mx-auto py-16">
    <p class="text-4xl text-orange-600 font-bold text-center mb-16">Main Features</p>
    <div class="flex flex-wrap justify-center gap-16">
      @foreach ($product->features as $item)
      <div class="w-full md:w-1/4 grid justify-items-center gap-2 hover:bg-slate-200 duration-200 p-2
      rounded-lg">
        <img
          src="{{ asset('storage/' . $item['image']) }}"
          class="h-32 w-32 bg-cover rounded-lg" alt="{{ $item['title'] }}">
        <p class="text-2xl font-semibold text-slate-800">{{ $item['title'] }}</p>
        <p class="text-normal text-center text-slate-700">{{ $item['description'] }}</p>
      </div>
      @endforeach
    </div>
  </div>

  {{-- Feature Section --}}
  <div class="max-w-screen-lg px-2 md:px-0 mx-auto py-16">
    <p class="text-4xl text-orange-600 font-bold text-center mb-16">Specifications</p>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
      @foreach ($product->specifications as $item)
      <div class="border border-slate-400 bg-white rounded-lg p-4">
        <p>{{ $item['title'] }}</p>
        <div class="h-4"></div>
        <a href="{{ asset('storage/' . $item['document']) }}" class="flex w-fit gap-2 bg-orange-600 text-white px-2 py-1 rounded-md" target="_blank">
          <span>UNDUH</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
            <path d="M7 11l5 5l5 -5" />
            <path d="M12 4l0 12" />
          </svg>
        </a>
      </div>
       @endforeach

      {{-- <div class="border border-slate-400 bg-white rounded-lg p-4">
        <p>i89_EN.pdf</p>
        <p>2.40 MB</p>
        <div class="h-4"></div>
        <button class="flex gap-2 bg-orange-600 text-white px-2 py-1 rounded-md">
          <span>UNDUH</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
            <path d="M7 11l5 5l5 -5" />
            <path d="M12 4l0 12" />
          </svg>
        </button>
      </div> --}}
    </div>
  </div>

  {{-- Other Product Section --}}
  {{-- <div class="bg-white max-w-screen-lg px-2 md:px-0 mx-auto py-16">
    <p class="text-4xl text-orange-600 font-bold mb-16">Other Product</p>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">

      <div class="grid gap-2 items-center justify-items-center text-center">
        <img class="w-full md:w-2/3 h-auto bg-cover"
          src="https://geospatial.chcnav.com/dam/jcr:44442276-c8b3-4647-b4ee-d7f962f2caa8/Software-chcnav-Copre-320.png"
          alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV CoPre</p>

        <button
          class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>

       <div class="grid gap-2 items-center justify-items-center text-center">
        <img class="w-full md:w-2/3 h-auto bg-cover"
          src="https://geospatial.chcnav.com/dam/jcr:ca3f4b61-d5ef-4e6a-9d09-3157fc5c6dd7/gnss-smart-full-antennas-chcnav-i93.png"
          alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV i93</p>

        <button
          class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>

       <div class="grid gap-2 items-center justify-items-center text-center">
        <img class="w-full md:w-2/3 h-auto bg-cover"
          src="https://geospatial.chcnav.com/dam/jcr:a2f7717b-e17a-4d4d-bc37-ba64a12b0591/controllers-Tablets-chcnav-HCE600%20(1).png"
          alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV HCE600</p>

        <button
          class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>

       <div class="grid gap-2 items-center justify-items-center text-center">
        <img class="w-full md:w-2/3 h-auto bg-cover"
          src="https://geospatial.chcnav.com/dam/jcr:36a5fc69-0a83-4f59-bfab-8db5bcfd0ef2/Total-Station-chcnav-cts-a100.png"
          alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV CTS-A100</p>

        <button
          class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>

    </div>
  </div> --}}
@endsection
