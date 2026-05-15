@php
  $company = App\Models\CompanyProfile::get()->keyBy('slug');
  $sites = App\Models\Site::get()->keyBy('slug');
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
  <section class="relative py-32 overflow-hidden bg-gradient-to-tl from-slate-50 via-orange-200 to-orange-400">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
      <div class="absolute -top-24 -left-24 w-96 h-96 bg-orange-600/10 rounded-full blur-[120px]"></div>
    </div>
    
    <div class="absolute bottom-0 right-0 w-full h-full overflow-hidden pointer-events-none">
      <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-orange-600/10 rounded-full blur-[120px]"></div>
    </div>

    <div class="max-w-6xl mx-auto relative z-10 px-4 lg:px-0">
      <div class="flex flex-col lg:flex-row items-center gap-16">

        <!-- Kolom Kiri: Video Company Profile -->
        <div class="w-full lg:w-1/2 group">
          <div class="relative">
            <!-- Decorative Border (slate-400) -->
            <div
              class="absolute -inset-2 border border-slate-400 rounded-2xl opacity-50 group-hover:opacity-100 group-hover:border-orange-500/30 transition-all duration-700">
            </div>

            <!-- Video Container -->
            <div
              class="relative rounded-2xl overflow-hidden shadow-2xl aspect-video bg-slate-400 border border-slate-200">
              <iframe class="w-full h-full" src="{{ $sites['visi-misi-video']?->embed_video_url }}" title="Test"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
              </iframe>
            </div>
          </div>
        </div>

        <!-- Kolom Kanan: Konten Visi Misi -->
        <div class="w-full lg:w-1/2">
          <div class="space-y-10">
            <div>
              <div class="flex items-center gap-4 mb-4">
                <div class="w-10 h-[2px] bg-orange-500"></div>
                <span class="text-orange-500 font-mono tracking-[0.3em] uppercase text-xs font-bold">Visi & Misi
                  Kami</span>
              </div>
              <h2 class="text-slate-800 text-4xl md:text-5xl font-bold tracking-tighter leading-tight">
                Akurasi Terukur <i>untuk</i><br>
                <span class="text-orange-500"> Dunia Infrastruktur</span>
              </h2>
            </div>

            <!-- Visi dengan Glassmorphism (Light Mode) -->
            <div class="relative group">
              <div
                class="absolute inset-0 bg-slate-100/20 rounded-2xl transform -rotate-1 group-hover:rotate-0 transition-transform shadow-inner">
              </div>
              <div class="relative bg-slate-100/40 backdrop-blur-md border border-white/40 p-8 rounded-2xl shadow-lg">
                <h3 class="text-zinc-800 font-bold uppercase tracking-widest text-xs mb-4 flex items-center gap-2">
                  <span class="w-2 h-2 bg-orange-600 rounded-full"></span> Visi
                </h3>
                <p class="text-slate-700 text-xl font-light leading-relaxed italic">
                  {{ $company['visi']?->description }}
                </p>
              </div>
            </div>

            <!-- Misi List -->
            <div class="grid gap-6">
              <h3 class="text-slate-500 font-bold uppercase tracking-widest text-xl">Misi</h3>
              @foreach ($company['misi']?->content ?? [] as $index => $item)
                <div class="flex gap-6 group">
                  <span
                    class="text-orange-500/40 font-mono text-2xl group-hover:text-orange-500 transition-colors">{{ $item['title'] }}</span>
                  <p class="text-slate-500 group-hover:text-slate-900 transition-colors text-lg leading-relaxed pt-1">
                    {{ $item['subtitle'] }}
                  </p>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
