
@extends('dashboard.layout.main')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-semibold mb-4">Tambah Movie Baru</h2>
        <form method="POST" action="{{ route('movie.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id">
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
            <div class="mb-3 col-6 mt-3">
                <label for="poster_path" class="form-label block text-sm font-semibold mb-1">Poster Movie</label>
                <input type="file" class="form-control" name="poster_path">
            </div>
                        
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
        </form>
        <script>
            function previewImage() {
                var preview = document.querySelector('#img-preview'); // Selects the <img> element with id "img-preview"
                var file = document.querySelector('input[type=file]').files[0]; // Gets the selected file
        
                var reader = new FileReader(); // Initialize FileReader object
        
                reader.onloadend = function () {
                    preview.src = reader.result; // Set src attribute of the image to the data URL from FileReader
                }
        
                if (file) {
                    reader.readAsDataURL(file); // Read the file as a data URL (base64 string)
                } else {
                    preview.src = ""; // If no file selected, show no image
                }
            }
        </script>
        
    </div>
@endsection
