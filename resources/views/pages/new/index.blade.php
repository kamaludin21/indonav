@extends('layouts.app-v2')

@section('content')
  {{-- Section 1 --}}
  <div class="pb-20 px-2 md:px-44 pt-10">
    <div class="grid grid-cols-2 gap-8">
      <div class="w-full h-96 bg-slate-200 flex items-center justify-center">
        <p class="text-xl font-medium">Product 1</p>
      </div>
      <div class="w-full h-96 bg-slate-200 flex items-center justify-center">
        <p class="text-xl font-medium">Product 2</p>
      </div>
      <div class="w-full h-96 bg-slate-200 flex items-center justify-center">
        <p class="text-xl font-medium">Product 3</p>
      </div>
      <div class="w-full h-96 bg-slate-200 flex items-center justify-center">
        <p class="text-xl font-medium">Explore</p>
      </div>
    </div>
  </div>

  <hr>

  {{-- Section 2 --}}

  <div class="pb-20 grid gap-8 px-2 md:px-44 pt-10">
    <div class="flex w-full gap-4">
      <div class="w-1/4">
        <p class="text-5xl">Category 1</p>
      </div>
      <div class="flex-1 w-2/4 h-80 bg-slate-200 items-center justify-center flex">
        <p>Image 1</p>
      </div>
      <div class="w-1/4">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis ipsam, voluptate nihil illo aut accusantium
          assumenda. Dicta a nihil sunt earum architecto ex dolore nisi, amet dolores reprehenderit, molestias inventore.
        </p>
      </div>
    </div>
    <div class="flex w-full gap-4">
      <div class="w-1/4">
        <p class="text-5xl">Category 2</p>
      </div>
      <div class="flex-1 w-2/4 h-80 bg-slate-200 items-center justify-center flex">
        <p>Image 2</p>
      </div>
      <div class="w-1/4">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis ipsam, voluptate nihil illo aut accusantium
          assumenda. Dicta a nihil sunt earum architecto ex dolore nisi, amet dolores reprehenderit, molestias inventore.
        </p>
      </div>
    </div>
  </div>

  <hr>

  <div class="pb-20 grid gap-8 px-2 md:px-44 pt-10">
    <p class="text-2xl font-medium text-center">Why choose us</p>
    <div class="flex gap-6">
      <div class="w-1/3 items-center flex justify-center bg-slate-200 h-96">
        <p>Content 1</p>
      </div>
      <div class="w-1/3 items-center flex justify-center bg-slate-200 h-96">
        <p>Content 2</p>
      </div>
      <div class="w-1/3 items-center flex justify-center bg-slate-200 h-96">
        <p>Content 3</p>
      </div>
    </div>
  </div>


@endsection
