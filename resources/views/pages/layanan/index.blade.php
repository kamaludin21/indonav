@php
  $sites = App\Models\Site::get()->keyBy('slug');
  $services = App\Models\ServicePage::first();
@endphp

@extends('layouts.app-v3', ['activePage' => 'layanan'])

@push('header')
  <title>Layanan | Bangun Dunia Cerdas dengan Solusi Presisi dari INDONAV</title>
  <meta name="title" content="Bangun Dunia Cerdas dengan Solusi Presisi dari INDONAV">
  <meta name="description"
    content="Temukan solusi inovatif CHC Navigation untuk kebutuhan geospasial, konstruksi, navigasi, dan pertanian.">

  <meta property="og:title" content="Build a Smart World with INDONAV Precision Solutions ">
  <meta property="og:description"
    content="Discover CHC Navigation’s innovative solutions for geospatial, construction, navigation and agriculture.">
  <meta property="og:url" content="https://indonavtech.co.id/">
  <meta property="og:type" content="website">
  <meta property="og:image" content="{{ asset('img/og_image-indonav.jpg') }}">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:site_name" content="Indonav">
@endpush


@section('content')
  <div x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 100)" class="bg-white font-sans text-gray-900">

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-slate-900 py-24 lg:py-32">

      <div class="absolute inset-0 opacity-40">
        <img src="{{ Storage::url($services->image) }}" alt="{{ $services->title }}" class="h-full w-full object-cover" />
      </div>

      <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/80 to-transparent"></div>

      <div class="relative z-10 max-w-screen-lg px-6 lg:px-0 mx-auto">
        <div class="max-w-3xl" x-show="shown" x-transition:enter="transition ease-out duration-700"
          x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0">

          <span
            class="mb-4 inline-block rounded-full bg-orange-500 px-3 py-1 text-xs font-semibold tracking-wider text-white uppercase">
            {{ $services->label }}
          </span>

          <h1 class="text-4xl leading-tight font-bold text-white md:text-5xl lg:text-6xl">
            {{ $services->title }}
          </h1>

        </div>
      </div>

    </section>


    {{-- CONTENT --}}
    <section class="max-w-screen-lg mx-auto bg-white py-16 lg:py-24 px-4 lg:px-0">

      <div class="flex flex-col items-start gap-12 lg:flex-row">

        {{-- SIDEBAR --}}
        <div class="w-full lg:sticky lg:top-24 lg:w-5/12" x-intersect="shown = true">

          <div class="rounded-2xl border-b-4 border-orange-500 bg-slate-800 p-8 shadow-2xl" x-show="shown"
            x-transition:enter="transition ease-out duration-1000 delay-300"
            x-transition:enter-start="opacity-0 -translate-x-10" x-transition:enter-end="opacity-100 translate-x-0">

            <h2 class="mb-6 text-2xl font-bold tracking-tight text-white">
              HASIL & SOLUSI INDUSTRI
            </h2>

            <div class="space-y-6">

              {{-- OUTPUT --}}
              <div>
                <h3 class="mb-4 flex items-center font-semibold text-orange-500">
                  Output yang Anda Dapatkan:
                </h3>

                <ul class="space-y-3 text-gray-300">

                  @foreach ($services->outputs ?? [] as $output)
                    <li class="flex items-start">
                      <span class="mr-2 text-orange-500">•</span>
                      <span>{{ $output['text'] }}</span>
                    </li>
                  @endforeach

                </ul>
              </div>

              {{-- FORMAT --}}
              <div class="border-t border-slate-700 pt-6">
                <h4 class="mb-2 font-semibold text-white">Format File:</h4>

                <div class="flex flex-wrap gap-2">

                  @foreach ($services->formats ?? [] as $format)
                    <span class="rounded border border-slate-700 bg-slate-800 px-3 py-1 text-xs text-gray-400">
                      {{ $format }}
                    </span>
                  @endforeach

                </div>
              </div>

            </div>
          </div>

        </div>


        {{-- MAIN CONTENT --}}
        <div class="w-full lg:w-7/12">

          <div class="prose prose-lg max-w-none text-gray-600 space-y-8">

            @foreach ($services->sections ?? [] as $section)
              <div class="space-y-4">
                <h3 class="text-3xl font-bold text-slate-900">
                  {{ $section['title'] }}
                </h3>
                <div class="html-content">
                  {!! $section['content'] !!}
                </div>
              </div>
            @endforeach

          </div>

        </div>

      </div>

    </section>
    <x-commons.line>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"
        class="h-7 w-auto text-orange-600">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M10 10h4v4h-4l0 -4" />
        <path d="M10 10l-3.5 -3.5" />
        <path d="M9.96 6a3.5 3.5 0 1 0 -3.96 3.96" />
        <path d="M14 10l3.5 -3.5" />
        <path d="M18 9.96a3.5 3.5 0 1 0 -3.96 -3.96" />
        <path d="M14 14l3.5 3.5" />
        <path d="M14.04 18a3.5 3.5 0 1 0 3.96 -3.96" />
        <path d="M10 14l-3.5 3.5" />
        <path d="M6 14.04a3.5 3.5 0 1 0 3.96 3.96" />
      </svg>
    </x-commons.line>
    <div class="pt-24 pb-32 antialiased px-4">
      <div
        class="relative overflow-hidden w-full max-w-6xl mx-auto bg-topo rounded-[40px] shadow-xl min-h-[400px] flex items-center ring-1 ring-orange-100">

        <div
          class="relative z-10 w-full px-8 py-16 md:px-16 flex flex-col md:flex-row justify-center items-center gap-10">

          <div class="max-w-2xl text-center">
            <h2 class="text-orange-500 text-3xl md:text-5xl font-bold leading-tight mb-6">
              Hadirkan Akurasi Standar Industri ke Dalam Proyek Anda
            </h2>

            <p class="text-slate-700 text-lg md:text-xl font-medium mb-10 leading-relaxed">
              Mulai dari akuisisi data udara hingga pemeliharaan instrumen presisi, tim ahli kami siap mendukung
              kesuksesan operasional Anda melalui solusi geospasial yang terukur dan terintegrasi.
            </p>

            <div class="flex justify-center">
              <a href="#"
                class="group relative flex items-center gap-4 bg-slate-800 hover:bg-orange-600 transition-colors py-4 pl-7 px-5 rounded-full shadow-lg">
                <span class="text-white font-semibold text-lg">Konsultasi dengan Kami</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                  fill="currentColor" class="h-8 w-auto text-green-600">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path
                    d="M18.497 4.409a10 10 0 0 1 -10.36 16.828l-.223 -.098l-4.759 .849l-.11 .011a1 1 0 0 1 -.11 0l-.102 -.013l-.108 -.024l-.105 -.037l-.099 -.047l-.093 -.058l-.014 -.011l-.012 -.007l-.086 -.073l-.077 -.08l-.067 -.088l-.056 -.094l-.034 -.07l-.04 -.108l-.028 -.128l-.012 -.102a1 1 0 0 1 0 -.125l.012 -.1l.024 -.11l.045 -.122l1.433 -3.304l-.009 -.014a10 10 0 0 1 1.549 -12.454l.215 -.203a10 10 0 0 1 13.226 -.217m-8.997 3.09a1.5 1.5 0 0 0 -1.5 1.5v1a6 6 0 0 0 6 6h1a1.5 1.5 0 0 0 0 -3h-1l-.144 .007a1.5 1.5 0 0 0 -1.128 .697l-.042 .074l-.022 -.007a4.01 4.01 0 0 1 -2.435 -2.435l-.008 -.023l.075 -.041a1.5 1.5 0 0 0 .704 -1.272v-1a1.5 1.5 0 0 0 -1.5 -1.5" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
