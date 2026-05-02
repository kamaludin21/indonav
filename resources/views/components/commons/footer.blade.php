@props(['sites', 'industry'])

{{-- Footer --}}
<footer class="text-white w-full bg-slate-800">
  {{-- Wrapper --}}
  <div class="max-w-7xl px-6 lg:px-8 mx-auto">
    {{-- Grid: 1 kolom di mobile, 2 di tablet, 4 di desktop --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10 py-12">

      {{-- Branding Section --}}
      <div class="space-y-4 text-center md:text-left">
        <div class="flex flex-col items-center md:items-start gap-2">
          <img src="{{ asset('img/indonav_white.png') }}" class="h-10 w-auto" alt="INDONAV Logo">
          <p class="text-lg font-light text-slate-400">Official partner CHCNAV</p>
        </div>
        <p class="text-base font-light text-slate-200 leading-relaxed">
          {{ strip_tags($sites['tentang-kami-footer']?->description) }}
        </p>
      </div>

      {{-- Alamat & Kontak --}}
      <div class="space-y-4 text-center md:text-left">
        <p class="text-lg font-medium text-slate-50 border-b border-slate-700 pb-2 inline-block md:block">Alamat</p>
        <p class="text-base font-light text-slate-200 leading-relaxed">
          {{ strip_tags($sites['alamat']?->description) }}
        </p>

        <div class="flex flex-col items-center md:items-start gap-3">
          <a href="tel:{{ strip_tags($sites['phone']?->description) }}"
            class="group flex items-center gap-3 text-slate-200 hover:text-orange-400 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
              stroke="currentColor" class="h-5 w-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
            </svg>
            <span class="text-base">{{ strip_tags($sites['phone']?->description) }}</span>
          </a>
          <a href="mailto:{{ strip_tags($sites['email']?->description) }}"
            class="group flex items-center gap-3 text-slate-200 hover:text-orange-400 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
              stroke="currentColor" class="h-5 w-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>
            <span
              class="text-base truncate max-w-[250px] md:max-w-none">{{ strip_tags($sites['email']?->description) }}</span>
          </a>
        </div>

        <div class="pt-2">
          <p class="text-lg font-medium text-slate-50 mb-3">Sosial Media</p>
          <div class="flex justify-center md:justify-start gap-4">
            <a href="{!! $sites['linkedin']?->url !!}" target="_blank"
              class="ring-1 p-2 rounded-lg ring-slate-600 text-slate-200 hover:bg-white hover:text-slate-800 transition-all">
              <x-icons.linkedin class="h-5 w-auto" />
            </a>
            <a href="{!! $sites['instagram']?->url !!}" target="_blank"
              class="ring-1 p-2 rounded-lg ring-slate-600 text-slate-200 hover:bg-white hover:text-slate-800 transition-all">
              <x-icons.instagram class="h-5 w-auto" />
            </a>
          </div>
        </div>
      </div>

      {{-- Service Time --}}
      <div class="space-y-6 text-center md:text-left">
        <p class="text-lg font-medium text-slate-50 border-b border-slate-700 pb-2 inline-block md:block">Service Time
        </p>
        <div class="space-y-4">
          <div class="bg-slate-700/30 p-3 rounded-xl border border-slate-700">
            <p class="text-xs uppercase tracking-wider font-bold text-slate-400 mb-1">Senin - Jumat</p>
            <div class="flex items-center justify-center md:justify-start gap-2 text-white">
              <span class="h-2 w-2 animate-pulse rounded-full bg-green-500"></span>
              <span class="text-base font-semibold">{!! $sites['service-time']->description !!}</span>
            </div>
          </div>
          <div class="bg-slate-700/30 p-3 rounded-xl border border-slate-700">
            <p class="text-xs uppercase tracking-wider font-bold text-slate-400 mb-1">Sabtu - Minggu</p>
            <div class="flex items-center justify-center md:justify-start gap-2 text-white">
              <span class="h-2 w-2 rounded-full bg-red-500"></span>
              <span class="text-base font-semibold">Email/WA/Call Only</span>
            </div>
          </div>
        </div>

        <a href="{!! $sites['wa-link']?->url !!}" target="_blank"
          class="w-full active:scale-95 py-3 px-6 rounded-full flex items-center gap-3 justify-center bg-slate-900 border border-slate-600 hover:bg-green-600 hover:border-green-500 transition-all text-white font-bold shadow-lg">
          <span class="text-sm">Hubungi Kami</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
            stroke-linejoin="round" class="h-5 w-5 text-green-400 group-hover:text-white">
            <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
            <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
          </svg>
        </a>
      </div>

      {{-- Navigasi --}}
      <div class="space-y-4 text-center md:text-left">
        <p class="text-lg font-medium text-slate-50 border-b border-slate-700 pb-2 inline-block md:block">Navigasi</p>
        <nav
          class="flex flex-wrap justify-center md:flex-col md:justify-start gap-y-3 gap-x-6 md:gap-x-0 font-light text-base text-slate-300">
          <a href="/" class="hover:text-orange-400 transition-colors">Beranda</a>
          <a href="/produk" class="hover:text-orange-400 transition-colors">Produk</a>
          <a href="/layanan" class="hover:text-orange-400 transition-colors">Layanan</a>
          <a href="/portofolio/pengalaman" class="hover:text-orange-400 transition-colors">Portofolio</a>
          <a href="/tentang-kami/visi-misi" class="hover:text-orange-400 transition-colors text-nowrap">Tentang Kami</a>
        </nav>
      </div>

    </div>
  </div>

  {{-- Bottom Bar --}}
  <div class="py-2 bg-slate-900">
    <p class="text-center text-sm text-slate-400 tracking-wide">
      INDONAV &copy;
      <script>
        document.write(new Date().getFullYear())
      </script> Hak cipta dilindungi.
    </p>
  </div>
</footer>
