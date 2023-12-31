@extends('dashboard.layout.main')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-semibold mb-4">Edit Genre</h2>
        <form method="POST" action="{{ route('genre.update', ['genre' => $genre->id]) }}">
            @method('PUT')
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-2 font-semibold">Jenis Genre</label>
                <input type="text" class="w-full border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500 @error('name') border-red-500 @enderror" id="name" name="name" required autofocus value="{{ old('name', $genre->name)}}">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
        </form>
    </div>

@endsection
