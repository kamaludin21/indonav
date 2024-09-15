@php
  use Carbon\Carbon;
  $industry = App\Models\Industry::get();
  $slideshows = App\Models\Slideshow::get();
  // $news = App\Models\News::limit(7)->get();
  $sites = App\Models\Site::get()->keyBy('slug');
  $products = App\Models\Product::limit(6)->get();
@endphp

@extends('layouts.app')

@section('content')
  {{-- Carousel --}}
  <div class="w-full overflow-x-hidden">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        @foreach ($slideshows as $item)
          <div class="swiper-slide bg-no-repeat bg-center bg-cover"
            style="background-image: url('{{ asset('storage/' . $item->image) }}');">
            <div class="h-dvh flex max-w-screen-sm md:max-w-screen-lg mx-auto items-end md:items-center pb-[15%] px-[5%]">
              <div class="space-y-4">
                <h2 class="text-2xl md:text-5xl font-bold text-white drop-shadow-lg">{{ $item->title }}</h2>
                <p class="text-lg md:text-xl line-clamp-3 font-medium text-slate-100">
                  {{ $item->description }}
                </p>
                <div class="flex">
                  <a href="{{ $item->redirect ?? $item->slug }}"
                    class="bg-orange-400 w-fit px-4 py-2 text-white rounded-full">
                    <p>Selengkapnya</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <!-- Pagination -->
    <div class="">
      <div class="swiper-pagination"></div>
    </div>
    <!-- Navigation buttons -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
  {{-- Carousel End --}}

  {{-- News & Event --}}
  {{-- <div class="max-w-screen-lg space-y-10 py-20 mx-auto">
    <div class="text-center">
      <h2 class="text-3xl font-bold">News & Event</h2>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 p-2">
      @foreach ($news as $index => $item)
        <div class="{{ $index === 0 ? 'col-span-2' : '' }}">
          <img class="h-56 w-full object-cover" src="{{ asset('storage/' . $item->image) }}" alt="">
          <p class="text-slate-500 mt-2 font-light text-sm">
            {{ Carbon::parse($item->publish_date)->translatedFormat('l, j F Y') }}</p>
          <a href="/about-us/news-event/{{ $item->slug }}"
            class="text-xl font-bold leading-7 line-clamp-3 text-slate-700 hover:text-orange-400 hover:cursor-pointer hover:underline hover:underline-offset-2">
            {{ $item->title }}</a>
        </div>
      @endforeach


      <div class="h-full w-full flex items-center p-4 col-span-2 md:col-span-1 justify-center bg-orange-400">
        <a href="/about-us/news-event"
          class="text-2xl font-bold leading-7 line-clamp-3 text-slate-100 hover:text-white hover:cursor-pointer hover:underline hover:underline-offset-2">Selengkapnya</a>
      </div>
    </div>
  </div> --}}

  {{-- Industries --}}
  <div class="max-w-screen-lg space-y-10 py-20 mx-auto">
    <div class="text-center">
      <h2 class="text-3xl font-bold">Industries</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-2 md:px-0">
      @foreach ($industry as $item)
        <div class="bg-orange-100 flex flex-col justify-between p-6 space-y-2">
          <div class="pb-10 space-y-4">
            <p class="text-xl font-medium">{{ $item->title }}</p>
            <p class="text-base font-light line-clamp-3 text-slate-600">
              {{ $item->description }}
            </p>
          </div>
          <a href="/industries/{{ $item->slug }}"
            class="underline font-medium z-10 relative underline-offset-2 hover:underline-offset-4 duration-200">Selengkapnya</a>
        </div>
      @endforeach
    </div>
  </div>
    {{-- Industries End --}}

    {{-- Product --}}
    <div class="bg-orange-400 p-2 md:p-0">
      <div class="max-w-screen-lg space-y-10 py-20 mx-auto">
        <div class="flex items-center justify-between">
          <p class="text-3xl font-bold text-white">Products</p>
          <a href="/products" class="hover:bg-white hover:text-orange-400 px-2 whitespace-nowrap py-1 border rounded-full text-white">Selengkapnya</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 border ">
          @foreach ($products as $item)
          <div class="  p-4 hover:bg-white place-content-start border-b md:border-b-0 border-r group duration-200">
            <img class="drop-shadow-lg h-auto w-full" src="{{ asset('storage/'.$item->image) }}" alt="">
            <a href="/products/{{ $item->slug }}" class="text-2xl font-bold group-hover:text-orange-400 text-white hover:underline align-bottom">{{ $item->title }}</a>
          </div>
          @endforeach

        </div>
      </div>
    </div>
    {{-- Products End --}}

    {{-- Company --}}
    <div class="max-w-screen-lg space-y-10 py-20 mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-2 px-2 lg:px-0 gap-4">
        <div>
          <p class="text-4xl font-light text-slate-700">Tentang Kami</p>
        </div>
        <div class="space-y-4 text-base tracking-wide text-slate-600 html-content">
          {!! $sites['tentang-kami']?->description !!}
        </div>
      </div>
    </div>
    {{-- Company End --}}




    {{-- Contact  --}}

    {{-- <div class="bg-orange-400 px-[20%] text-center space-y-4 py-[5%] relative">

      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="absolute left-4 top-4 h-20 w-20 text-slate-200/10">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
      </svg>

      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="absolute left-40 top-20 h-20 w-20 text-slate-200/10">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M7 21l4 -12m2 0l1.48 4.439m.949 2.847l1.571 4.714" />
        <path d="M12 7m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
        <path d="M4 12c1.526 2.955 4.588 5 8 5c3.41 0 6.473 -2.048 8 -5" />
        <path d="M12 5v-2" />
      </svg>

      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="absolute right-40 top-40 h-20 w-20 text-slate-200/10">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
      </svg>

      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="absolute right-10 top-100 h-20 w-20 text-slate-200/10">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
        <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
      </svg>


      <p class="text-4xl font-bold tracking-wider text-white drop-shadow-lg">Ready to make switch?</p>
      <p class="text-base font-light tracking-wide text-slate-100 drop-shadow-lg">Subscribe to our Newsletter and stay
        informed about exciting developments, new products, case studies and exclusive invitations to events.</p>

      <button class="bg-white text-orange-400 py-2 px-3">
        Contact Us
      </button>

    </div> --}}
@endsection
