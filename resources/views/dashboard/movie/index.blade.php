@extends('dashboard.layout.main')

@section('content')

<!-- Main Content -->
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
  <!-- Content Wrapper -->
  <div class="container mx-auto px-4 py-6">
    <!-- Main Content Area -->
    <h2 class="text-2xl font-semibold mb-4">Movie</h2>

    <div class="text-right mb-4">
      <a href="{{ route('movie.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Tambah Data</a>
  </div>

  
    <!-- Data Table Section -->
    <div class="mt-8">
      <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="w-full table-auto">
          <thead>
            <tr class="bg-gray-100 dark:bg-gray-700">
              <th class="px-4 py-2 text-xl text-gray-900 dark:text-white ">Poster Movie</th>
              <th class="px-4 py-2 text-xl text-gray-900 dark:text-white ">Judul Movie</th>
              <th class="px-4 py-2 text-xl text-gray-900 dark:text-white ">Tahun Rilis</th>
              <th class="px-4 py-2 text-xl text-gray-900 dark:text-white ">Genre</th>
              <th class="px-4 py-2 text-xl text-gray-900 dark:text-white ">Overview</th>
              <th class="px-4 py-2 text-xl text-gray-900 dark:text-white ">Action</th>
              <!-- Add more table headers as needed -->
            </tr>
          </thead>
          <tbody>
            <!-- Sample table rows (replace with actual data) -->
            @foreach ($movie as $mv)
            <tr>
              <td class="border px-4 py-2" style="display: flex; justify-content: space-between;">
                @if($mv->poster_path)
                        <img src="https://image.tmdb.org/t/p/w500/{{ $mv->poster_path }}" alt="Deskripsi gambar" style="display: block; margin: auto;" width="100" height="100">
                @elseif ($mv->poster_path)
                        <img src="{{ ('/img/' . $mv->poster_path) }}" alt="Deskripsi gambar" style="display: block; margin: auto;" width="100" height="100">
                @endif
            </td>
              <td class="border px-4 py-2">{{ $mv->title }}</td>
              <td class="border px-4 py-2">{{ $mv->release_date }}</td>
              <td class="border px-4 py-2">{{ $mv->genre->name}}</td>
              <td class="border px-4 py-2">{{ $mv->overview }}</td>
              <td class="border px-4 py-2" style="text-align: center;">
                <div style="display: flex; justify-content: center; align-items: center;">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                    <span class="ml-2">Lihat</span>
                </button>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full ">
                    <span class="ml-2">Edit</span>
                </button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                    <span class="ml-2">Hapus</span>
                </button>
              </div>
            </td>
            </tr>
            @endforeach
            <!-- More rows -->
          </tbody>
        </table>
      </div>
    </div>


  </div>
</main>

@endsection
