@extends('dashboard.layout.main')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-semibold mb-4">Edit Movie</h2>
        <form method="POST" action="{{ route('movie.update', ['movie' => $movie->id]) }}">
            @method('PUT')
            @csrf
            <div class="mb-4">
                <label for="title" class="block mb-2 font-semibold">Judul Movie</label>
                <input type="text" class="w-full border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500 @error('title') border-red-500 @enderror" id="title" name="title" required autofocus value="{{ old('title', $movie->title) }}">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="release_date" class="block mb-2 font-semibold">Tahun Rilis</label>
                <input type="date" class="w-full border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500 @error('release_date') border-red-500 @enderror" id="release_date" name="release_date" required value="{{ old('release_date', $movie->release_date) }}">
                @error('release_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="poster_path" class="block mb-2 font-semibold">Poster Path</label>
                <input type="text" class="w-full border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500 @error('poster_path') border-red-500 @enderror" id="poster_path" name="poster_path" value="{{ old('poster_path', $movie->poster_path) }}">
                @error('poster_path')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="overview" class="block mb-2 font-semibold">Overview</label>
                <textarea class="w-full border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500 @error('overview') border-red-500 @enderror" id="overview" name="overview" required>{{ old('overview', $movie->overview) }}</textarea>
                @error('overview')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="genre_id" class="block mb-2 font-semibold">Genre</label>
                <select name="genre_id" id="genre_id" class="w-full border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500 @error('genre_id') border-red-500 @enderror" required>
                    @foreach ($genre as $mv)
                        <option value="{{ $mv->id }}" {{ old('id') == $mv->id ? 'selected' : '' }}>
                            {{ $mv->name }}
                        </option>
                    @endforeach
                </select>
                @error('genre_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit movie</button>
        </form>
    </div>
@endsection