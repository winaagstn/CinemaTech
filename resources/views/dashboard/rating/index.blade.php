@extends('dashboard.layout.main')

@section('content')

<!-- Main Content -->
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
  <!-- Content Wrapper -->
  <div class="container mx-auto px-4 py-6">
    <!-- Main Content Area -->
    <h2 class="text-2xl font-semibold mb-4">Rating</h2>

  
    <!-- Data Table Section -->
    <div class="mt-8">
      <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="w-full table-auto">
          <thead>
            <tr class="bg-gray-100 dark:bg-gray-700">
              <th class="px-4 py-2 text-xl   text-gray-900 dark:text-white"style="width: 50px;">No</th>
              <th class="px-4 py-2 text-xl   text-gray-900 dark:text-white"style="width:100px;">Rating</th>
              <th class="px-4 py-2 text-xl   text-gray-900 dark:text-white" style="width: 90px;">Action</th>
              <!-- Add more table headers as needed -->
            </tr>
          </thead>
          <tbody>
            <!-- Sample table rows (replace with actual data) -->
            <tr>
                @foreach ($ratings as $rt)
              <td class="border px-4 py-2">{{ $loop->iteration }}</td>
              <td class="border px-4 py-2">{{ $rt->rating }}</td>
              <td class="border px-4 py-2" style="text-align: center;">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                    <span class="ml-2">Lihat</span>
                </button>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full ">
                    <span class="ml-2">Edit</span>
                </button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                    <span class="ml-2">Hapus</span>
                </button>
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
