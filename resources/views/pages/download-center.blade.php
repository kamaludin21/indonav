@php
  use Illuminate\Support\Js;
  $sites = App\Models\Site::get()->keyBy('slug');
  $downloadData = App\Models\DownloadCenter::orderBy('created_at', 'desc')
      ->get()
      ->map(function ($item) {
          return [
              'id' => $item->id,
              'title' => $item->title,
              'cat' => $item->category, // mapping ke 'cat'
              'type' => $item->type, // mapping ke 'type'
              'path' => asset('storage/' . $item->file_url),
          ];
      });
@endphp

@extends('layouts.app-v3', ['activePage' => 'download-center'])

@section('content')
  <div class="bg-white min-h-screen font-sans text-zinc-900 pt-20" x-data="{
      search: '',
      activeTab: 'all',
      activeType: 'all',
      showGuide: false,
      downloads: {{ Js::from($downloadData) }},
      get filteredDownloads() {
          return this.downloads.filter(i => {
              // 1. Filter berdasarkan Search
              const matchSearch = i.title.toLowerCase().includes(this.search.toLowerCase());
  
              // 2. Filter berdasarkan Tab Kategori
              const matchTab = this.activeTab === 'all' || i.cat === this.activeTab;
  
              // 3. Filter berdasarkan Tipe (BARU)
              const matchType = this.activeType === 'all' || i.type === this.activeType;
  
              // Kembalikan data yang memenuhi ketiga syarat tersebut
              return matchSearch && matchTab && matchType;
          });
      }
  }">

    <div x-show="showGuide" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
      class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-zinc-900/90 backdrop-blur-sm" x-cloak>

      <div @click.away="showGuide = false" class="bg-white w-full max-w-2xl rounded-[2.5rem] overflow-hidden shadow-2xl">
        <div class="bg-zinc-900 p-8 flex justify-between items-center">
          <div class="flex items-center gap-4">
            <div class="bg-orange-600 p-3 rounded-2xl text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h3 class="text-white font-bold uppercase italic tracking-tight text-xl">Panduan Update Software</h3>
          </div>
          <button @click="showGuide = false" class="text-zinc-400 hover:text-white transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <div class="p-10">
          <div class="space-y-6">
            <template
              x-for="(step, index) in [
                    'Download file software yang diinginkan',
                    'Hapus .dat dengan cara rename file',
                    'Hubungkan controller ke laptop menggunakan kabel type-C.',
                    'Pindahkan file APK ke controller.',
                    'Buka file APK di controller untuk proses install/update.',
                    'Restart controller dan cek versi aplikasi'
                ]">
              <div class="flex gap-5 items-start">
                <span
                  class="flex-none w-8 h-8 rounded-full bg-orange-600 text-white flex items-center justify-center font-bold text-sm shadow-lg shadow-orange-200"
                  x-text="index + 1"></span>
                <p class="text-zinc-600 font-medium leading-relaxed" x-text="step"></p>
              </div>
            </template>
          </div>
          <button @click="showGuide = false"
            class="w-full mt-10 bg-zinc-900 text-white py-4 rounded-2xl font-bold uppercase tracking-widest hover:bg-slate-800 transition-all">
            Mengerti, Tutup Panduan
          </button>
        </div>
      </div>
    </div>

    <section class="pt-20 pb-0 max-w-6xl mx-auto px-4 md:px-0">
      <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
        <div class="flex flex-col">
          <span class="text-orange-600 font-bold tracking-widest text-sm mb-2 uppercase flex items-center gap-2">
            <span class="w-2 h-2 bg-orange-600 rounded-full"></span>
            Indonav Resources
          </span>
          <h1 class="text-5xl md:text-7xl font-extrabold tracking-tighter leading-none uppercase italic text-slate-800">
            DOWNLOAD <br>
            <span class="text-orange-600">CENTER</span>
          </h1>
        </div>

        <div class="relative w-full md:w-96">
          <input type="text" x-model="search" placeholder="Cari file atau tutorial..."
            class="w-full bg-zinc-100 border-none rounded-2xl py-4 pl-12 pr-4 focus:ring-2 focus:ring-orange-600 transition-all outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute left-4 top-4 text-zinc-400" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
      </div>
      <div class="w-full h-px bg-zinc-200 mt-12"></div>
    </section>

    <section class="pb-4 pt-10 max-w-6xl mx-auto px-4 md:px-0 sticky top-16 bg-white z-20">
      <div class="flex flex-wrap gap-4 md:gap-8">
        <template
          x-for="tab in [
        {k: 'all', l: 'Semua'},
        {k: 'surveying_and_engineering', l: 'Surveying & Engineering'},
        {k: '3d_modelling', l: '3D Modelling'},
        {k: 'hidrografi', l: 'Hidrografi'},
        {k: 'video_tutorial', l: 'Video Tutorial'}
      ]">
          <button @click="activeTab = tab.k; activeType = 'all'"
            :class="activeTab === tab.k ? 'text-orange-600 border-orange-600' : 'text-zinc-400 border-transparent'"
            class="pb-4 border-b-4 font-bold uppercase tracking-tight transition-all text-lg" x-text="tab.l">
          </button>
        </template>
      </div>
    </section>

    <!-- Bagian Filter Tag (Type) -->
    <section class="pb-8 max-w-6xl mx-auto px-4 md:px-0">
      <div class="flex flex-col md:flex-row md:items-center gap-4 border-t border-zinc-100 pt-6">
        <span class="text-xs font-bold uppercase text-zinc-400 tracking-widest">Filter Tipe:</span>
        <div class="flex flex-wrap gap-2">
          <button @click="activeType = 'all'"
            :class="activeType === 'all' ? 'bg-orange-600 text-white shadow-md' :
                'bg-zinc-100 text-zinc-500 hover:bg-zinc-200'"
            class="px-4 py-1.5 rounded-full text-xs font-semibold uppercase transition-all">
            Semua
          </button>

          <template
            x-for="t in [
        {id: 'firmware', n: 'Firmware'},
        {id: 'board_firmware', n: 'Board Firmware'},
        {id: 'software', n: 'Software'},
        {id: 'manual', n: 'Manual'},
        {id: 'video_tutorial', n: 'Video Tutorial'},
      ]">
            <button @click="activeType = t.id"
              :class="activeType === t.id ? 'bg-orange-600 text-white shadow-md' : 'bg-zinc-100 text-zinc-500 hover:bg-zinc-200'"
              class="px-4 py-1.5 rounded-full text-xs font-semibold uppercase transition-all" x-text="t.n">
            </button>
          </template>
        </div>
      </div>
    </section>

    <section class="py-12 max-w-6xl mx-auto px-4 md:px-0 mb-20">
      <div class="grid grid-cols-1 gap-4">
        <template x-for="item in filteredDownloads" :key="item.id">
          <div
            class="group bg-zinc-50 hover:bg-white border border-zinc-100 hover:border-orange-200 p-6 rounded-[2rem] transition-all flex flex-col md:flex-row md:items-center justify-between gap-6 hover:shadow-xl hover:shadow-orange-100/50">

            <div class="flex items-center gap-6">
              <div :class="item.type === 'video_tutorial' ? 'bg-slate-800' : 'bg-orange-600'"
                class="w-14 h-14 rounded-2xl flex items-center justify-center text-white shadow-lg transition-transform group-hover:scale-110">
                <template x-if="item.type === 'video_tutorial'">
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z" />
                  </svg>
                </template>
                <template x-if="item.type !== 'video_tutorial'">
                  <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                  </svg>
                </template>
              </div>

              <div>
                <h4
                  class="text-xl font-bold tracking-tight group-hover:text-orange-600 transition-colors uppercase italic"
                  x-text="item.title"></h4>
                <div class="flex items-center gap-2 mt-1">
                  {{-- Format Tampilan Type agar lebih rapi (replace underscore jadi spasi) --}}
                  <span class="text-xs font-bold uppercase tracking-widest text-zinc-400"
                    x-text="item.type.replace('_', ' ')"></span>
                </div>
              </div>
            </div>

            <div
              class="flex items-center justify-between md:justify-end gap-4 border-t md:border-t-0 pt-4 md:pt-0 border-zinc-200">
              <a :href="item.path" target="_blank"
                :class="item.type === 'video_tutorial' ?
                    'bg-slate-800' :
                    'bg-orange-600'"
                class="text-white px-8 py-4 rounded-2xl font-bold text-sm hover:scale-105 transition-all shadow-lg active:scale-95 uppercase tracking-widest">
                <span x-text="item.type === 'video_tutorial' ? 'Watch' : 'Download'"></span>
              </a>

              {{-- Panduan (muncul jika type adalah firmware, board_firmware, atau software) --}}
              <template x-if="['firmware', 'board_firmware', 'software'].includes(item.type)">
                <button @click="showGuide = true"
                  class="flex items-center justify-center px-4 py-4 bg-blue-100 text-blue-600 rounded-full hover:bg-blue-600 hover:text-white transition-all shadow-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-auto">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                    <path d="M12 9h.01" />
                    <path d="M11 12h1v4h1" />
                  </svg>
                </button>
              </template>
            </div>
          </div>
        </template>
      </div>
    </section>
  </div>
@endsection
