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
@endsection
