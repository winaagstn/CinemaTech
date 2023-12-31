@extends('layouts.main')
@section('contain')
    @include('components.navbar')
    <div class="mt-2">
        <div class="relative w-full h-full flex">
            @php
                $backdropPath = $tvData ? "{$imageBaseURL}/original{$tvData->backdrop_path}" : '';
                $posterPath = $tvData ? "{$imageBaseURL}/original{$tvData->poster_path}" : '';
                $title = '';
                $tagline = '';
                $year = '';
                $duration = '';
                $rating = 0;

                if ($tvData) {
                    $original_date = $tvData->first_air_date;
                    $timestamp = strtotime($original_date);
                    $year = date('Y', $timestamp);
                    $rating = number_format((float) ($tvData->vote_average * 1), 1);
                    $title = $tvData->name;

                  if ($tvData->episode_run_time) {
        $runtime = $tvData->episode_run_time[0];
        $duration = "{$runtime}m / episode";
    }

                    if ($tvData->tagline) {
                        $tagline = $tvData->tagline;
                    } else {
                        $tagline = $tvData->overview;
                    }
                    $trailerID = '';
                    if (isset($tvData->videos->results)) {
                        foreach ($tvData->videos->results as $item) {
                            if (strtolower($item->type) == 'trailer') {
                                $trailerID = $item->key;
                                break;
                            }
                        }
                    }
                }
            @endphp
            <div
                class="absolute w-[1000px] h-[480px] place-items-center justify-items-center mx-32 rounded-[40px] overflow-hidden">
                <img src="{{ $backdropPath }}" class="w-full h-full object-cover rounded-[40px]">
            </div>
        </div>
        <div
            class="flex flex-col w-fit h-26 mt-[420px] bottom-50 bg-indigo-950 bg-opacity-80 rounded-lg backdrop-blur-md drop-shadow-lg">
            <div class="max-w-fit h-fit mx-11 my-2">
                <a href="/"
                    class="font-regular font-Montserrat text-xs text-violet-800 hover:underline underline-offset-1">CinemaTech</a>
                <span class="text-regular font-Montserrat text-violet-800 opacity-70 text-xs">/</span>
                <a href="#"
                    class="font-regular font-Montserrat text-xs text-violet-800 hover:underline underline-offset-1">Movies</a>
                <h3 class="font-Montserrat font-extrabold text-white text-3xl">{{ $title }}</h3>
            </div>
        </div>
    </div>

    {{-- Desc fim --}}

    <div class="w-full h-fit my-16 mx-6 relative flex flex-col md:flex-row">
        <img src="{{ $posterPath }}" class="flex-shrink-0 rounded-xl mx-10 md:mx-10 md:w-1/3 h-[600px] object-cover">
        <div class="max-w-[480px] flex flex-col px-12 ml-32">
            <div class="text-slate-100 text-2xl font-bold leading-8 tracking-tight self-stretch w-full mt-10">
                {{ $tagline }}
            </div>
            <div class="text-gray-400 text-xl leading-8 self-stretch w-full mt-9">
                {{ $tvData->overview }}
            </div>
            <div
                class="items-center backdrop-blur-sm bg-black bg-opacity-70 flex w-[59px] max-w-full gap-1 mt-7 px-2 py-1 rounded-lg self-start">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/7a96908fc03116c7bb300aa42bc91a3a597a293ced113850bac3f0146407ec1d?"
                    class="aspect-square object-contain object-center w-full justify-center items-center overflow-hidden shrink-0 flex-1 my-auto" />
                <div class="text-orange-400 text-base leading-6 self-stretch grow whitespace-nowrap">
                    {{ $rating }}
                </div>
            </div>
            <div class="self-stretch w-full mt-6">
                <div class="gap-5 flex flex-col md:flex-row">
                    <div class="flex flex-col items-stretch w-full md:w-2/3 md:ml-auto">
                        <div class="flex grow flex-col text-right">
                            <div class="text-slate-500 text-base leading-6 whitespace-nowrap self-start">
                                Type
                            </div>
                            <div class="text-slate-300 text-xl leading-8 whitespace-nowrap mt-2 self-start">
                                Movie
                            </div>
                            <div class="text-slate-500 text-base leading-6 whitespace-nowrap mt-6 self-start">
                                Run time
                            </div>
                            <div class="text-slate-300 text-xl leading-8 whitespace-nowrap mt-2 self-start">
                                {{ $duration }}
                            </div>
                            <div class="text-slate-500 text-base leading-6 whitespace-nowrap mt-4 self-start">
                                Genres
                            </div>
                            <div class="text-slate-300 text-xl leading-8 self-stretch whitespace-nowrap mt-2">

                            </div>
                            @if ($trailerID)
                                <button id="watchNowBtn"
                                    class="text-white text-base leading-6 whitespace-nowrap justify-center items-stretch bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 mt-8 px-8 py-4 rounded-2xl self-start">
                                    Watch Now
                                </button>
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-col items-stretch w-full md:w-1/3 ml-auto md:ml-5">
                        <div class="items-stretch flex flex-col text-right">
                            <div class="text-slate-500 text-base leading-6 whitespace-nowrap">
                                Release Date:
                            </div>
                            <div class="text-slate-300 text-xl leading-8 whitespace-nowrap mt-2">
                                {{ $year }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- Trailer movie --}}
    <div id="trailerWrapper"
        class="fixed z-50 top-0 left-0 w-full h-full bg-black bg-opacity-90 flex flex-col items-center justify-center">
        <button class='ml-auto group mb-4' onclick='showTrailer(false)'>
            <svg xmlns='http://www.w3.org/2000/svg' height='48' width='48'>
                <path
                    d='m12.45 37.65-2.1-2.1L21.9 24 10.35 12.45l2.1-2.1L24 21.9l11.55-11.55 2.1 2.1L26.1 24l11.55 11.55-2.1 2.1L24 26.1Z'
                    class='fill-white group-hover:fill-develobe-500 duration-200' />
            </svg>
        </button>
        <iframe id='youtubeVideo' class='w-full h-full'
            src='https://www.youtube.com/embed/{{ $trailerID }}?enablejsapi=1' title='{{ $tvData->name }}'
            frameborder='0'
            allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share'
            allowfullscreen></iframe>

    </div>

    <script src='https://code.jquery.com/jquery-3.6.3.min.js'
        integrity='sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=' crossorigin='anonymous'></script>
    <script>
        // Hide trailer
        $('#trailerWrapper').hide();

        // Get show/hide trailer
        function showTrailer(isVisible) {
            if (isVisible) {
                // Show trailer
                $('#trailerWrapper').show();
            } else {
                // Stop YouTube video
                $('#youtubeVideo')[0].contentWindow.postMessage('{"event":"command","func":"stopVideo","args":""}', '*');

                // Hide trailer
                $('#trailerWrapper').hide();
            }
        }

        // Hide trailer function
        function hideTrailer() {
            // Hide trailer
            showTrailer(false);
        }

        // Watch Now button click event
        $('#watchNowBtn').click(function() {
            // Redirect to trailer
            showTrailer(true);
        });
    </script>
@include('components.footer')
@endsection
