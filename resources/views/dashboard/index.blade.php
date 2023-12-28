@extends('dashboard.layout.main')

@section('content')

<!-- Main Content -->
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
  <!-- Content Wrapper -->
  <div class="container mx-auto px-4 py-6">
    <!-- Main Content Area -->
    <h2 class="text-2xl font-semibold mb-4">Dashboard</h2>

    <!-- Work Fast Section -->
    <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
      <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Work fast from anywhere</h5>
      <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Stay up to date and move work forward with Flowbite on iOS & Android. Download the app today.</p>
    </div>

    <!-- Data Table Section -->
    <div class="mt-8">
      <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="w-full table-auto">
          <thead>
            <tr class="bg-gray-100 dark:bg-gray-700">
              <th class="px-4 py-2 text-xs text-gray-900 dark:text-white ">Poster Movie</th>
              <th class="px-4 py-2 text-xs text-gray-900 dark:text-white ">Judul Movie</th>
              <th class="px-4 py-2 text-xs text-gray-900 dark:text-white ">Tahun Rilis</th>
              <th class="px-4 py-2 text-xs text-gray-900 dark:text-white ">Overview</th>
              <!-- Add more table headers as needed -->
            </tr>
          </thead>
          <tbody>
            <!-- Sample table rows (replace with actual data) -->
            <tr>
              <td class="border px-4 py-2"><img src="/img/tensura.jpg" alt="Deskripsi gambar" style="display: block; margin: auto;" width="100" height="100"></td>
              <td class="border px-4 py-2">John Doe</td>
              <td class="border px-4 py-2">john@example.com</td>
              <td class="border px-4 py-2">john@example.com</td>
              <!-- Add more table data rows as needed -->
            </tr>
            <!-- More rows -->
          </tbody>
        </table>
      </div>
    </div>

  </div>
</main>

@endsection
