<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])

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
          <p class="text-sm text-slate-500">indonav@mail.com</p>
        </div>
        <div class="flex items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-orange-400">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
              d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
          </svg>
          <p class="text-sm text-slate-500">+6309-4934-9293</p>
        </div>
      </div>

      {{-- Brand/LOGO --}}
      <div class="place-self-center">
        <img class="h-6 w-auto" src="{{ asset('img/indonav.png') }}" alt="">
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
    <div class="bg-orange-400 flex items-center justify-between px-2 md:px-[5%] py-3">
      <div class="block md:hidden">
        <img class="h-6 w-auto" src="{{ asset('img/indonav_white.png') }}" alt="">
      </div>
      <nav class="hidden md:block">
        <ul class="flex gap-6 text-xl font-light text-slate-100">
          <li class="drop-shadow underline-offset-2 underline text-white"><a href="/">Home</a></li>
          <li class="drop-shadow underline-offset-2"><a href="/about">About</a></li>
          <li class="drop-shadow underline-offset-2"><a href="/services">Services</a></li>
          <li class="drop-shadow underline-offset-2"><a href="/blog">Blog</a></li>
          <li class="drop-shadow underline-offset-2"><a href="/contact">Contact</a></li>
        </ul>
      </nav>
      {{-- Burger Menu --}}
      <div class="block md:hidden">
        <button class="border p-1 rounded-md text-white">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 6h16" />
            <path d="M7 12h13" />
            <path d="M10 18h10" />
          </svg>

        </button>
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

  </div>

  <main>
    {{-- Carousel --}}
    @yield('content')
    {{-- Carousel End --}}

  </main>

  <footer class="bg-white border-t-2 grid grid-cols-1 md:grid-cols-2 max-w-screen-lg mx-auto py-10 md:py-20 px-2 md:px-0">
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
          <p class="font-light text-base text-slate-500">Jalan Meruya Ilir, Rukan Business Park Kebun Jeruk Blok F-1
            No.12,
            Jakarta Barat</p>
        </div>
        <div class="flex items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-orange-400">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
            <path d="M3 7l9 6l9 -6" />
          </svg>
          <p class="text-sm text-slate-500">indonav@mail.com</p>
        </div>
        <div class="flex items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-orange-400">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
              d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
          </svg>
          <p class="text-sm text-slate-500">+6309-4934-9293</p>
        </div>
      </div>

      <p class="font-light text-base text-slate-500"></p>
    </div>
    <div class="flex gap-6 justify-start md:justify-end">
      <div class="space-y-3">
        <p class="text-lg font-medium">Company</p>
        <ul class="space-y-2">
          <li>About Us</li>
          <li>Contact</li>
          <li>Careers</li>
        </ul>
      </div>
      <div class="space-y-3">
        <p class="text-lg font-medium">Resource</p>
        <ul class="space-y-2">
          <li>News</li>
          <li>Blog</li>
          <li>Calendar</li>
        </ul>
      </div>
    </div>
  </footer>
  <div class="max-w-screen-lg mx-auto flex justify-center border-t-2 py-2">
    <p class="text-sm font-medium text-slate-400">Copyright 	&copy; 2024</p>
  </div>

</body>

</html>
