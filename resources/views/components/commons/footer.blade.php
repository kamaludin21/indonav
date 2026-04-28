@props(['sites', 'industry'])

{{-- Footer --}}
<footer class="text-white w-full bg-slate-800">
  {{-- Wrapper --}}
  <div class="max-w-7xl px-2 lg:px-0 mx-auto pt-16 pb-6">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
      <div class="space-y-4">
        <div class="grid gap-2">
          <img src="{{ asset('img/indonav_white.png') }}" class="h-10 w-auto" alt="">
          <p class="text-lg font-light text-slate-400 text-center md:text-start">Official partner CHCNAV</p>
        </div>
        <p class="text-base font-light text-slate-200">{{ strip_tags($sites['tentang-kami-footer']?->description) }}
        </p>
      </div>
      <div class="space-y-4">
        <p class="text-lg font-medium text-slate-50">Alamat</p>
        <p class="text-base font-light text-slate-200">{{ strip_tags($sites['alamat']?->description) }}</p>
        <div class="grid grid-cols-2 md:grid-cols-1 gap-2 w-full md:w-fit">
          <a href="tel:{{ strip_tags($sites['phone']?->description) }}">
            <div class="flex gap-2 justify-start">
              <p class="order-2 md:order-1">{{ strip_tags($sites['phone']?->description) }}</p>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
                stroke="currentColor" class="hidden md:block h-auto w-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
              </svg>
            </div>
          </a>
          <a href="mailto:{{ strip_tags($sites['email']?->description) }}">
            <div class="flex gap-2 justify-start">
              <p class="order-2 md:order-1">{{ strip_tags($sites['email']?->description) }}</p>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
                stroke="currentColor" class="hidden md:block h-auto w-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
              </svg>
            </div>
          </a>
        </div>
        <p class="text-lg font-medium text-slate-50">Sosial Media</p>

        <div class="flex gap-4">
          <div class="ring-1 p-1 rounded-md ring-slate-200 text-slate-200">
            <x-icons.linkedin class="h-6 w-auto" />
          </div>
          <div class="ring-1 p-1 rounded-md ring-slate-200 text-slate-200">
            <x-icons.instagram class="h-6 w-auto" />
          </div>
        </div>
      </div>

      <div class="space-y-4">
        <p class="text-lg font-medium text-slate-50">Service Time</p>
        <div class="">
          <p class="text-base font-bold text-slate-200">Senin - Jumat</p>
          <div class="flex items-center gap-2">
            <span class="h-2 w-2 animate-pulse rounded-full bg-green-500"></span>
            <p class="text-lg font-semibold text-white">08.00 - 18.00 WIB</p>
          </div>
        </div>
        <div>
          <p class="text-base font-bold text-slate-200">Sabtu - Minggu</p>
          <div class="flex items-center gap-2">
            <span class="h-2 w-2 animate-pulse rounded-full bg-red-500"></span>
            <p class="text-lg font-semibold text-white">Email/WA/Call Only</p>
          </div>
        </div>
        <a href="{!! $sites['wa-link']?->url !!}" target="_blank"
          class="flex-1 w-full active:scale-95 p-2 rounded-full flex items-center gap-2 justify-center bg-slate-900 ring-1 ring-slate-200 transition-colors text-white font-medium">
          <span>Hubungi Kami</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="h-7 w-7 text-green-600">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
            <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
          </svg>
        </a>
      </div>

      <div class="space-y-4">
        <p class="text-lg font-medium text-slate-50">Navigasi</p>
        <ul class="font-light text-base text-slate-200 space-y-2">
          <li class="grid gap-6">
            <a href="#">
              Beranda
            </a>
            <a href="#">
              Produk
            </a>
            <a href="#">
              Layanan
            </a>
            <a href="#">
              Portofolio
            </a>
            <a href="#">
              Tentang Kami
            </a>
          </li>
        </ul>
      </div>


    </div>
    <p class="pb-20 border-b border-slate-600"></p>


    <p class="text-center text-xs text-slate-200 tracking-wide mt-2">INDONAV © 2025 Seluruh hak cipta dilindungi</p>

  </div>
</footer>
{{-- Footer --}}
