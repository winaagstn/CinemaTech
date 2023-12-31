@extends('layouts.main')

@section('contain')
    @include('components.navbar')

      @php
        $colIndex = 1; // Menetapkan nilai awal
    @endphp

    <div class="grid grid-cols-3 gap-4 mt-4">
        @foreach ($searchResults as $result)
            @php
                $original_date = $result->release_date;
                $timestamp = strtotime($original_date);

                $movieYear = date('Y', $timestamp);
                $movieID = $result->id;
                $movieTitle = $result->title;
                $movieRating = $result->vote_average * 1;
                $movieImage = "{$imageBaseURL}/w500{$result->poster_path}";
            @endphp
            <!-- Tampilkan card hasil pencarian di sini -->
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
@endsection
