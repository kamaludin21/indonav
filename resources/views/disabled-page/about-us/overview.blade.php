@php
  $sites = App\Models\Site::get()->keyBy('slug');
@endphp

@extends('layouts.app')

@section('content')
  <div class="max-w-screen-lg space-y-10 py-20 mx-auto  px-2 lg:px-0">
    <div class="text-start space-y-4 border-b">
      <h2 class="text-2xl md:text-4xl font-bold text-orange-400">Overview</h2>
      <p class="text-base md:text-xl text-slate-500"></p>
    </div>

    <div class="html-content">
      {!! $sites['overview']?->description !!}
    </div>
  </div>
@endsection
