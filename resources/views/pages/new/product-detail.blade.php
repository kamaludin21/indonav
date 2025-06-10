@extends('layouts.app-v2')

@section('content')
  {{-- Product Nav --}}
  <div class="flex justify-between items-center py-5 md:px-44 bg-slate-800 text-slate-100">
    <div>
      <p class="text-lg font-medium">CHCNAV i73+</p>
    </div>
    <div>
      <ul class="flex gap-2 tracking-wide text-sm font-medium uppercase">
        <li>highlight</li>
        <li>spesification</li>
        <li>download</li>
      </ul>
    </div>
  </div>
  {{-- Product header --}}
  <div class="px-2 md:px-44 pt-16 pb-20">
    <div class="flex justify-between items-center relative">
      <div>
        <p class="text-5xl font-bold text-slate-800">CHCNAV i89</p>
        <p class="text-2xl font-light text-slate-700">Pocket-Sized Visual IMU-RTK GNSS</p>
      </div>
      <div class="z-10">
        <img src="{{ asset('img/product1.png') }}" class="w-72 h-auto" alt="">
      </div>

      {{-- Absolute el: --}}
      <div class="absolute top-2/3 w-full z-0">
        <p class="text-9xl font-bold text-white text-right">CHCNAV i89</p>
      </div>
    </div>
  </div>

  {{-- Highlight section --}}
  <div class="bg-white px-2 md:px-44 py-10">
    <p class="text-4xl text-orange-600 font-bold">Highlight</p>
    <hr class="my-4">
    <div class="flex items-start gap-6">
      <div class="w-1/3">
        {{-- Slidable --}}
        <img class="w-full h-auto bg-cover rounded-lg"
          src="https://geospatial.chcnav.com/dam/geospatial/products/Surveying-Engineering/GNSS-Smart-Antennas/i89/product_introduction/PC/i89-pocket-sized-visual-receiver-chcnav.jpg"
          alt="">
      </div>
      <div class="flex-1">
        <p class="text-lg text-slate-700">The i89 is a compact yet powerful surveying tool with a 1408-channel GNSS module
          that enhances RTK performance in challenging conditions. Its advanced ionospheric modeling ensures reliable RTK
          fixes, even during high solar activity. With 16.5 hours of battery life and a lightweight 750 g design, the i89
          delivers efficiency and ease for daily surveying tasks.</p>

      </div>
    </div>
  </div>

  {{-- Feature Section --}}
  <div class="bg-white px-2 md:px-44 py-32">
    <p class="text-4xl text-orange-600 font-bold text-center mb-16">Main Features</p>
    <div class="flex flex-wrap justify-center gap-16">
      <div class=" w-1/4 grid justify-items-center gap-2 hover:bg-slate-200 duration-200 p-2 rounded-lg">
        <img
          src="https://geospatial.chcnav.com/dam/geospatial/products/Surveying-Engineering/GNSS-Smart-Antennas/i89/icon_text_cards/PC/compact-lightway-i89-gnss-receiver.png"
          class="h-32 w-32 bg-cover rounded-lg" alt="">
        <p class="text-2xl font-semibold text-slate-800">Lightweight</p>
        <p class="text-normal text-center text-slate-700">Only 750g for efficiency and ease of everyday use.</p>
      </div>
      <div class=" w-1/4 grid justify-items-center gap-2 hover:bg-slate-200 duration-200 p-2 rounded-lg">
        <img
          src="https://geospatial.chcnav.com/dam/geospatial/products/Surveying-Engineering/GNSS-Smart-Antennas/i89/icon_text_cards/PC/visual-surveying-i89-gnss-receiver.png"
          class="h-32 w-32 bg-cover rounded-lg" alt="">
        <p class="text-2xl font-semibold text-slate-800">Visual Surveying</p>
        <p class="text-normal text-center text-slate-700">Dual cameras extract survey-grade 3D coordinates improving point
          measurement efficiency.</p>
      </div>
      <div class=" w-1/4 grid justify-items-center gap-2 hover:bg-slate-200 duration-200 p-2 rounded-lg">
        <img
          src="https://geospatial.chcnav.com/dam/geospatial/products/Surveying-Engineering/GNSS-Smart-Antennas/i89/icon_text_cards/PC/superior-gnss-technology-i89-receiver.png"
          class="h-32 w-32 bg-cover rounded-lg" alt="">
        <p class="text-2xl font-semibold text-slate-800">Superior GNSS</p>
        <p class="text-normal text-center text-slate-700">Advanced ionospheric error mitigation with iStar 2.0</p>
      </div>
    </div>
  </div>

  {{-- Feature Section --}}
  <div class="bg-white px-2 md:px-44 py-32">
    <p class="text-4xl text-orange-600 font-bold text-center mb-16">Specifications</p>
    <div class="grid grid-cols-4 gap-4">
      <div class="border border-slate-400 bg-white rounded-lg p-4">
        <p>i89_ID.pdf</p>
        <p>2.92 MB</p>
        <div class="h-4"></div>
        <button class="flex gap-2 bg-orange-600 text-white px-2 py-1 rounded-md">
          <span>UNDUH</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
            <path d="M7 11l5 5l5 -5" />
            <path d="M12 4l0 12" />
          </svg>
        </button>
      </div>
      <div class="border border-slate-400 bg-white rounded-lg p-4">
        <p>i89_EN.pdf</p>
        <p>2.40 MB</p>
        <div class="h-4"></div>
        <button class="flex gap-2 bg-orange-600 text-white px-2 py-1 rounded-md">
          <span>UNDUH</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
            <path d="M7 11l5 5l5 -5" />
            <path d="M12 4l0 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  {{-- Other Product Section --}}
  <div class="bg-white px-2 md:px-44 py-32">
    <p class="text-4xl text-orange-600 font-bold mb-16">Other Product</p>

    <div class="grid grid-cols-4 gap-6">

      <div class="grid gap-2">
        <img class="w-2/3 h-44 object-cover"
          src="https://geospatial.chcnav.com/dam/jcr:44442276-c8b3-4647-b4ee-d7f962f2caa8/Software-chcnav-Copre-320.png"
          alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV CoPre</p>

        <button class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>

      <div class="grid gap-2">
        <img class="w-2/3 h-44 object-cover"
          src="https://geospatial.chcnav.com/dam/jcr:ca3f4b61-d5ef-4e6a-9d09-3157fc5c6dd7/gnss-smart-full-antennas-chcnav-i93.png"
          alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV i93</p>

        <button class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>

      <div class="grid gap-2">
        <img class="w-2/3 h-44 object-cover"
          src="https://geospatial.chcnav.com/dam/jcr:a2f7717b-e17a-4d4d-bc37-ba64a12b0591/controllers-Tablets-chcnav-HCE600%20(1).png"
          alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV HCE600</p>

        <button class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>

      <div class="grid gap-2">
        <img class="w-2/3 h-44 object-cover"
          src="https://geospatial.chcnav.com/dam/jcr:36a5fc69-0a83-4f59-bfab-8db5bcfd0ef2/Total-Station-chcnav-cts-a100.png"
          alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV CTS-A100</p>

        <button class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>

    </div>
  </div>
@endsection
