@extends('dashboard.layout.main')

@section('content')

<!-- Main Content -->
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
  <!-- Content Wrapper -->
  <div class="container mx-auto px-4 py-6">
    <!-- Main Content Area -->
    <h2 class="text-2xl font-semibold mb-4">TV Show</h2>

    <!-- Data Table Section -->
    <div class="mt-8">
        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
          <table class="w-full table-auto">
            <thead>
              <tr class="bg-gray-100 dark:bg-gray-700">
                <th class="px-4 py-2 text-xs text-gray-900 dark:text-white ">Poster Tv Show</th>
                <th class="px-4 py-2 text-xs text-gray-900 dark:text-white ">Judul Tv Show</th>
                <th class="px-4 py-2 text-xs text-gray-900 dark:text-white ">Tahun Rilis</th>
                <th class="px-4 py-2 text-xs text-gray-900 dark:text-white ">Overview</th>
                <th class="px-4 py-2 text-xs text-gray-900 dark:text-white ">Action</th>
                <!-- Add more table headers as needed -->
              </tr>
            </thead>
            <tbody>
              <!-- Sample table rows (replace with actual data) -->
              <tr>
                <td class="border px-4 py-2"><img src="/img/puss.jpg" alt="Deskripsi gambar" style="display: block; margin: auto;" width="100" height="100"></td>
                <td class="border px-4 py-2">John Doe</td>
                <td class="border px-4 py-2">john@example.com</td>
                <td class="border px-4 py-2">john@example.com</td>
                <td class="border px-4 py-2" style="text-align: center;">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">
                        <!-- Icon edit dari Flowbite -->
                        <i class="flowbite-icon-edit"></i>
                        <span class="ml-2">Edit</span>
                    </button>
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                        <!-- Icon hapus dari Flowbite -->
                        <i class="flowbite-icon-trash"></i>
                        <span class="ml-2">Hapus</span>
                    </button>
                </td>
                <!-- Add more table data rows as needed -->
              </tr>
              <tr>
                <td class="border px-4 py-2"><img src="/img/puss.jpg" alt="Deskripsi gambar" style="display: block; margin: auto;" width="100" height="100"></td>
                <td class="border px-4 py-2">John Doe</td>
                <td class="border px-4 py-2">john@example.com</td>
                <td class="border px-4 py-2">john@example.com</td>
                <td class="border px-4 py-2" style="text-align: center;">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">
                        <!-- Icon edit dari Flowbite -->
                        <i class="flowbite-icon-edit"></i>
                        <span class="ml-2">Edit</span>
                    </button>
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                        <!-- Icon hapus dari Flowbite -->
                        <i class="flowbite-icon-trash"></i>
                        <span class="ml-2">Hapus</span>
                    </button>
                </td>
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
