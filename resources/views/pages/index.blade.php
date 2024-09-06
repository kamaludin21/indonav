@extends('layouts.app')

@section('content')
  <div class="w-full overflow-x-hidden">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        @for ($i = 0; $i < 3; $i++)
          <div
            class="swiper-slide bg-[url('https://chcnav.com/uploads/precision-agriculture-autosteer-tractor-farming-machine-nx-510-higher-yields-chcnav.jpg')] bg-no-repeat bg-center bg-cover">
            <div class="h-dvh flex max-w-screen-sm md:max-w-screen-lg mx-auto items-end md:items-center pb-[15%] px-[5%]">
              <div class="space-y-4">
                <h2 class="text-2xl md:text-5xl font-bold text-white drop-shadow-lg">Lorem ipsum dolor sit amet consectetur
                  adipisicing elit.</h2>
                <p class="text-lg md:text-xl font-medium text-slate-100">Lorem ipsum dolor sit amet consectetur, adipisicing
                  elit.
                  Ab perspiciatis dicta a, consectetur necessitatibus mollitia.</p>
                <button class="bg-orange-400 px-4 py-2 text-white rounded-full">Selengkapnya</button>
              </div>
            </div>
          </div>
        @endfor
      </div>
    </div>
    <!-- Pagination -->
    <div class="">
      <div class="swiper-pagination"></div>
    </div>
    <!-- Navigation buttons -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>

    {{-- News & Event --}}
    <div class="max-w-screen-lg space-y-10 py-20 mx-auto">
      <div class="text-center">
        <h2 class="text-3xl font-bold">News & Event</h2>
      </div>

      <div class="grid grid-cols-2 md:grid-cols-4 gap-6 p-2">
        <div class="col-span-2">
          <img class="h-56 w-full object-cover"
            src="https://chcnav.com/uploads/surveying-engineering-positioning-gnss-imu-rtk-antennas-construction-geodetic-survey-planning-chcnav.jpg"
            alt="">
          <p class="text-slate-500">12 Agustus 2024</p>
          <p
            class="text-xl font-bold text-slate-700 hover:text-orange-400 hover:cursor-pointer hover:underline hover:underline-offset-2">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="">
          <img class="h-56 w-full object-cover"
            src="https://chcnav.com/uploads/surveying-engineering-positioning-gnss-imu-rtk-antennas-construction-geodetic-survey-planning-chcnav.jpg"
            alt="">
          <p class="text-slate-500">12 Agustus 2024</p>
          <p
            class="text-xl font-bold text-slate-700 hover:text-orange-400 hover:cursor-pointer hover:underline hover:underline-offset-2">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="">
          <img class="h-56 w-full object-cover"
            src="https://chcnav.com/uploads/surveying-engineering-positioning-gnss-imu-rtk-antennas-construction-geodetic-survey-planning-chcnav.jpg"
            alt="">
          <p class="text-slate-500">12 Agustus 2024</p>
          <p
            class="text-xl font-bold text-slate-700 hover:text-orange-400 hover:cursor-pointer hover:underline hover:underline-offset-2">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="">
          <img class="h-56 w-full object-cover"
            src="https://chcnav.com/uploads/surveying-engineering-positioning-gnss-imu-rtk-antennas-construction-geodetic-survey-planning-chcnav.jpg"
            alt="">
          <p class="text-slate-500">12 Agustus 2024</p>
          <p
            class="text-xl font-bold text-slate-700 hover:text-orange-400 hover:cursor-pointer hover:underline hover:underline-offset-2">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="">
          <img class="h-56 w-full object-cover"
            src="https://chcnav.com/uploads/surveying-engineering-positioning-gnss-imu-rtk-antennas-construction-geodetic-survey-planning-chcnav.jpg"
            alt="">
          <p class="text-slate-500">12 Agustus 2024</p>
          <p
            class="text-xl font-bold text-slate-700 hover:text-orange-400 hover:cursor-pointer hover:underline hover:underline-offset-2">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="">
          <img class="h-56 w-full object-cover"
            src="https://chcnav.com/uploads/surveying-engineering-positioning-gnss-imu-rtk-antennas-construction-geodetic-survey-planning-chcnav.jpg"
            alt="">
          <p class="text-slate-500">12 Agustus 2024</p>
          <p
            class="text-xl font-bold text-slate-700 hover:text-orange-400 hover:cursor-pointer hover:underline hover:underline-offset-2">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="h-full w-full flex items-center justify-center bg-orange-400">
          <p class="text-2xl font-bold text-white">Selengkapnya</p>
        </div>
      </div>
    </div>

    {{-- Industries --}}
    <div class="max-w-screen-lg space-y-10 py-20 mx-auto">
      <div class="text-center">
        <h2 class="text-3xl font-bold">Industries</h2>
      </div>

      <div class="grid grid-cols-2 md:grid-cols-4 gap-6 px-2">
        @for ($i = 0; $i < 7; $i++)
          <div class="bg-orange-100 p-6 space-y-2">
            <p class="text-lg font-light">Survey & Engineering</p>
            <p class="text-base font-light text-slate-600">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            </p>
            <div class="h-24"></div>
            <a href=""
              class="underline font-medium z-10 relative underline-offset-2 hover:underline-offset-4 duration-200">Selengkapnya</a>
          </div>
        @endfor
      </div>
      {{-- Industries End --}}


      {{-- Company --}}
      <div class="max-w-screen-lg space-y-10 py-20 mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 px-2 md:px-0 gap-4">
          <div>
            <p class="text-4xl font-light text-slate-700">Tentang Kami</p>
          </div>
          <div class="space-y-4 text-base tracking-wide text-slate-600">
            <p>INDONAV is a pioneering company specializing in advanced GNSS navigation and positioning solutions. With
              a focus on innovation, INDONAV is committed to delivering top-tier technologies that meet the evolving
              needs of industries worldwide. Their solutions empower businesses to achieve precision and efficiency in a
              range of applications, from land surveying to autonomous systems.</p>

            <p>With a steadily growing presence across global markets, INDONAV has emerged as a key player in the field
              of geomatics technology. Their success is driven by a dedication to research and development, which keeps
              them at the forefront of industry advancements. As one of the fastest-growing companies in this space,
              INDONAV continues to redefine the possibilities of navigation and positioning.
            </p>
          </div>
        </div>
      </div>
      {{-- Company End --}}

      {{-- Contact  --}}

      <div class="bg-orange-400 px-[20%] text-center space-y-4 py-[5%] relative">

        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="absolute left-4 top-4 h-20 w-20 text-slate-200/10">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="absolute left-40 top-20 h-20 w-20 text-slate-200/10">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
        </svg>


        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="absolute right-40 top-40 h-20 w-20 text-slate-200/10">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="absolute right-10 top-100 h-20 w-20 text-slate-200/10">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
          <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
        </svg>


        <p class="text-4xl font-bold tracking-wider text-white drop-shadow-lg">Ready to make switch?</p>
        <p class="text-base font-light tracking-wide text-slate-100 drop-shadow-lg">Lorem ipsum dolor sit, amet
          consectetur adipisicing elit. Quae, maiores at excepturi quisquam vitae enim sapiente debitis vero illum
          consequuntur?</p>

        <button class="bg-white text-orange-400 py-2 px-3">
          Hubungi Kami
        </button>

      </div>
    </div>
@endsection
