@extends('dashboard.layout.main')

@section('content')
<div class="flex justify-between flex-wrap items-center pt-3 pb-2 mb-3 border-b">
    <h1 class="text-2xl ml-6 pr-4">Detail Movie</h1>
</div>
<div class="max-w-3xl bg-white rounded-lg shadow-lg p-6 ml-6">
    <div class="mb-4">
        @if($movie->poster_path)
            @if($movie->poster_path != null)
            <img src="{{ $movie->poster_path ? (Str::startsWith($movie->poster_path, 'https') ? $movie->poster_path : asset('/img/' . $movie->poster_path)) : '' }}" alt="Deskripsi gambar" style="display: block; margin: auto;" width="100" height="100">
            @endif
        @endif
    </div>
</div>

<div class="max-w-3xl bg-white rounded-lg shadow-lg p-6 ml-6">
    <div class="mb-4">
        <p class="text-xl font-semibold mb-2">Judul Movie :</p>
        <p class="text-lg">{{ $movie->title }}</p>
    </div>
</div>

<div class="max-w-3xl bg-white rounded-lg shadow-lg p-6 ml-6">
    <div class="mb-4">
        <p class="text-xl font-semibold mb-2">Tahun Rilis :</p>
        <p class="text-lg">{{ $movie->release_date }}</p>
    </div>
</div>

<div class="max-w-3xl bg-white rounded-lg shadow-lg p-6 ml-6">
    <div class="mb-4">
        <p class="text-xl font-semibold mb-2">Genre :</p>
        <p class="text-lg">{{ $movie->genre->name }}</p>
    </div>
</div>

<div class="max-w-3xl max-h-96 bg-white rounded-lg shadow-lg p-4 ml-6 ">
    <div class="ml-2">
        <p class="text-xl font-semibold mb-2">Overview :</p>
        <p class="text-lg">{{ $movie->overview }}</p>
    </div>
</div>

@endsection
