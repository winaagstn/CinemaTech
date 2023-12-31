
@extends('dashboard.layout.main')

@section('content')

<!-- Main Content -->
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
  <!-- Content Wrapper -->
  <div class="container mx-auto px-4 py-6">
    <!-- Main Content Area -->
    <h2 class="text-2xl font-semibold mb-4">Daftar Movie</h2>

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
              <!-- Add more table headers as needed -->
            </tr>
          </thead>
          <tbody>
            <!-- Sample table rows (replace with actual data) -->
            @foreach ($movie as $mv)
            <tr>
              <td class="border px-4 py-2" style="display: flex; justify-content: space-between;">
                  <img src="{{ asset('/img/' . $mv->poster_path) }}" alt="Deskripsi gambar" style="display: block; margin: auto;" width="100" height="100">
              </td>
              <td class="border px-4 py-2">{{ $mv->title }}</td>
              <td class="border px-4 py-2">{{ $mv->release_date }}</td>
              <td class="border px-4 py-2">{{ $mv->genre->name}}</td>
              <td class="border px-4 py-2">{{ $mv->overview }}</td>
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
