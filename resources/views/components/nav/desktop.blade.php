@props(['allMenus'])

<nav class="flex items-center space-x-1" x-data="{
    menus: {{ json_encode($allMenus) }},
    openMenu: null,
    scrolled: false,
    isHome: {{ request()->is('/') ? 'true' : 'false' }},
    init() {
        // Cek posisi scroll saat load pertama kali
        this.scrolled = window.scrollY > 20;
        window.addEventListener('scroll', () => {
            this.scrolled = window.scrollY > 20;
        });
    }
}">

  <template x-for="(menu, index) in menus" :key="index">
    <div class="relative" @mouseenter="menu.children.length > 0 ? openMenu = menu.title : openMenu = null"
      @mouseleave="openMenu = null">

      <!-- Link Menu Utama -->
      <a :href="menu.url"
        :class="{
            // Kondisi 1: Menu sedang aktif (Orange)
            'text-orange-500': menu.is_active,
        
            // Kondisi 2: Halaman Home & Belum Scroll (White)
            'text-white hover:bg-white/20': !menu.is_active && isHome && !scrolled,
        
            // Kondisi 3: Halaman Home & Sudah Scroll (Slate)
            'text-slate-700 hover:bg-slate-100': !menu.is_active && isHome && scrolled,
        
            // Kondisi 4: Bukan Halaman Home (Selalu Slate)
            'text-slate-700 hover:bg-slate-100': !menu.is_active && !isHome
        }"
        class="inline-flex items-center gap-1 px-4 py-2 rounded-md font-semibold transition-colors duration-300 no-underline">
        <span x-text="menu.title"></span>
      </a>

      <!-- Dropdown Menu -->
      <template x-if="menu.children.length > 0">
        <div x-show="openMenu === menu.title" x-transition:enter="transition ease-out duration-200"
          x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
          x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          class="absolute left-1/2 -translate-x-1/2 mt-2 w-56 bg-white shadow-xl rounded-lg z-50 border border-slate-100"
          @click.away="openMenu = null">

          <div class="py-2 px-1">
            <template x-for="child in menu.children" :key="child.title">
              <a :href="child.url"
                :class="child.is_active ? 'text-orange-500 bg-orange-50 font-bold' : 'text-slate-600 hover:bg-slate-100'"
                class="block px-4 py-2 text-sm rounded-md no-underline transition-all" x-text="child.title">
              </a>
            </template>
          </div>
        </div>
      </template>
    </div>
  </template>
</nav>
