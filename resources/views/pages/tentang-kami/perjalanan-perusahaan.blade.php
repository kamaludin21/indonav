@php
  $company = App\Models\CompanyProfile::get()->keyBy('slug');
@endphp

@extends('layouts.app-v3', ['activePage' => 'tentang-kami'])

@push('header')
  <title>Tentang Kami | Bangun Dunia Cerdas dengan Solusi Presisi dari INDONAV</title>
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
  <section class="py-32 px-4 lg:px-0 bg-topo relative overflow-hidden">
    <!-- Layer 2: Soft Spotlight for Depth -->
    <div class="absolute inset-0 z-0 bg-[radial-gradient(circle_at_50%_50%,transparent_20%,rgba(212,212,216,0.8)_100%)]">
    </div>

    <!-- Layer 3: Accent Glow (Orange INDONAV) -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-orange-500/10 rounded-full blur-[100px]"></div>

    <div class="max-w-6xl mx-auto relative z-10">
      <!-- Header -->
      <div class="mb-24">
        <p class="text-slate-500 mb-4 font-mono text-sm tracking-widest uppercase">Tentang Kami</p>
        <h2 class="text-slate-900 text-5xl font-light tracking-tighter uppercase">
          Perjalanan <span class="font-black text-orange-500 italic">Perusahaan</span>
        </h2>
      </div>

      <!-- Timeline Path -->
      <div class="relative space-y-32">
        @foreach ($company['company-journey']?->content ?? [] as $index => $item)
          @php
            // Konversi ke object jika data berupa array agar syntax $item->year tetap bekerja
            $item = (object) $item;
            $isEven = $loop->iteration % 2 === 0;
          @endphp

          @if (!$isEven)
            {{-- Milestone Style 01 (Ganjil: 1, 3, 5...) --}}
            <div class="flex flex-col md:flex-row gap-8 relative group">
              <!-- Year & Vertical Line Connector -->
              <div class="flex flex-row md:flex-col items-center gap-4 md:w-24">
                <span
                  class="text-4xl font-black text-orange-500/20 group-hover:text-orange-500 transition-colors duration-500">
                  {{ $item->year }}
                </span>
                <div class="h-[1px] md:h-32 w-full md:w-[2px] bg-gradient-to-b from-orange-500 to-transparent"></div>
              </div>

              <!-- Card Content -->
              <div class="flex-1 pt-2">
                <div class="relative">
                  <!-- Decorative tag -->
                  <span
                    class="absolute -top-4 left-6 bg-orange-500 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest z-10">
                    {{ $item->tag }}
                  </span>

                  <div
                    class="bg-white p-10 rounded-3xl shadow-xl border-b-8 border-orange-500 transform group-hover:-translate-y-2 transition-all duration-500">
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">{{ $item->title }}</h3>
                    <p class="text-slate-500 leading-relaxed max-w-xl">
                      {{ $item->subtitle }}
                    </p>
                  </div>
                </div>
              </div>

              <!-- Spacer for offset effect -->
              <div class="hidden lg:block w-1/4"></div>
            </div>
          @else
            {{-- Milestone Style 02 (Genap: 2, 4, 6...) --}}
            <div class="flex flex-col md:flex-row gap-8 relative group">
              <!-- Spacer to push content to right -->
              <div class="hidden lg:block w-1/5"></div>

              <!-- Year & Connector -->
              <div class="flex flex-row md:flex-col items-center gap-4 md:w-24 order-1 md:order-2">
                <span
                  class="text-4xl font-black text-slate-500/20 group-hover:text-slate-900 transition-colors duration-500">
                  {{ $item->year }}
                </span>
                <div class="h-[1px] md:h-32 w-full md:w-[2px] bg-gradient-to-b from-slate-900 to-transparent"></div>
              </div>

              <!-- Card Content -->
              <div class="flex-1 pt-2 order-2 md:order-1 text-left md:text-right">
                <div class="relative">
                  <span
                    class="absolute -top-4 right-6 bg-slate-900 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest z-10">
                    {{ $item->tag }}
                  </span>

                  <div
                    class="bg-white p-10 rounded-3xl shadow-xl border-b-8 border-slate-900 transform group-hover:-translate-y-2 transition-all duration-500">
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">{{ $item->title }}</h3>
                    <p class="text-slate-500 leading-relaxed ml-auto max-w-xl">
                      {{ $item->subtitle }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
      <!-- Timeline Path -->


    </div>
  </section>
@endsection
