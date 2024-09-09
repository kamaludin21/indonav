@php
  $subIndustry = App\Models\SubIndustry::where('industry_id', $industry->id)->get();
@endphp

@extends('layouts.app')

@section('content')
  <div class="max-w-screen-lg space-y-10 px-2 md:px-0 py-20 mx-auto">

    <div class="text-start space-y-4">
      <h2 class="text-2xl md:text-4xl font-bold text-orange-400">{{ $industry->title }}</h2>
      <div >
        <img class="w-full h-auto" src="{{ asset('storage/'.$industry->image) }}" alt="">
      </div>
      <p class="text-base md:text-xl text-slate-500">{{ $industry->description }}</p>
    </div>
    <div id="accordion-collapse" data-accordion="collapse" class="border-b">
      @foreach ($subIndustry as $index => $item)
        <h2 id="accordion-collapse-heading-{{ $index + 1 }}">
          <button type="button"
            class="flex w-full items-center justify-between gap-3 @if ($loop->first) rounded-t-xl @endif border border-b-0 border-gray-200 p-5 font-medium text-gray-500 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rtl:text-right"
            data-accordion-target="#accordion-collapse-body-{{ $index + 1 }}"
            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
            aria-controls="accordion-collapse-body-{{ $index + 1 }}">
            <span>{{ $item->title }}</span>
            <svg data-accordion-icon class="h-3 w-3 shrink-0 @if (!$loop->first) rotate-180 @endif"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5 5 1 1 5" />
            </svg>
          </button>
        </h2>
        <div id="accordion-collapse-body-{{ $index + 1 }}" class="@if (!$loop->first) hidden @endif"
          aria-labelledby="accordion-collapse-heading-{{ $index + 1 }}">
          <div class="border border-b-0 border-gray-200 p-5">
            <p class="mb-2 text-gray-500">{{ $item->description }}</p>
          </div>
        </div>
      @endforeach
    </div>

  </div>
@endsection
