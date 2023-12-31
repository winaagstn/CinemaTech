@extends('dashboard.layout.main')

@section('content')
<div class="flex justify-between flex-wrap items-center pt-3 pb-2 mb-3 border-b">
    <h1 class="text-2xl ml-6 pr-4">Detail Genre</h1>
</div>

<div class="max-w-3xl bg-white rounded-lg shadow-lg p-6 ml-6">
    <div class="mb-4">
        <p class="text-xl font-semibold mb-2">Jenis Genre :</p>
        <p class="text-lg">{{ $genre->name }}</p>
    </div>
</div>
<div class="max-w-3xl px-7 py-3">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        <a href="/dashboard/genre" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-full">
            <span>Kembali ke Genre</span>
         </a>
    </button>
</div>

@endsection
