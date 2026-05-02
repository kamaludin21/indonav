@props(['tags'])

<div class="max-w-screen-lg px-4 lg:px-0 mx-auto py-16">
  <div class="capitalize mb-0 lg:mb-8">
    <p class="text-4xl md:text-5xl text-slate-800 font-bold">
      Koleksi <span class="text-orange-500">Produk</span> Kami
    </p>
  </div>

  <div class="divide-y-2 divide-dashed divide-orange-200">
    @foreach ($tags as $tag)
      <div class="space-y-6 py-10">
        {{-- Header Section: Title & View All --}}
        <div class="flex items-end justify-between gap-4">
          <p class="text-2xl text-slate-700 font-bold">
            {{ $tag->name }}
          </p>
          {{-- Link Lihat Semua --}}
          <a href="/produk/"
            class="text-sm font-semibold text-orange-600 hover:text-orange-700 flex items-center gap-1 transition-colors">
            Lihat Semua
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </div>

        {{-- Product Grid / Mobile Scroll --}}
        <div class="-mx-4 md:mx-0">
          {{-- Berubah menjadi grid-cols-4 pada layar desktop (lg) --}}
          <div
            class="flex md:grid md:grid-cols-2 lg:grid-cols-4 gap-2 overflow-x-auto px-4 md:px-0 pb-6 md:pb-0 snap-x snap-mandatory scrollbar-hide">
            {{-- Batasi hanya 5 produk --}}
            @foreach ($tag->products->take(5) as $item)
              <div class="flex-none w-[85%] md:w-auto snap-center py-2 px-1">
                <div
                  class="bg-white ring-1 ring-zinc-200 rounded-xl flex flex-col h-full hover:shadow-lg transition-all duration-300 group">

                  {{-- 1. Gambar dengan Tinggi Tetap --}}
                  <div
                    class="relative h-48 w-full flex items-center justify-center p-2 bg-slate-50/50 rounded-t-xl overflow-hidden">
                    <img src="{{ asset('storage/' . $item->image_product) }}"
                      class="max-h-full max-w-full object-contain group-hover:scale-110 transition-transform duration-500"
                      alt="{{ $item->title }}">
                  </div>

                  {{-- 2. Area Konten dengan Flex Grow --}}
                  <div class="p-2 border-t border-zinc-100 flex flex-col flex-grow">

                    {{-- Bagian Atas: Judul dan Deskripsi --}}
                    <div class="space-y-2 mb-4">
                      <h3
                        class="text-xl font-bold text-slate-800 line-clamp-1 group-hover:text-orange-600 transition-colors">
                        {{ $item->title }}
                      </h3>
                    </div>

                    {{-- 3. Bagian Bawah: Selalu nempel di dasar kartu karena mt-auto --}}
                    <div class="mt-auto">
                      <div
                        class="flex items-center justify-between border-t border-dashed border-orange-200 pb-2 pt-4 gap-2">
                        <span class="text-[12px] font-semibold text-slate-500">
                          {{ $item->industry->title }}
                        </span>
                        <a href="/produk/{{ $item->industry->slug }}/{{ $item->slug }}"
                          class="flex items-center text-xs font-bold text-orange-600 hover:text-orange-700 gap-1 transition-colors whitespace-nowrap">
                          Detail
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-3 h-3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                          </svg>
                        </a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

<style>
  .scrollbar-hide::-webkit-scrollbar {
    display: none;
  }

  .scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>
