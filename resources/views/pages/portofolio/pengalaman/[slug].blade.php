@php
  $sites = App\Models\Site::get()->keyBy('slug');
  $article = App\Models\Article::where('slug', $slug)->firstOrFail();
  $articles = App\Models\Article::where('id', '!=', $article->id)
      ->where('article_category_id', $article->article_category_id)
      ->orderBy('created_at', 'desc')
      ->limit(4)
      ->get();
@endphp

@extends('layouts.app-v3', ['activePage' => 'portofolio'])

@push('header')
  <title>{{ $article->title }} | INDONAV</title>
  <meta name="description" content="{{ Str::limit(strip_tags($article->content), 150) }}">

  <meta property="og:title" content="{{ $article->title }}">
  <meta property="og:description" content="{{ Str::limit(strip_tags($article->content), 150) }}">
  <meta property="og:url" content="https://indonavtech.co.id/portofolio/pengalaman/{{ $article->slug }}">
  <meta property="og:type" content="website">
  <meta property="og:image" content="{{ asset('storage/' . $article->image) }}">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:site_name" content="Indonav">

@section('content')
  <div class="bg-white min-h-screen font-sans">
    <header class="bg-slate-800 pt-24 pb-16 px-4 lg:px-0">
      <div class="max-w-4xl mx-auto space-y-6">
        <nav class="flextext-sm">
          <a href="/portofolio/pengalaman" class="text-orange-600 hover:text-orange-500 flex items-center gap-2">
            &larr; Kembali ke List Artikel
          </a>
        </nav>
        <div class="flex items-center gap-3">
          <span
            class="bg-orange-600 text-white text-xs font-bold px-3 py-1 rounded uppercase">{{ $article->category->name }}</span>
          <span class="text-gray-400 text-sm">{{ $article->created_at->format('d F Y') }}</span>
        </div>
        <h1 class="text-white text-3xl md:text-5xl font-bold leading-tight">
          {{ $article->title }}
        </h1>
        <x-partials.share :slug="$article->slug" :title="$article->title" />
      </div>
    </header>

    <main class="max-w-4xl mx-auto py-12 px-4 lg:px-0">
      <div class="relative h-72 lg:h-96 object-contain -mt-24 mb-12 rounded-xl overflow-hidden shadow-2xl border-4 border-white">
        <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
      </div>
      <article
        class="prose prose-lg max-w-none text-slate-800 leading-relaxed border-b border-slate-400 border-dashed pb-10 html-content">
        {!! $article->content !!}
      </article>
      <section class="mt-10">
        <h3 class="text-2xl font-bold text-slate-800 mb-8">Artikel Lainnya</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          @foreach ($articles as $article)
            <a href="/portofolio/pengalaman/{{ $article->slug }}" class="group flex gap-4">
              <div class="w-24 h-24 flex-shrink-0 bg-gray-200 rounded-lg overflow-hidden">
                <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}"
                  class="w-full h-full object-cover group-hover:scale-110 transition-transform">
              </div>
              <div>
                <h4 class="font-bold text-slate-900 group-hover:text-orange-600 transition-colors line-clamp-2">
                  {{ $article->title }}</h4>
                <p class="text-sm text-gray-500 mt-1">{{ $article->created_at->translatedFormat('d F Y') }}</p>
              </div>
            </a>
          @endforeach
        </div>
      </section>
    </main>

    <x-commons.line>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"
        class="h-7 w-auto text-orange-600">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M10 10h4v4h-4l0 -4" />
        <path d="M10 10l-3.5 -3.5" />
        <path d="M9.96 6a3.5 3.5 0 1 0 -3.96 3.96" />
        <path d="M14 10l3.5 -3.5" />
        <path d="M18 9.96a3.5 3.5 0 1 0 -3.96 -3.96" />
        <path d="M14 14l3.5 3.5" />
        <path d="M14.04 18a3.5 3.5 0 1 0 3.96 -3.96" />
        <path d="M10 14l-3.5 3.5" />
        <path d="M6 14.04a3.5 3.5 0 1 0 3.96 3.96" />
      </svg>
    </x-commons.line>
    <x-commons.cta :wa="$sites['wa-link']" />
  </div>
@endsection
