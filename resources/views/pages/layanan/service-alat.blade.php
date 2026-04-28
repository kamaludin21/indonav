@php
  $sites = App\Models\Site::get()->keyBy('slug');
  $services = App\Models\ServicePage::where('slug', 'service-alat')->firstOrFail();
@endphp

@extends('layouts.app-v3', ['activePage' => 'layanan'])

@section('content')
  <div x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 100)" class="mt-20 bg-slate-50 min-h-screen">
    {{-- Hero Section: Berbeda dengan sebelumnya (Lebih fokus ke objek/alat) --}}
    <section class="relative bg-white pt-20 pb-16 border-b border-gray-200 overflow-hidden">
      <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center">
          <div class="w-full lg:w-1/2 z-10" x-show="shown" x-transition:enter="transition ease-out duration-700">
            <span class="text-orange-600 font-bold tracking-widest text-sm uppercase">Maintenance & Calibration</span>
            <h1 class="text-4xl lg:text-5xl font-extrabold text-slate-900 mt-4 leading-tight">
              {{ $services->title }}
            </h1>
            <p class="mt-6 text-lg text-gray-600">
              Pastikan instrumen survey Anda tetap berada pada performa puncaknya. Kami menangani kalibrasi rutin hingga
              perbaikan berat.
            </p>
            <div class="mt-8 flex flex-wrap gap-4">
              @foreach ($services->formats ?? [] as $alat)
                <span class="px-4 py-2 bg-slate-900 text-white text-xs font-bold rounded shadow-sm italic uppercase">
                  {{ $alat }}
                </span>
              @endforeach
            </div>
          </div>
          <div class="w-full lg:w-1/2 mt-12 lg:mt-0 relative">
            {{-- Dekoratif Blueprint/Grid Background --}}
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/graphy.png')] opacity-20">
            </div>
            <img src="{{ Storage::url($services->image) }}" alt="Calibration Workshop"
              class="rounded-2xl shadow-2xl relative z-10 border-8 border-white">
          </div>
        </div>
      </div>
    </section>

    {{-- Technical Detail Section --}}
    <section class="py-20">
      <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 ">

          {{-- Detail Fitur (Ubah urutan: Konten Utama dulu) --}}
          <div class="lg:col-span-2 space-y-12  ">
            @foreach ($services->sections ?? [] as $section)
              <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-slate-900 mb-4 flex items-center">
                  <span class="w-8 h-1 bg-orange-500 mr-3"></span>
                  {{ $section['title'] }}
                </h3>
                <div class="prose prose-slate max-w-none text-gray-600 html-content">
                  {!! $section['content'] !!}
                </div>
              </div>
            @endforeach
          </div>

          {{-- Sidebar Checklist --}}
          <div class="lg:col-span-1">
            <div class="bg-orange-500 rounded-2xl p-8 text-white shadow-xl sticky top-24">
              <h3 class="text-xl font-bold mb-6 border-b border-orange-400 pb-4 uppercase tracking-tighter">Standar
                Layanan</h3>
              <ul class="space-y-4">
                @foreach ($services->outputs ?? [] as $output)
                  <li class="flex items-start gap-3 text-sm leading-relaxed">
                    <div class="mt-1 bg-white rounded-full p-1">
                      <svg class="w-3 h-3 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                      </svg>
                    </div>
                    <span>{{ $output['text'] }}</span>
                  </li>
                @endforeach
              </ul>

              <div class="mt-10 bg-orange-600/50 p-4 rounded-lg border border-orange-400/30">
                <p class="text-xs italic text-orange-100 italic">
                  *Kami merekomendasikan kalibrasi setiap 6 bulan sekali untuk penggunaan intensif di lapangan.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-slate-800 py-12">
      <div class="container mx-auto px-6 text-center">
        <p class="text-slate-400 text-sm font-semibold uppercase tracking-widest mb-8">Supported Brands</p>
        <div class="flex flex-wrap justify-center gap-8 md:gap-16 opacity-50 grayscale hover:grayscale-0 transition-all">
          @foreach ($services->formats ?? [] as $format)
            <span class="text-white font-bold text-2xl tracking-tighter">{{ $format }}</span>
          @endforeach
        </div>
      </div>
    </section>

    {{-- Simple Footer CTA --}}
    <section class="py-20 text-center">
      <h2 class="text-3xl font-bold text-slate-800 mb-4">Butuh Penanganan Segera?</h2>
      <a href="https://wa.me/628xxxxxxxxxx"
        class="inline-block bg-slate-800 text-white px-10 py-4 rounded-lg font-bold hover:bg-orange-600 transition-colors shadow-lg">
        Hubungi Workshop INDONAV
      </a>
    </section>

  </div>
@endsection
