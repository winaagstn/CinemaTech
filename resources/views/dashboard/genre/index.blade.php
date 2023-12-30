@extends('dashboard.layout.main')

@section('content')

<!-- Main Content -->
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
  <!-- Content Wrapper -->
  <div class="container mx-auto px-4 py-6">
    <!-- Main Content Area -->
    <h2 class="text-2xl font-semibold mb-4">Genre</h2>

    <div class="text-right mb-4">
        <a href="{{ route('genre.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Tambah Data</a>
    </div>
      
    <!-- Data Table Section -->
    <div class="mt-8">
      <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="w-full table-auto">
          <thead>
            <tr class="bg-gray-100 dark:bg-gray-700">
              <th class="px-4 py-2 text-xl   text-gray-900 dark:text-white"style="width: 50px;">No</th>
              <th class="px-4 py-2 text-xl   text-gray-900 dark:text-white"style="width:100px;">Genre</th>
              <th class="px-4 py-2 text-xl   text-gray-900 dark:text-white" style="width: 90px;">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($genre as $gr)
            <tr>
              <td class="border px-4 py-2">{{ $loop->iteration }}</td>
              <td class="border px-4 py-2">{{ $gr->name }}</td>
              <td class="border px-2 py-2" style="text-align: center;">
                <div style="display: flex; justify-content: center; align-items: center;">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                    {{-- <a href="{{ route('genre.show', ['id' => $gr->id]) }}"  --}}
                        {{-- class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full"> --}}
                         <span class="ml-2">Lihat</span>
                     {{-- </a> --}}
                </button>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full ">
                    <a href="{{ route('genre.edit', $gr->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        <span class="ml-2">Edit</span>
                    </a>
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
