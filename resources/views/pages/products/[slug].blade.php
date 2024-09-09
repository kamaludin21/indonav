@php
  $productCategory = App\Models\productCategory::where('slug', $slug)->first();
  $product = App\Models\Product::where('product_category_id', $productCategory->id)->get();
@endphp

@extends('layouts.app')

@section('content')
  <div class="max-w-screen-lg space-y-10 py-20 mx-auto  px-2 md:px-0">
    <div class="text-start space-y-4 border-b">
      <h2 class="text-2xl md:text-4xl font-bold text-orange-400">Product <span class="text-xl text-slate-600">{{ $productCategory->title }}</span></h2>
      <p class="text-base md:text-xl text-slate-500"></p>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3">
      @foreach ($product as $item)
        <a href="/products/detail/{{ $item->slug }}"
          class="flex items-center border border-gray-200 bg-white px-4 py-2 hover:bg-orange-400 hover:text-white">
          <span class="text-sm font-medium">
            {{ $item->title }}
          </span>
        </a>
      @endforeach
    </div>
  </div>
@endsection
