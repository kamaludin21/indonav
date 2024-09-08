@extends('layouts.app')

@section('content')
<div class="max-w-screen-lg space-y-10 py-20 mx-auto">
  <div class="text-start space-y-2">
    <h2 class="text-3xl font-bold text-orange-400">{{ $industry->title }}</h2>
    <p class="text-base text-slate-500">{{ $industry->description }}</p>
  </div>
  </div>
@endsection
