@php
  $sites = App\Models\Site::get()->keyBy('slug');
@endphp

@extends('layouts.app-v2', ['activePage' => 'pemesanan'])

@push('header')
  <meta property="og:title" content="Build a Smart World with INDONAV Precision Solutions ">
  <meta property="og:description"
    content="Discover CHC Navigation’s innovative solutions for geospatial, construction, navigation and agriculture.">
  <meta property="og:url" content="https://www.indonavtech.co.id/">
  <meta property="og:type" content="website">
  <meta property="og:image" content="{{ asset('img/og_image-indonav.jpg') }}">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:site_name" content="Indonav">
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush


@section('content')
  {{-- Section 3 --}}
  <div class="max-w-screen-lg px-2 md:px-0 mx-auto py-16 grid gap-8">

    <div class="flex flex-col md:flex-row items-start gap-4">
      <div class="flex-1 space-y-2 flex items-end md:items-start">
        <div class="space-y-2 w-2/3">
          <p class="text-4xl text-slate-800 font-bold">Formulir Pemesanan</p>
          <p>Setelah mengirim formulir ini, Anda akan menerima nomor tiket dan update status melalui email. </p>
          @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-4" role="alert">
              <p>Terima kasih! Formulir Anda sudah berhasil kami terima dan saat ini sedang diproses oleh tim kami. Silakan tunggu, kami akan segera menghubungi Anda melalui email yang telah Anda daftarkan.</p>
            </div>
          @endif
          @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-4" role="alert">
              <p>{{ session('error') }}</p>
            </div>
          @endif
        </div>
        <img src="{{ asset('img/doc-robot.png') }}" class="w-1/3 h-auto ml-auto" alt="">
      </div>
      <form class="grid gap-4 border rounded-xl p-4 w-full md:w-1/2" action="{{ route('tickets.store') }}" method="post">
        @csrf
        <p class="text-xl font-light text-slate-700 border-b-2">Formulir Permintaan Tiket 📝</p>
        <div class="space-y-0">
          <p class="indent-1 text-sm font-medium uppercase text-slate-600">Nama Lengkap <span
              class="font-bold text-red-600">*</span></p>
          <input type="text" name="full_name" class="border-2 rounded-lg p-2 focus:outline-none w-full"
            placeholder="Nama lengkap" required>
        </div>
        <div class="space-y-0">
          <p class="indent-1 text-sm font-medium uppercase text-slate-600">Alamat email <span
              class="font-bold text-red-600">*</span></p>
          <input type="mail" name="email" class="border-2 rounded-lg p-2 focus:outline-none w-full"
            placeholder="Email" required>
        </div>
        <div class="space-y-0">
          <p class="indent-1 text-sm font-medium uppercase text-slate-600">Nomor HP (Whatsapp) <span
              class="font-bold text-red-600">*</span></p>
          <input type="text" name="phone_number" class="border-2 rounded-lg p-2 focus:outline-none w-full"
            placeholder="Nomor telpon/whatsapp aktif" required>
        </div>
        <div class="space-y-0">
          <p class="indent-1 text-sm font-medium uppercase text-slate-600">Perusahaan / Instansi <span
              class="font-bold text-red-600">*</span></p>
          <textarea class="border-2 rounded-lg p-2 focus:outline-none w-full" name="company" id="" rows="2"
            placeholder="Nama perusahaan/instansi" required></textarea>
        </div>
        <div class="space-y-0">
          <p class="indent-1 text-sm font-medium uppercase text-slate-600">Kategori Tiket <span
              class="font-bold text-red-600">*</span></p>
          <select id="option" name="ticket_category" class="border-2 rounded-lg p-2 focus:outline-none w-full"
            required>
            <option>Pilih Kategori</option>
            <option value="permintaan penawaran harga">Permintaan Penawaran Harga (Quotation)</option>
            <option value="dukungan teknis">Dukungan Teknis</option>
            <option value="permintaan demo produk">Permintaan Demo Produk</option>
            <option value="konsultasi proyek">Konsultasi Proyek</option>
            <option value="kerja sama partnering">Kerja Sama/Partnering</option>
            <option value="komplain laporan masalah">Komplain/Laporan Masalah</option>
            <option value="lainnya">Lainnya</option>
          </select>
        </div>
        <div class="space-y-0">
          <p class="indent-1 text-sm font-medium uppercase text-slate-600">Judul Permintaan <span
              class="font-bold text-red-600">*</span></p>
          <textarea name="subject" class="border-2 rounded-lg p-2 focus:outline-none w-full" name="title" id=""
            rows="2" required placeholder="Misalnya: Permintaan Quotation GNSS i89" required></textarea>
        </div>
        <div class="space-y-0">
          <p class="indent-1 text-sm font-medium uppercase text-slate-600">Deskripsi Permintaan <span
              class="font-bold text-red-600">*</span></p>
          <textarea name="description" class="border-2 rounded-lg p-2 focus:outline-none w-full" name="instansi" id=""
            rows="2" required
            placeholder="Tulis secara detail kebutuhan Anda, termasuk produk, lokasi, jadwal, kendala, dsb." required></textarea>
        </div>
        <div class="space-y-0">
          <p class="indent-1 text-sm font-medium uppercase text-slate-600">Lampiran File (opsional)</p>
          <span class="text-xs indent-1 text-gray-500">
            Format: gambar, .pdf, .docx, .xlsx &nbsp; | &nbsp; Maks. 5 MB
          </span>
          {{-- <input type="hidden"/> --}}
          <input type="file" name="attachment" class="filepond" data-max-file-size="5MB"
            accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.xls,.xlsx" placeholder="Upload file PDF/jpg/png jika ada" />
        </div>
        <button type="submit" class="bg-orange-600 w-fit py-2 px-4 rounded-lg text-white">Kirim</button>
      </form>

    </div>
  </div>
  <hr>
@endsection
