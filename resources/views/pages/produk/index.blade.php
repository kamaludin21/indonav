@php
  $industry = App\Models\Industry::get();
  $products = App\Models\Product::orderByDesc('updated_at')->get();
@endphp

@extends('layouts.app-v2', ['activePage' => 'produk'])

@section('content')
  <div class="bg-slate-100">
    <div class="max-w-screen-lg px-2 md:px-0 mx-auto py-16">
      <p class="text-4xl text-orange-600 font-bold mb-10">Semua Produk</p>
      <div class="border-y border-slate-300 py-3 mb-4 md:mb-6">
        <ul class="flex flex-wrap gap-4 text-sm font-normal text-slate-700">
          <li class="font-medium text-orange-600">Semua Produk</li>
          @foreach ($industry as $item)
            <li class="hover:text-orange-600"><a href="/produk/kategori/{{ $item->slug }}">
                {{ $item->title }}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
        @forelse ($products as $item)
          <div class="bg-white grid justify-items-center gap-4 flex flex-col w-full p-4 hover:rounded-lg items-center">
            <img src="{{ asset('storage/' . $item->image_product) }}" class="w-2/3" alt="{{ $item->title }}">
            <p class="text-lg font-semibold tracking-wide text-slate-700">{{ $item->title }}</p>
            <p class="text-base font-normal tracking-wide text-slate-600 text-center">{{ $item->description }}</p>
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
          </div>
        @endforelse
      </div>
    </div>
  </div>
@endsection
