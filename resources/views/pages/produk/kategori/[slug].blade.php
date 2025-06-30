@php
  $industry = App\Models\Industry::get();
  $getIndustry = App\Models\Industry::where('slug', $slug)->firstOrFail();
  $products = App\Models\Product::where('industry_id', $getIndustry->id)->get();
@endphp

@extends('layouts.app-v2', ['activePage' => 'produk'])

@push('header')
  <title>{{ $getIndustry->title }} | INDONAV</title>
  <meta name="title" content="{{ $getIndustry->title }} | INDONAV">
  <meta name="description"
    content="Temukan beragam produk solusi pemetaan dan survei dari INDONAV untuk kebutuhan Surveying & Engineering.">
  <meta name="keywords"
    content="surveying, engineering, pemetaan, GNSS, total station, geospasial, solusi survei, indonav, CHC Navigation">

  <meta property="og:title" content="{{ $getIndustry->title }} | INDONAV">
  <meta property="og:description" content="Solusi presisi tinggi untuk dunia {{ $getIndustry->title }} dari INDONAV.">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:type" content="website">
  <meta property="og:image" content="{{ asset('storage/' . $getIndustry->image) }}">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:site_name" content="INDONAV">
@endpush

@section('content')
  <div class="bg-slate-100">
    <div class="max-w-screen-lg px-2 lg:px-0 mx-auto py-16">
      <p class="text-4xl text-orange-600 font-bold mb-10">Semua Produk</p>
      <div class="border-y border-slate-300 py-3 mb-4 md:mb-6">
        <ul class="flex flex-wrap gap-4 text-sm font-normal text-slate-700">
          <li class="hover:underline underline-offset-2">
            <a href="/produk">Semua Produk</a>
          </li>
          @foreach ($industry as $item)
            <li class="hover:underline underline-offset-2">
              <a href="/produk/kategori/{{ $item->slug }}"
                class="{{ $item->slug === $slug ? 'text-orange-600 font-semibold' : '' }}">
                {{ $item->title }}</a>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
        @forelse  ($products as $item)
          <div class="bg-white grid justify-items-center gap-4 flex flex-col w-full p-4 hover:rounded-lg items-center">
            <img src="{{ asset('storage/' . $item->image_product) }}" class="w-2/3" alt="{{ $item->title }}">
            <p class="text-lg font-semibold tracking-wide text-slate-700 line-clamp-2">{{ $item->title }}</p>
            <p class="text-base font-normal tracking-wide text-slate-600 text-center line-clamp-2">
              {{ $item->description }}</p>
            <a href="/produk/{{ $item->slug }}"
              class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
              <span class="text-sm font-medium">
                Selengkapnya
              </span>
            </a>
          </div>
        @empty
          <div
            class="col-span-2 md:col-span-4 flex flex-col items-center justify-center text-center py-10 text-slate-600">
            <p class="text-xl font-semibold">Produk belum tersedia</p>
            <p class="text-sm">Silakan cek kategori lainnya.</p>
          </div>
        @endforelse


      </div>
    </div>
  </div>
@endsection
