@php
  $video = App\Models\Video::orderBy('title', 'asc')->get();
  function getCleanYoutubeId($url)
  {
      preg_match(
          '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
          $url,
          $match,
      );
      return $match[1] ?? null;
  }
@endphp

@extends('layouts.app-v3', ['activePage' => 'portofolio'])

@push('header')
  <title>INDONAV | Video Portofolio</title>
  <style>
    .video-container {
      position: relative;
      padding-bottom: 56.25%;
      height: 0;
      overflow: hidden;
    }

    .video-container iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }
  </style>
@endpush

@section('content')
  <div class="bg-zinc-50 min-h-screen font-sans text-slate-800">
    <main class="max-w-6xl mx-auto pb-20 pt-28 px-4 lg:px-0">
      <div class="mb-12">
        <h2 class="text-orange-600 font-black tracking-widest uppercase text-sm mb-2">Portofolio</h2>
        <h1 class="text-4xl md:text-6xl font-black tracking-tighter uppercase">
          VIDEO
        </h1>
      </div>

      <!-- Grid 3 Kolom Serasi -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($video as $item)
          @php
            $youtubeId = getCleanYoutubeId($item->url);
            $thumbnail = "https://img.youtube.com/vi/{$youtubeId}/hqdefault.jpg";
          @endphp

          <!-- Kita kirim ID-nya saja ke fungsi JS agar lebih aman -->
          <div class="group cursor-pointer" onclick="openVideoModal('{{ $youtubeId }}', '{{ $item->title }}')">
            <div
              class="relative overflow-hidden rounded-2xl aspect-video bg-slate-200 mb-4 shadow-md group-hover:shadow-xl transition-all">
              <img src="{{ $thumbnail }}" alt="{{ $item->title }}"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

              <div
                class="absolute inset-0 bg-slate-900/30 group-hover:bg-slate-900/10 transition-all flex items-center justify-center">
                <div
                  class="w-14 h-14 bg-orange-600 text-white rounded-full flex items-center justify-center shadow-lg transform group-hover:scale-110 transition-all">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 fill-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                  </svg>

                </div>
              </div>
            </div>
            <h3
              class="text-base font-bold leading-tight group-hover:text-orange-600 transition-colors uppercase tracking-tight">
              {{ $item->title }}
            </h3>
          </div>
        @endforeach
      </div>
    </main>
  </div>

  <!-- MODAL POPUP -->
  <div id="videoModal"
    class="fixed inset-0 z-[9999] hidden items-center justify-center p-4 bg-slate-950/90 backdrop-blur-md">
    <div class="relative w-full max-w-4xl bg-black rounded-2xl overflow-hidden shadow-2xl">
      <button onclick="closeVideoModal()"
        class="absolute -top-12 right-0 text-white hover:text-orange-500 transition-colors flex items-center gap-2">
        <span class="text-xs font-bold uppercase tracking-widest">Tutup</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

      <div class="video-container">
        <!-- Iframe kosong yang akan diisi oleh JS -->
        <iframe id="modalIframe" src="" frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen></iframe>
      </div>

      <div class="p-5 bg-white">
        <h3 id="modalTitle" class="text-xl font-black text-slate-900 uppercase"></h3>
      </div>
    </div>
  </div>

  <script>
    const modal = document.getElementById('videoModal');
    const iframe = document.getElementById('modalIframe');
    const modalTitle = document.getElementById('modalTitle');

    function openVideoModal(videoId, title) {
      if (!videoId) {
        alert("Video ID tidak valid");
        return;
      }

      // Susun URL Embed yang benar secara manual
      // autoplay=1 (putar otomatis)
      // mute=1 (syarat autoplay di browser modern)
      // rel=0 (tidak menampilkan video random lain di akhir)
      // playlist (syarat untuk loop=1)
      const embedUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&controls=1&loop=1&playlist=${videoId}`;

      iframe.src = embedUrl;
      modalTitle.innerText = title;

      modal.classList.remove('hidden');
      modal.classList.add('flex');
      document.body.style.overflow = 'hidden';
    }

    function closeVideoModal() {
      iframe.src = '';
      modal.classList.add('hidden');
      modal.classList.remove('flex');
      document.body.style.overflow = 'auto';
    }

    modal.addEventListener('click', function(e) {
      if (e.target === modal) closeVideoModal();
    });
  </script>
@endsection
