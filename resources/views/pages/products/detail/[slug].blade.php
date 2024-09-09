@php
  $product = App\Models\Product::where('slug', $slug)->first();
  $productCategory = App\Models\ProductCategory::where('id', $product->product_category_id)->first();
@endphp

@extends('layouts.app')

@section('content')
  <div class="max-w-screen-lg space-y-10 py-20 mx-auto  px-2 md:px-0">
    <div class="text-start space-y-4 border-b">
      <h2 class="text-2xl md:text-4xl font-bold text-orange-400">Product <span class="text-xl text-slate-600">{{ $productCategory->title }}</span></h2>
      <p class="text-base md:text-xl text-slate-500"></p>
    </div>

    <div class="flex items-center">
     <div class="space-y-2 flex-1">
      <h2 class="text-4xl font-bold">{{ $product->title }}</h2>
      <p class="text-lg font-medium text-slate-600">{{ $product->description }}</p>
     </div>
     <div class="flex-1">
      <img class="w-full h-auto" src="{{ asset('storage/'.$product->image) }}" alt="">
     </div>
    </div>

    <div class="html-content">
      {!! $product->content !!}
    </div>
  </div>
@endsection
