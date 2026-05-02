@props(['industry'])

{{-- Solusi/Layanan/Kategori Produk --}}
<div class="space-y-6 max-w-screen-lg px-2 lg:px-0 mx-auto py-16">
  <div class="pb-10 capitalize text-center">
    <p class="text-5xl text-slate-800 font-bold">Pilihan <span class="text-orange-500">Solusi</span> Terbaik</p>
  </div>
  <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
    @foreach ($industry as $item)
      <div class="group relative aspect-[3/4] cursor-pointer overflow-hidden">
        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
          class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-110" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/40 to-transparent"></div>
        <div class="absolute inset-0 flex flex-col justify-end p-8">
          <h2 class="mb-2 transform transition-transform duration-300 group-hover:-translate-y-2">
            <a href="/produk/{{ $item->slug }}"
              class="line-clamp-2 text-2xl font-bold text-white decoration-white underline-offset-4 hover:underline">{{ $item->title }}</a>
          </h2>
          <p
            class="line-clamp-3 translate-y-4 text-base leading-relaxed text-gray-100 opacity-0 transition-all duration-500 ease-out group-hover:translate-y-0 group-hover:opacity-100">
            {{ $item->description }}</p>
        </div>
      </div>
    @endforeach
  </div>

</div>
