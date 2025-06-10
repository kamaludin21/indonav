@extends('layouts.app-v2')

@section('content')
  <div class="bg-slate-100 py-10">
    <div class=" px-2 md:px-44 py-10">
      <p class="text-4xl text-orange-600 font-bold">Shop All</p>
    </div>
    <div class="border-y border-slate-300 py-3">
      <div class=" px-2 md:px-44">
        <ul class="flex gap-4 text-sm font-normal text-slate-700">
          <li class="font-medium text-orange-600">Semua Produk</li>
          <li>Surveying and Engineering</li>
          <li>3D Mobile Mapping</li>
        </ul>
      </div>
    </div>
    <div class="grid grid-cols-4 gap-6 px-2 md:px-44 py-10">
      <div class="bg-white grid justify-items-center gap-4 flex flex-col w-full p-4 hover:rounded-lg items-center">
        <img src="https://geospatial.chcnav.com/dam/geospatial/products/Surveying-Engineering/GNSS-Smart-Antennas/i73-/top_banner/gnss-smart-full-antennas-chcnav-i73---1-.png" class="w-2/3" alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV i73+</p>
        <p class="text-base font-normal tracking-wide text-slate-600 text-center">Compact GNSS Receiver for Maximum Flexibility</p>
        <button class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>
      <div class="bg-white grid justify-items-center gap-4 flex flex-col w-full p-4 hover:rounded-lg items-center">
        <img src="https://geospatial.chcnav.com/dam/geospatial/products/Surveying-Engineering/GNSS-Smart-Antennas/i76/top_banner/gnss-smart-full-antennas-chcnav-i76.png0" class="w-2/3" alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV i76</p>
        <p class="text-base font-normal tracking-wide text-slate-600 text-center">Palm-Sized GNSS with Visual Positioning</p>
        <button class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>
      <div class="bg-white grid justify-items-center gap-4 flex flex-col w-full p-4 hover:rounded-lg items-center">
        <img src="https://geospatial.chcnav.com/dam/geospatial/products/Surveying-Engineering/GNSS-Smart-Antennas/i89/top_banner/gnss-smart-full-antennas-chcnav-i89.png0" class="w-2/3" alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV i89</p>
        <p class="text-base font-normal tracking-wide text-slate-600 text-center">Pocket-Sized Visual IMU-RTK GNSS</p>
        <button class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>
      <div class="bg-white grid justify-items-center gap-4 flex flex-col w-full p-4 hover:rounded-lg items-center">
        <img src="https://geospatial.chcnav.com/dam/geospatial/products/Surveying-Engineering/GNSS-Antennas/C220GR2/top_banner/gnss-antennas-chcnav-C220GR2--1-.png" class="w-2/3" alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV C220GR2</p>
        <p class="text-base font-normal tracking-wide text-slate-600 text-center">GNSS Choke-ring Geodetic Antenna</p>
        <button class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>
      <div class="bg-white grid justify-items-center gap-4 flex flex-col w-full p-4 hover:rounded-lg items-center">
        <img src="https://geospatial.chcnav.com/dam/geospatial/products/Surveying-Engineering/Controllers---Tablets/HCE600/top_banner/controllers-Tablets-chcnav-HCE600--1-.png" class="w-2/3" alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV HCE600</p>
        <p class="text-base font-normal tracking-wide text-slate-600 text-center">CHCNAV Rugged Field Controller for Surveying and Mapping</p>
        <button class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>


      {{-- Category 2 --}}
      <div class="bg-white grid justify-items-center gap-4 flex flex-col w-full p-4 hover:rounded-lg items-center">
        <img src="https://geospatial.chcnav.com/dam/geospatial/products/3d-mobile-mapping/UAV-Platforms/x500/product_spec/PD-card/X500.png" class="w-2/3" alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV X500</p>
        <p class="text-base font-normal tracking-wide text-slate-600 text-center">Professional Multirotor Drone</p>
        <button class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>
      <div class="bg-white grid justify-items-center gap-4 flex flex-col w-full p-4 hover:rounded-lg items-center">
        <img src="https://geospatial.chcnav.com/dam/geospatial/products/3d-mobile-mapping/Mobile-Mapping-Systems/AlphaUni-20-/top_banner/mobile-mapping-systems-chcnav-AU20--1-.png" class="w-2/3" alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV AlphaUni 20</p>
        <p class="text-base font-normal tracking-wide text-slate-600 text-center">Multi-platform Premium LiDAR</p>
        <button class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>
      <div class="bg-white grid justify-items-center gap-4 flex flex-col w-full p-4 hover:rounded-lg items-center">
        <img src="https://geospatial.chcnav.com/dam/geospatial/products/3d-mobile-mapping/Airborne-LiDAR-Systems/AlphaAir-15/top_banner/airborne--LiDAR-systems-chcnav-AA15--1-.png" class="w-2/3" alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV AlphaAir 15</p>
        <p class="text-base font-normal tracking-wide text-slate-600 text-center">Premium Airborne LiDAR Solution</p>
        <button class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>
      <div class="bg-white grid justify-items-center gap-4 flex flex-col w-full p-4 hover:rounded-lg items-center">
        <img src="https://geospatial.chcnav.com/dam/geospatial/products/3d-mobile-mapping/Handheld-Laser-Scanners/RS10/top_banner/handheld--Laser-scanners-chcnav-RS10--1-.png" class="w-2/3" alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV RS10</p>
        <p class="text-base font-normal tracking-wide text-slate-600 text-center">Handheld SLAM 3D Laser Scanner + GNSS RTK</p>
        <button class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>
      <div class="bg-white grid justify-items-center gap-4 flex flex-col w-full p-4 hover:rounded-lg items-center">
        <img src="https://geospatial.chcnav.com/dam/geospatial/products/3d-mobile-mapping/UAS-Cameras/C30/top_banner/uas-cameras-chcnav-C30-(1).png" class="w-2/3" alt="">
        <p class="text-lg font-semibold tracking-wide text-slate-700">CHCNAV C30</p>
        <p class="text-base font-normal tracking-wide text-slate-600 text-center">Aerial Oblique Camera System</p>
        <button class="w-fit border border-orange-600 text-orange-600 hover:text-white hover:bg-orange-600 duration-200 px-3 py-0.5 uppercase rounded-full">
          <span class="text-sm font-medium">
            Selengkapnya
          </span>
        </button>
      </div>

    </div>
  </div>
@endsection
