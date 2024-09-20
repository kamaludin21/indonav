@php
  use Carbon\Carbon;
  $news = App\Models\News::get();
@endphp

@extends('layouts.app')

@section('content')
  <div class="max-w-screen-lg space-y-10 py-20 mx-auto px-2 lg:px-0">
    <div class="text-start space-y-4 border-b">
      <h2 class="text-2xl md:text-4xl font-bold text-orange-400">News and Event</h2>
      <p class="text-base md:text-xl text-slate-500"></p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      @foreach ($news as $index => $item)
        <div class="w-full bg-white border border-gray-200 rounded-lg shadow">
          <a href="/about-us/news-event/{{ $item->slug }}">
            <img class="rounded-t-lg h-48 w-full object-cover" src="{{ asset('storage/'.$item->image) }}"
              alt="" />
          </a>
          <div class="p-5">
            <a href="/about-us/news-event/{{ $item->slug }}">
              <h5 class="mb-2 text-2xl line-clamp-2 font-bold tracking-tight text-gray-900">{{ $item->title }}
              </h5>
            </a>
            <p class="mb-3 font-normal line-clamp-3 text-gray-700">{{ $item->description }}</p>
            <a href="/about-us/news-event/{{ $item->slug }}"
              class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-400 rounded-lg hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-orange-300">
              Read more
              <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M1 5h12m0 0L9 1m4 4L9 9" />
              </svg>
            </a>
          </div>
        </div>
      @endforeach
    </div>


  </div>
@endsection
