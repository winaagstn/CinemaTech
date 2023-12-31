@extends('layouts.main')
@section('contain')
    @include('components.navbar')

    <div
        class="self-center flex flex-col md:flex-row w-full max-w-[1200px] mt-6 px-5 items-start md:items-center max-md:max-w-full max-md:mt-10">
        <div class="md:w-2/3 pr-5">
            <div
                class="text-slate-100 text-6xl font-[Montserrat] font-extrabold leading-[80px] tracking-tighter ml-0 -mr-0.5 max-md:max-w-full max-md:text-4xl">
                Tv Shows List
            </div>
            <div class="text-gray-400 text-base leading-6 w-full mt-4 max-md:max-w-full">

                This tv show captivates audiences with stunning visuals and a profound narrative, inviting viewers to explore
                a fantastical world while contemplating the meaning of life. Enhanced by brilliant performances from the
                cast, the film delivers an unforgettable cinematic experience.

            </div>
            <div class='relative ml-4'>
                <select
                    class='block appearance-none bg-gray-900 drop-shadow-[0_0px_4px_rgba(0,0,0,0.25)] text-white font-inter py-3 pl-5 pr-8 my-7  rounded-lg leading-tight focus:outline-none focus:bg-gray-900'
                    onchange='changeSort(this)'>
                    <option value='popularity.desc'>Popularity (Descending)</option>
                    <option value='popularity.asc'>Popularity (Ascending)</option>
                    <option value='vote_average.desc'>Top Rated (Descending)</option>
                    <option value='vote_average.asc'>Top Rated (Ascending)</option>
                </select>
            </div>

            <script>
                // ... (Bagian JavaScript yang lain) ...

                // Sort data
                function changeSort(component) {
                    if (component.value) {
                        sortBy = component.value;
                        $('#dataWrapper').html(''); // Clear data
                        page = 0;
                        loadData(); // Ganti dengan fungsi yang benar untuk memuat dan menampilkan data
                    }
                }

                // Load and display data
                function loadData() {
                    // Implement logic to fetch and display data based on sortBy, page, etc.
                    // Use AJAX, axios, fetch, or any other method to retrieve data from the server.
                    // Update the URL accordingly.
                    $.ajax({
                        url: `URL_TO_YOUR_API?sortBy=${sortBy}&page=${page}`,
                        type: 'GET',
                        success: function(response) {
                            var htmlData = [];
                            if (response && response.results) {
                                response.results.forEach(item => {
                                    let original_date = item.release_date;
                                    let date = new Date(original_date);
                                    let movieYear = date.getFullYear();
                                    let movieID = item.id;
                                    let movieTitle = item.title;
                                    let movieImage = `${imageBaseURL}/w500${item.poster_path}`;
                                    let movieRating = item.vote_average * 1;

                                    htmlData.push(`
                            <a href='/movie/${movieID}' class='group'>
                                <div class='min-w-[232px] min-h-[428px] bg-gray-900 drop-shadow-[0_0px_8px_rgba(0,0,0,0.25)] group-hover:drop-shadow-[0_0px_8px_rgba(0,0,0,0.5)] rounded-[32px] p-5 flex flex-col duration-100'
                                    style='grid-column: 1; grid-row: auto;'>
                                    <div class='overflow-hidden rounded-[10px]'>
                                        <img class='w-full h-[300px] rounded-[10px] group-hover:scale-125 duration-200'
                                            src='${movieImage}' />
                                    </div>
                                    <div class="items-end backdrop-blur-sm relative flex gap-1 p-2 -my-6 rounded-lg">
                                        <img loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/7a96908fc03116c7bb300aa42bc91a3a597a293ced113850bac3f0146407ec1d?"
                                            class="aspect-square object-contain object-center w-4 overflow-hidden shrink-0 max-w-full my-auto" />
                                        <div class="text-orange-400 text-base leading-6 self-stretch grow whitespace-nowrap">
                                            ${movieRating}
                                        </div>
                                    </div>
                                    <span class='font-inter font-bold text-xl mt-6 text-white line-clamp-1 group-hover:line-clamp-none'>${movieTitle}</span>
                                    <span class='font-inter text-sm mt-1 text-white'>${movieYear}</span>
                                </div>
                            </a>
                        `);
                                });
                            }
                            // Show HTML
                            $('#dataWrapper').append(htmlData.join(''));
                        },
                        error: function(error) {
                            console.error('Error fetching data:', error);
                        }
                    });
                }

                // ... (Bagian JavaScript yang lain) ...
            </script>
            <div
                class="text-slate-500 text-3xl font-semibold leading-6 tracking-tighter self-stretch mt-10 max-md:max-w-full">
                Movies

            </div>
        </div>
    </div>
    <div class='w-auto pl-18  pt-6 pb-10 grid grid-cols-3 lg:grid-cols-5 gap-8 ' id='dataWrapper'>

        @php
            $colIndex = 1; // Menyimpan indeks kolom untuk setiap item
        @endphp

        @foreach ($tvShow as $movieItem)
            @php
                $original_date = $movieItem->first_air_date;
                $timestamp = strtotime($original_date);

                $movieYear = date('Y', $timestamp);
                $movieID = $movieItem->id;
                $movieTitle = $movieItem->name;
                $movieRating = $movieItem->vote_average * 1;
                $movieImage = "{$imageBaseURL}/w500{$movieItem->poster_path}";
            @endphp

            <a href='/movie/{{ $movieID }}' class='group'>
                <div class='min-w-[232px] min-h-[428px] bg-gray-900 drop-shadow-[0_0px_8px_rgba(0,0,0,0.25)] group-hover:drop-shadow-[0_0px_8px_rgba(0,0,0,0.5)] rounded-[32px] p-5 flex flex-col duration-100'
                    style='grid-column: {{ $colIndex }}; grid-row: auto;'>
                    <div class='overflow-hidden rounded-[10px]'>
                        <img class='w-full h-[300px] rounded-[10px] group-hover:scale-125 duration-200'
                            src='{{ $movieImage }}' />
                    </div>
                    <div class="items-end backdrop-blur-sm relative flex gap-1 p-2 -my-6 rounded-lg">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/7a96908fc03116c7bb300aa42bc91a3a597a293ced113850bac3f0146407ec1d?"
                            class="aspect-square object-contain object-center w-4 overflow-hidden shrink-0 max-w-full my-auto" />
                        <div class="text-orange-400 text-base leading-6 self-stretch grow whitespace-nowrap">
                            {{ $movieRating }}
                        </div>
                    </div>
                    <span
                        class='font-inter font-bold text-xl mt-6 text-white line-clamp-1 group-hover:line-clamp-none'>{{ $movieTitle }}</span>
                    <span class='font-inter text-sm mt-1 text-white'>{{ $movieYear }}</span>
                </div>
            </a>

            @php
                $colIndex++; // Tambahkan indeks kolom untuk item berikutnya
                // Setel indeks kolom kembali ke 1 jika sudah mencapai jumlah maksimum kolom
                if ($colIndex > 5) {
                    $colIndex = 1;
                }
            @endphp
        @endforeach
    </div>

    <div class="flex justify-center mt-8 mb-10">
        @if ($page > 1)
            <!-- Previous Button -->
            <a href="{{ route('tvshow', ['page' => $page - 1]) }}"
                class="flex items-center justify-center px-3 h-8 me-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 5H1m0 0 4 4M1 5l4-4" />
                </svg>
                Previous
            </a>
        @endif

        <!-- Next Button -->
        <a href=" {{ route('tvshow', ['page' => $page + 1]) }}"
            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            Next
            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>

    @include('components.footer')
@endsection
