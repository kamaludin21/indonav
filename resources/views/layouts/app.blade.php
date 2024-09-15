@php
  $industry = App\Models\Industry::get();
  $productCategory = App\Models\ProductCategory::get();
  $sites = App\Models\Site::get()->keyBy('slug');
@endphp

<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <title>INDONAV</title>
  <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

</head>

<body>
  {{-- Top Navigation --}}
  <div class="sticky top-0 z-50 bg-white">
    {{-- Brand --}}
    <div class="border-b border-orange-500 hidden md:flex justify-between self-center items-center px-[5%] py-1">

      {{-- Email and Phone --}}
      <div class="flex gap-4">
        <div class="flex items-center gap-1 text-sm text-slate-500">
          <x-icons.mail class="h-5 w-5 text-orange-400" />
          {!! $sites['email']?->description !!}
        </div>
        <div class="flex items-center gap-1 text-sm text-slate-500">
          <x-icons.whatsapp class="h-5 w-5 text-orange-400" />
          {!! $sites['phone']?->description !!}
        </div>
      </div>

      {{-- Brand/LOGO --}}
      {{-- <div class="place-self-center">
        <a href="{{ $sites['logo-desktop']?->url }}">
          <img class="h-4 w-auto" src="{{ asset('img/indonav.png') }}" alt="">
        </a>
      </div> --}}
      <x-social-media class="flex gap-2" height="h-3" />

    </div>
    {{-- Navigation --}}
    <div class="bg-orange-400 flex items-center justify-between px-2 md:px-[5%] py-4 relative">
      <div class="block md:hidden">
        <a href="/">
          <img class="h-6 w-auto" src="{{ asset('storage/' . $sites['logo-mobile']?->image) }}" alt="">
        </a>
      </div>
      <nav class="hidden md:block ">
        <div class="flex gap-6 text-xl font-light text-slate-100">
          <div class="drop-shadow underline-offset-4"><a href="/">Home</a></div>
          {{-- Industry --}}
          <div class="group">
            <div class="drop-shadow underline-offset-4 hover:underline text-white">
              <a href="/">Industries</a>
            </div>
            <div class="group-hover:block hidden absolute left-0 top-10 max-w-screen">
              <div class="bg-white border-b mt-5 w-screen h-auto px-[4%] pt-[1%] pb-[2%]">
                <div class="flex gap-1 mt-4 w-fit h-full text-slate-800">
                  <div class="space-y-44 py-4 pl-4 pr-0 w-fit relative">
                    <p class="text-3xl font-bold">Industries</p>
                    <div class="space-y-4 text-slate-500 w-fit">
                      @foreach ($industry as $index => $item)
                        <div class="border-b-2 pb-1 hover:border-slate-600 duration-200 group/item">
                          <a href="/industries/{{ $item->slug }}"
                            class="text-base flex justify-between gap-4  items-center group-hover/item:text-slate-700 group-hover/item:font-medium duration-200">
                            <span>{{ $item->title }}</span>
                            <x-icons.chevron-right class="h-5 w-5" />
                          </a>

                          {{-- Submenu: show on hover --}}
                          <div
                            class="absolute hidden group-hover/item:block transition duration-500 ease-in-out top-0 left-full w-dvw max-w-2xl h-full">
                            <div class="bg-white w-full h-full space-y-10 flex flex-col justify-between pl-8 pr-0 py-4">
                              <div class="space-y-2 text-slate-500 h-full">
                                <p class="text-lg font-medium bg-orange-400 text-white w-fit px-1">{{ $item->title }}
                                </p>
                                {{-- Foreach sub-industries --}}
                                @foreach ($item->subindustry as $subitem)
                                  <div class="border-b-2 pb-1 group hover:border-slate-600 duration-200 group">
                                    <a href=""
                                      class="text-base flex justify-between gap-4  items-center group-hover:text-slate-700 group-hover:font-medium duration-200">
                                      <span>{{ $subitem->title }}</span>
                                      <x-icons.chevron-right class="h-5 w-5" />
                                    </a>
                                  </div>
                                @endforeach
                              </div>
                              <div class="space-y-4">
                                <p class="text-base">{{ $item->description }}</p>
                                <a href="/"
                                  class="bg-orange-400 px-2 py-1 text-base text-white rounded-full">Selengkapnya</a>
                              </div>
                            </div>
                          </div>

                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- Industry --}}
          {{-- Products  --}}
          <div class="group">
            <div class="drop-shadow underline-offset-4"><a href="/products">Products</a></div>
            <div class="group-hover:block hidden absolute left-0 top-10 max-w-screen">
              <div class="bg-white border-b mt-6 w-screen h-full px-[4%] pt-[1%] pb-[2%]">
                <div class="flex gap-1 mt-4 w-fit h-full text-slate-800">
                  <div class="space-y-12 py-4 pl-4 pr-0 w-fit relative">
                    <p class="text-3xl font-bold">Products</p>
                    <div class="space-y-4 text-slate-500 w-fit">
                      @foreach ($productCategory as $item)
                        <div class="border-b-2 pb-1 hover:border-slate-600 duration-200 group/item">
                          <a href="/products/{{ $item->slug }}"
                            class="text-base flex justify-between gap-4  items-center group-hover/item:text-slate-700 group-hover/item:font-medium duration-200">
                            <span>{{ $item->title }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              class="h-5 w-5">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M9 6l6 6l-6 6" />
                            </svg>
                          </a>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- Products --}}
          {{-- Support --}}
          {{-- <div class="group">
            <div class="drop-shadow underline-offset-4"><a href="/support">Support</a></div>
            <div class="group-hover:block hidden absolute left-0 top-10 max-w-screen">
              <div class="bg-white border-b mt-6 w-screen h-full px-[4%] pt-[1%] pb-[2%]">
                <div class="flex gap-1 mt-4 w-fit h-full text-slate-800">
                  <div class="space-y-12 py-4 pl-4 pr-0 w-fit relative">
                    <p class="text-3xl font-bold">Support</p>
                    <div class="space-y-4 text-slate-500 w-fit">
                      <div class="border-b-2 pb-1 hover:border-slate-600 duration-200 group/item">
                        <a href="/support/inquiry"
                          class="text-base flex justify-between gap-4  items-center group-hover/item:text-slate-700 group-hover/item:font-medium duration-200">
                          <span>Send an Inquiry</span>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="h-5 w-5">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                          </svg>
                        </a>
                      </div>
                      <div class="border-b-2 pb-1 hover:border-slate-600 duration-200 group/item">
                        <a href="/support/support-training"
                          class="text-base flex justify-between gap-4  items-center group-hover/item:text-slate-700 group-hover/item:font-medium duration-200">
                          <span>Support and Training</span>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="h-5 w-5">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                          </svg>
                        </a>
                      </div>
                      <div class="border-b-2 pb-1 hover:border-slate-600 duration-200 group/item">
                        <a href="/support/maintenance-repair"
                          class="text-base flex justify-between gap-4  items-center group-hover/item:text-slate-700 group-hover/item:font-medium duration-200">
                          <span>Maintenance and Repair</span>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="h-5 w-5">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                          </svg>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
          {{-- Support --}}
          {{-- About Us --}}
          {{-- <div class="group">
            <div class="drop-shadow underline-offset-4"><a href="/about-us">About Us</a></div>
            <div class="group-hover:block hidden absolute left-0 top-10 max-w-screen">
              <div class="bg-white border-b mt-6 w-screen h-full px-[4%] pt-[1%] pb-[2%]">
                <div class="flex gap-1 mt-4 w-fit h-full text-slate-800">
                  <div class="space-y-12 py-4 pl-4 pr-0 w-fit relative">
                    <p class="text-3xl font-bold">About Us</p>
                    <div class="space-y-4 text-slate-500 w-fit">
                      <div class="border-b-2 pb-1 hover:border-slate-600 duration-200 group/item">
                        <a href="/about-us/overview"
                          class="text-base flex justify-between gap-4  items-center group-hover/item:text-slate-700 group-hover/item:font-medium duration-200">
                          <span>Overview</span>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="h-5 w-5">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                          </svg>
                        </a>
                      </div>
                      <div class="border-b-2 pb-1 hover:border-slate-600 duration-200 group/item">
                        <a href="/about-us/news-event"
                          class="text-base flex justify-between gap-4  items-center group-hover/item:text-slate-700 group-hover/item:font-medium duration-200">
                          <span>News and Event</span>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="h-5 w-5">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                          </svg>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
          {{-- About Us --}}
        </div>
      </nav>
      {{-- Burger Menu --}}
      <div class="block md:hidden group">
        <button class="border p-1 rounded-md text-white" data-drawer-target="drawer-navigation"
          data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-7 w-7">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 6h16" />
            <path d="M7 12h13" />
            <path d="M10 18h10" />
          </svg>
        </button>
        {{-- Mobile Menu --}}
        <div class="">
          <!-- drawer component -->
          <div id="drawer-navigation"
            class="fixed left-0 top-0 z-40 h-screen w-[90%] -translate-x-full overflow-y-auto bg-white p-4 transition-transform"
            tabindex="-1" aria-labelledby="drawer-navigation-label">
            <h5 id="drawer-navigation-label" class="text-base font-semibold uppercase text-gray-500">
              <a href="/">
                <img class="h-6 w-auto" src="{{ asset('storage/' . $sites['logo-desktop']?->image) }}" alt="">
              </a>
            </h5>
            <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
              class="absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400">
              <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
              <span class="sr-only">Close menu</span>
            </button>
            <div class="overflow-y-auto py-4">
              <ul class="space-y-2 font-medium">
                <li>
                  <a href="/" class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="h-6 w-6"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 8.71l-5.333 -4.148a2.666 2.666 0 0 0 -3.274 0l-5.334 4.148a2.665 2.665 0 0 0 -1.029 2.105v7.2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-7.2c0 -.823 -.38 -1.6 -1.03 -2.105" /><path d="M16 15c-2.21 1.333 -5.792 1.333 -8 0" /></svg>
                    <span class="ms-3">Home</span>
                  </a>
                </li>
                <li>
                  <button type="button"
                    class="group/industry flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 group-hover/industry:bg-gray-100"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-500 group-hover/industry:text-orange-400 transition duration-75"
                      aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                      <path
                        d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="ms-3 flex-1 whitespace-nowrap text-left rtl:text-right group-hover/industry:text-orange-400">Industries</span>
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                    </svg>
                  </button>
                  <ul id="dropdown-example" class="hidden space-y-2 py-2">
                    @foreach ($industry as $index => $item)
                      <li>
                        <a href="/industries/{{ $item->slug }}"
                          class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-100">{{ $item->title }}</a>
                      </li>
                    @endforeach
                  </ul>
                </li>
                <li>
                  <button type="button"
                    class="group/products flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-100"
                    aria-controls="dropdown-product" data-collapse-toggle="dropdown-product">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-500 group-hover/products:text-orange-400 transition duration-75"
                      aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                      <path
                        d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                    </svg>
                    <span class="ms-3 flex-1 whitespace-nowrap text-left rtl:text-right group-hover/products:text-orange-400">Products</span>
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                    </svg>
                  </button>
                  <ul id="dropdown-product" class="hidden space-y-2 py-2">
                    @foreach ($productCategory as $item)
                      <li>
                        <a href="/products/{{ $item->slug }}"
                          class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-100">{{ $item->title }}</a>
                      </li>
                    @endforeach
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      {{-- Search box --}}
      <div class="hidden md:block">
        <a href="/">
          <img class="h-6 w-auto" src="{{ asset('img/indonav_white.png') }}" alt="">
        </a>
        {{-- <form action="" class="flex gap-2 flex-1">
          <input type="search" class="p-2 bg-white rounded-md max-w-xl w-full" placeholder="Cari...">
          <button class="bg-orange-200 p-2 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-orange-600" width="44" height="44"
              viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor" fill="none" stroke-linecap="round"
              stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
              <path d="M21 21l-6 -6" />
            </svg>
          </button>
        </form> --}}
      </div>
    </div>

    {{-- Mobile --}}



  </div>

  <main>
    @yield('content')
  </main>

  <footer
    class="bg-white border-t-2 grid grid-cols-1 md:grid-cols-2 max-w-screen-lg mx-auto py-10 md:py-20 px-2 lg:px-0">
    <div class="space-y-6">
      <img class="h-8 w-auto" src="{{ asset('img/indonav.png') }}" alt="">

      <div class="space-y-2">
        <div class="flex items-start gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-orange-400">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
            <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
          </svg>
          <p class="font-light text-base text-slate-500">{{ $sites['alamat']?->description }}</p>
        </div>
        <div class="flex items-center gap-1 text-base font-light text-slate-500">
          <x-icons.mail class="h-6 w-6 text-orange-400" />
          {!! $sites['email']?->description !!}
        </div>
        <div class="flex items-center gap-1 text-base font-light text-slate-500">
          <x-icons.whatsapp class="h-6 w-6 text-orange-400" />
          {!! $sites['phone']?->description !!}
        </div>

      </div>

    <x-social-media class="flex gap-2 place-content-start" height="h-5" />
    </div>
      {{-- <div class="flex gap-6 justify-start md:justify-end">
        <div class="space-y-3">
          <p class="text-lg font-medium text-slate-500">Support </p>
          <ul class="space-y-2 text-slate-500">
            <li>
              <a href="/support/inquiry" class="hover:text-orange-400 hover:underline">
                Send an Inquiry
              </a>
            </li>
            <li>
              <a href="/support/support-training" class="hover:text-orange-400 hover:underline">
                Support and Training
              </a>
            </li>
            <li>
              <a href="/support/maintenance-repair" class="hover:text-orange-400 hover:underline">
                Maintenance and Repair
              </a>
            </li>
          </ul>
        </div> --}}
      {{-- <div class="space-y-3">
        <p class="text-lg font-medium text-slate-500">About Us</p>
        <ul class="space-y-2 text-slate-500">
          <li>
            <a href="/about-us/overview" class="hover:text-orange-400 hover:underline">
              Overview
            </a>
          </li>
          <li>
            <a href="/about-us/news-event" class="hover:text-orange-400 hover:underline">
              News and Event
            </a>
          </li>
        </ul>
      </div> --}}

    </div>
  </footer>
  <div class="max-w-screen-lg mx-auto flex justify-center border-t-2 py-2">
    <p class="text-base font-medium text-slate-400">Copyright &copy; 2024</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
