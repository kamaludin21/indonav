@props(['tags'])

<div class="max-w-screen-lg px-2 lg:px-0 mx-auto py-16">
  <div class="capitalize">
    <p class="text-5xl text-slate-800 font-bold">Koleksi <span class="text-orange-500">Produk</span> Kami</p>
  </div>
  <div class="divide-y-2 divide-dashed divide-orange-200">
    @foreach ($tags as $tag)
      <div class="space-y-4 py-6">

        <p class="text-2xl text-slate-700 font-medium">
          {{ $tag->name }}
        </p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">

          @foreach ($tag->products as $item)
            <div
              class="w-full h-64 bg-slate-50 hover:bg-slate-100 ring-1 ring-slate-100 hover:ring-slate-200 p-2 flex flex-col items-center space-y-6 justify-center rounded-xl group hover:shadow-lg">

              <img src="{{ asset('storage/' . $item->image_product) }}"
                class="w-2/3 md:w-1/2 group-hover:scale-125 duration-200" alt="{{ $item->title }}">

              <a href="/produk/{{ $item->slug }}">
                <p class="text-2xl text-center text-slate-700 hover:underline font-medium line-clamp-2">
                  {{ $item->title }}
                </p>
              </a>

            </div>
          @endforeach

        </div>

      </div>
    @endforeach
  </div>
</div>
