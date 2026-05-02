@props(['allMenus'])

<div x-data="{
    isOpen: false,
    openDropdown: null
}" class="lg:hidden">



  <!-- Tombol Burger -->
  <button @click="isOpen = !isOpen"
    class="transition-colors duration-300 focus:outline-none relative z-[70] text-slate-800">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M4 6h16M4 12h16m-7 6h7" />
      <path x-cloak x-show="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M6 18L18 6M6 6l12 12" />
    </svg>
  </button>

  <!-- Panel Menu Fullscreen -->
  <div x-cloak x-show="isOpen" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-T translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 translate-x-full" class="fixed inset-0 bg-white z-[65] flex flex-col">

    <!-- Spacer untuk Header agar menu mulai di bawah logo/burger -->
    <div class="h-16 border-b border-slate-100"></div>

    <nav class="flex-grow overflow-y-auto py-6">
      @foreach ($allMenus as $menu)
        @php
          $menu = (array) $menu;
          $hasChildren = isset($menu['children']) && count($menu['children']) > 0;
          $isActive = $menu['is_active'] ?? false;
          $menuTitle = is_array($menu['title']) ? $menu['title']['name'] ?? 'Menu' : $menu['title'];
        @endphp

        <div class="w-full border-b border-slate-50">
          <div class="flex items-center justify-between px-8 py-2">
            <a href="{{ $menu['url'] }}"
              class="flex-grow py-4 text-xl font-bold transition-colors duration-200 {{ $isActive ? 'text-orange-600' : 'text-slate-800' }}">
              {{ $menuTitle }}
            </a>

            @if ($hasChildren)
              <button
                @click="openDropdown === '{{ $menuTitle }}' ? openDropdown = null : openDropdown = '{{ $menuTitle }}'"
                class="p-4 text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition-transform duration-300"
                  :class="openDropdown === '{{ $menuTitle }}' ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </button>
            @endif
          </div>

          @if ($hasChildren)
            <div x-show="openDropdown === '{{ $menuTitle }}'" x-collapse x-cloak class="bg-slate-50">
              <div class="flex flex-col pb-4">
                @foreach ($menu['children'] as $child)
                  @php
                    $child = (array) $child;
                    $childTitle = is_array($child['title']) ? $child['title']['name'] ?? 'Submenu' : $child['title'];
                  @endphp
                  <a href="{{ $child['url'] }}"
                    class="px-12 py-4 text-lg text-slate-600 border-l-4 border-transparent hover:border-orange-500 hover:bg-orange-50">
                    {{ $childTitle }}
                  </a>
                @endforeach
              </div>
            </div>
          @endif
        </div>
      @endforeach
    </nav>
  </div>
</div>
