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
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

</head>

<body>
  {{-- Top Navigation --}}
  <div class="sticky top-0 z-50 bg-white">
    {{-- Brand --}}
    <div class="hidden md:grid grid-cols-3 justify-between self-center items-center px-[5%] py-2">

      {{-- Email and Phone --}}
      <div class="flex gap-4 place-content-start">
        <div class="flex items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-orange-400">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
            <path d="M3 7l9 6l9 -6" />
          </svg>
          <p class="text-sm text-slate-500">{{ $sites['email']?->description }}</p>
        </div>
        <div class="flex items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-orange-400">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
              d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
          </svg>
          <p class="text-sm text-slate-500">{{ $sites['phone']?->description }}</p>
        </div>
      </div>

      {{-- Brand/LOGO --}}
      <div class="place-self-center">
        <a href="{{ $sites['logo-desktop']?->url }}">
          <img class="h-6 w-auto" src="{{ asset('storage/' . $sites['logo-desktop']?->image) }}" alt="">
        </a>
      </div>

      <div class="flex gap-2 place-content-end">
        <a href="" class="bg-orange-400 h-fit p-1 rounded-full flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-auto text-white" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
              d="M18 2a1 1 0 0 1 .993 .883l.007 .117v4a1 1 0 0 1 -.883 .993l-.117 .007h-3v1h3a1 1 0 0 1 .991 1.131l-.02 .112l-1 4a1 1 0 0 1 -.858 .75l-.113 .007h-2v6a1 1 0 0 1 -.883 .993l-.117 .007h-4a1 1 0 0 1 -.993 -.883l-.007 -.117v-6h-2a1 1 0 0 1 -.993 -.883l-.007 -.117v-4a1 1 0 0 1 .883 -.993l.117 -.007h2v-1a6 6 0 0 1 5.775 -5.996l.225 -.004h3z"
              stroke-width="0" fill="currentColor" />
          </svg>
        </a>

        <a href="" class="bg-orange-400 h-fit p-1 rounded-full flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-auto text-white" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
              d="M8.267 3a1 1 0 0 1 .73 .317l.076 .092l4.274 5.828l5.946 -5.944a1 1 0 0 1 1.497 1.32l-.083 .094l-6.163 6.162l6.262 8.54a1 1 0 0 1 -.697 1.585l-.109 .006h-4.267a1 1 0 0 1 -.73 -.317l-.076 -.092l-4.276 -5.829l-5.944 5.945a1 1 0 0 1 -1.497 -1.32l.083 -.094l6.161 -6.163l-6.26 -8.539a1 1 0 0 1 .697 -1.585l.109 -.006h4.267z"
              stroke-width="0" fill="currentColor" />
          </svg>
        </a>

        <a href="" class="bg-orange-400 h-fit p-1 rounded-full flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-auto text-white" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
            <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
            <path d="M16.5 7.5l0 .01" />
          </svg>
        </a>

        <a href="" class="bg-orange-400 h-fit p-1 rounded-full flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-auto text-white" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
              d="M16.083 2h-4.083a1 1 0 0 0 -1 1v11.5a1.5 1.5 0 1 1 -2.519 -1.1l.12 -.1a1 1 0 0 0 .399 -.8v-4.326a1 1 0 0 0 -1.23 -.974a7.5 7.5 0 0 0 1.73 14.8l.243 -.005a7.5 7.5 0 0 0 7.257 -7.495v-2.7l.311 .153c1.122 .53 2.333 .868 3.59 .993a1 1 0 0 0 1.099 -.996v-4.033a1 1 0 0 0 -.834 -.986a5.005 5.005 0 0 1 -4.097 -4.096a1 1 0 0 0 -.986 -.835z"
              stroke-width="0" fill="currentColor" />
          </svg>
        </a>

      </div>

    </div>
    {{-- Navigation --}}
    <div class="bg-orange-400 flex items-center justify-between px-2 md:px-[5%] py-3 relative">
      <div class="block md:hidden">
        <a href="{{ $sites['logo-mobile']?->url }}">
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
              <div class="bg-white border-b mt-6 w-screen h-full px-[4%] pt-[1%] pb-[2%]">
                <div class="flex gap-1 mt-4 w-fit h-full text-slate-800">
                  <div class="space-y-12 py-4 pl-4 pr-0 w-fit relative">
                    <p class="text-3xl font-bold">Industries</p>
                    <div class="space-y-4 text-slate-500 w-fit">
                      @foreach ($industry as $index => $item)
                        <div class="border-b-2 pb-1 hover:border-slate-600 duration-200 group/item">
                          <a href="/industries/{{ $item->slug }}"
                            class="text-base flex justify-between gap-4  items-center group-hover/item:text-slate-700 group-hover/item:font-medium duration-200">
                            <span>{{ $item->title }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              class="h-5 w-5">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M9 6l6 6l-6 6" />
                            </svg>
                          </a>

                          {{-- Submenu: show on hover --}}
                          <div
                            class="absolute hidden group-hover/item:block transition duration-500 ease-in-out top-0 left-full w-dvw max-w-2xl h-full">
                            <div
                              class="bg-white w-full  h-full space-y-10 flex flex-col justify-between pl-8 pr-0 py-4">
                              <div class="space-y-2 text-slate-500">
                                <p class="text-lg font-medium bg-orange-400 text-white w-fit px-1">{{ $item->title }}
                                </p>
                                {{-- Foreach sub-industries --}}
                                @foreach ($item->subindustry as $subitem)
                                  <div class="border-b-2 pb-1 group hover:border-slate-600 duration-200 group">
                                    <a href=""
                                      class="text-base flex justify-between gap-4  items-center group-hover:text-slate-700 group-hover:font-medium duration-200">
                                      <span>{{ $subitem->title }}</span>
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-5 w-5">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 6l6 6l-6 6" />
                                      </svg>
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
          <div class="group">
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
          </div>
          {{-- Support --}}
          {{-- About Us --}}
          <div class="group">
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
          </div>
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
            <h5 id="drawer-navigation-label" class="text-base font-semibold uppercase text-gray-500">Menu</h5>
            <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
              class="absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900">
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
                    <svg class="h-5 w-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                      aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                      <path
                        d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                      <path
                        d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Home</span>
                  </a>
                </li>
                <li>
                  <button type="button"
                    class="group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-100"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900"
                      aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                      <path
                        d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="ms-3 flex-1 whitespace-nowrap text-left rtl:text-right">Industries</span>
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
                    class="group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-100"
                    aria-controls="dropdown-product" data-collapse-toggle="dropdown-product">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                      aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                      <path
                        d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                    </svg>
                    <span class="ms-3 flex-1 whitespace-nowrap text-left rtl:text-right">Products</span>
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
                <li>
                  <button type="button"
                    class="group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-100"
                    aria-controls="dropdown-support" data-collapse-toggle="dropdown-support">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900"
                      aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path
                        d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="ms-3 flex-1 whitespace-nowrap text-left rtl:text-right">Support</span>
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                    </svg>
                  </button>
                  <ul id="dropdown-support" class="hidden space-y-2 py-2">

                    <li>
                      <a href="/support/inquiry"
                        class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-100">
                        Send an Inquiry
                      </a>
                    </li>
                    <li>
                      <a href="/support/support-training"
                        class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-100">
                        Support and Training
                      </a>
                    </li>
                    <li>
                      <a href="/support/maintenance-repair"
                        class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-100">
                        Maintenance and Repair
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <button type="button"
                    class="group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-100"
                    aria-controls="dropdown-about-us" data-collapse-toggle="dropdown-about-us">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900"
                      aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                      <path
                        d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="ms-3 flex-1 whitespace-nowrap text-left rtl:text-right">About Us</span>
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                    </svg>
                  </button>
                  <ul id="dropdown-about-us" class="hidden space-y-2 py-2">

                    <li>
                      <a href="/about-us/overview"
                        class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-100">
                        Overview
                      </a>
                    </li>
                    <li>
                      <a href="/support/news-event"
                        class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-100">
                        News and Event
                      </a>
                    </li>
                  </ul>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
      {{-- Search box --}}
      <div class="hidden md:block">
        <form action="" class="flex gap-2 flex-1">
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
        </form>
      </div>
    </div>

    {{-- Mobile --}}



  </div>

  <main>
    @yield('content')
  </main>

  <footer
    class="bg-white border-t-2 grid grid-cols-1 md:grid-cols-2 max-w-screen-lg mx-auto py-10 md:py-20 px-2 md:px-0">
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
        <div class="flex items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-orange-400">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
            <path d="M3 7l9 6l9 -6" />
          </svg>
          <p class="text-sm text-slate-500">{{ $sites['email']?->description }}</p>
        </div>
        <div class="flex items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-orange-400">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
              d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
          </svg>
          <p class="text-sm text-slate-500">{{ $sites['phone']?->description }}</p>
        </div>
      </div>

      <p class="font-light text-base text-slate-500"></p>
    </div>
    <div class="flex gap-6 justify-start md:justify-end">
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
      </div>
      <div class="space-y-3">
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
      </div>

    </div>
  </footer>
  <div class="max-w-screen-lg mx-auto flex justify-center border-t-2 py-2">
    <p class="text-sm font-medium text-slate-400">Copyright &copy; 2024</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
