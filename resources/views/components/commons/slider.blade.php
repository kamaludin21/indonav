@props(['partners'])

{{-- Infinite Slider --}}
<div class="py-16 no-scrollbar">
  <div class="pb-10 md:pb-16 capitalize">
    <p class="text-3xl text-slate-800 font-medium text-center">our trusted partner</p>
  </div>
  <div class="w-full overflow-hidden" id="slidable-content">
    <div class="relative h-auto w-full">
      <div class="absolute hidden md:block z-40 h-full w-24 bg-gradient-to-r from-white to-transparent"></div>
      <ul class="infinite-translate flex h-full w-[200%]">
        @for ($i = 0; $i < 3; $i++)
          @foreach ($partners as $item)
            <li
              class="flex w-1/6 md:w-1/6 flex-none items-center justify-center px-4 md:px-6 ring-inset hover:ring-2 ring-orange-600">
              <a href="{{ $item->url ?? '#' }}" target="_blank" class="flex items-center justify-center h-full w-full">
                <img class="h-10 sm:h-12 md:h-14 object-contain" src="{{ asset('storage/' . $item->image) }}"
                  alt="{{ $i }} {{ $item->title }}">
              </a>
            </li>
          @endforeach
        @endfor
      </ul>
      <div class="absolute hidden md:block right-0 top-0 z-40 h-full w-24 bg-gradient-to-l from-white to-transparent">
      </div>
    </div>
  </div>
</div>
{{-- Infinite Slider --}}
