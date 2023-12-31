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
      <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">SELAMAT DATANG ADMIN</h5>
    </div>

    <!-- Three Small Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
      <!-- Card 1 -->
      <div class="bg-white border border-gray-200 rounded-lg p-3 mt-5 shadow-sm">
        <h3 class="text-lg font-semibold text-gray-800">Total Data Movie</h3>
        <p class="text-2xl font-bold text-indigo-600">100</p>
      </div>

      <!-- Card 2 -->
      <div class="bg-white border border-gray-200 rounded-lg p-3 mt-5 shadow-sm">
        <h3 class="text-lg font-semibold text-gray-800">Total Data Movie</h3>
        <p class="text-2xl font-bold text-indigo-600">150</p>
      </div>

      <!-- Card 3 -->
      <div class="bg-white border border-gray-200 rounded-lg p-3 mt-5 shadow-sm">
        <h3 class="text-lg font-semibold text-gray-800">Total Data Movie</h3>
        <p class="text-2xl font-bold text-indigo-600">200</p>
      </div>
    </div>

  </div>
</main>

@endsection
