@extends('dashboard.layout.main')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-semibold mb-4">Tambah Rating Baru</h2>
        <form method="POST" action="{{ route('rating.store') }}">
            @csrf
            <div class="mb-3">
                <label for="rating" class="block text-sm font-semibold mb-1">Rating</label>
                <input type="text" class="w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 @error('rating') border-red-500 @enderror" id="rating" 
                    name="rating" required value="{{ old('rating')}}">
                @error('rating')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
        </form>
    </div>
@endsection
