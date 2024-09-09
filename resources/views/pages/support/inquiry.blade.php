@php
  // $productCategory = App\Models\ProductCategory::get();
@endphp

@extends('layouts.app')

@section('content')
  <div class="max-w-screen-lg space-y-10 py-20 mx-auto px-2 lg:px-0">
    <div class="text-start space-y-4 border-b pb-2">
      <h2 class="text-2xl md:text-4xl font-bold text-orange-400">Send an Inquiry</h2>
      <p class="text-base md:text-xl text-slate-500">Discover what we can do for you</p>
    </div>

    <div>
      <form>
        <div class="mb-6 grid gap-6 md:grid-cols-2">
          <div>
            <label for="first_name" class="mb-2 block text-sm font-medium text-gray-900">Nama</label>
            <input type="text" id="first_name"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-orange-500 focus:ring-orange-500"
              placeholder="Name" required />
          </div>
          <div>
            <label for="first_name" class="mb-2 block text-sm font-medium text-gray-900">Email</label>
            <input type="text" id="first_name"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-orange-500 focus:ring-orange-500"
              placeholder="Email" required />
          </div>
        </div>
        <div class="mb-6">
          <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Pesan</label>
          <textarea id="message" rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
            placeholder="Write your thoughts here..."></textarea>
        </div>
        <button type="submit"
          class="w-full rounded-lg bg-orange-400 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-orange-500 focus:outline-none focus:ring-4 focus:ring-blue-300 sm:w-auto">Submit</button>
      </form>
    </div>


  </div>
@endsection
