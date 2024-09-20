@php
  use Carbon\Carbon;
  $news = App\Models\News::where('slug', $slug)->first();
@endphp

@extends('layouts.app')

@section('content')
  <div class="max-w-screen-lg space-y-10 py-20 mx-auto px-2 lg:px-0">
    <div class="text-start space-y-4 border-b">
      <h2 class="text-2xl md:text-4xl font-bold text-orange-400">{{ $news->title }}</h2>
      <p class="text-base md:text-xl text-slate-500">
        {{ Carbon::parse($news->publish_date)->translatedFormat('l, j F Y') }}
      </p>
    </div>
    <div class="space-y-2">
      <img src="{{ asset('storage/'.$news->image) }}" alt="">

      <p class="text-base text-slate-600">{{ $news->description }}</p>
    </div>

    <div class="html-content text-lg">
      {!! $news->content !!}
    </div>

  </div>
@endsection
