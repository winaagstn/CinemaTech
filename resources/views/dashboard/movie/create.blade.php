
@extends('dashboard.layout.main')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-semibold mb-4">Tambah Movie Baru</h2>
        <form method="POST" action="{{ route('movie.store') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="block text-sm font-semibold mb-1">Judul Movie</label>
                <input type="text" class="w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 @error('title') border-red-500 @enderror" id="title" 
                    name="title" required value="{{ old('title')}}">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="release_date" class="block text-sm font-semibold mb-1">Tahun Rilis</label>
                <input type="date" class="w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 @error('release_date') border-red-500 @enderror" id="release_date" 
                    name="release_date" required value="{{ old('release_date')}}">
                @error('release_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="genre_id" class="block text-sm font-semibold mb-1">Genre</label>
                <select class="w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 @error('genre_id') border-red-500 @enderror" id="genre_id" name="genre_id" required>
                    <option value="" disabled selected>Pilih Genre</option>
                    @foreach ($genre as $mv)
                        <option value="{{ $mv->id }}" {{ old('id') == $mv->id ? 'selected' : '' }}>
                            {{ $mv->name }}
                        </option>
                    @endforeach
                </select>
                @error('genre_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="overview" class="block text-sm font-semibold mb-1">Overview</label>
                <input type="text" class="w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 @error('overview') border-red-500 @enderror" id="overview" 
                    name="overview" required value="{{ old('overview')}}" style="width: 100%;">
                @error('overview')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="block text-sm font-semibold mb-1">Poster Path </label>
                <div>
                    <img class="img-preview mb-3 w-40 h-auto" id="img-preview">
                </div>
                <input class="border rounded-md py-2 px-3 w-full @error('poster_path') border-red-500 @enderror" type="file" id="poster_path" name="poster_path" onchange="previewImage()">
                @error('psoter_path')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
        </form>
    </div>
@endsection
