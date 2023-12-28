

@extends('dashboard.layout.main')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-semibold mb-4">Tambah Genre Baru</h2>
        <form method="POST" action="{{ route('genre.store') }}">
            @csrf
            <div class="mb-3">
                <label for="GenreName" class="block text-sm font-semibold mb-1">Nama Genre</label>
                <input type="text" class="w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 @error('GenreName') border-red-500 @enderror" id="GenreName" 
                    name="GenreName" required value="{{ old('GenreName')}}">
                @error('GenreName')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
        </form>
    </div>
@endsection
