@extends('layouts.main')
@section('contain')
    @include('components.navbar')
    <div class="mt-2">
        <div class="relative w-full h-full flex">
            <div
                class="absolute w-[1000px] h-[480px] place-items-center justify-items-center mx-32 rounded-[40px] overflow-hidden">
                <img src="img/tensura.jpg" class="w-full h-full object-cover rounded-[40px]">
            </div>
        </div>
        <div
            class="flex flex-col w-fit h-26 mt-[420px] bottom-50 bg-indigo-950 bg-opacity-80 rounded-lg backdrop-blur-md drop-shadow-lg">
            <div class="max-w-fit h-fit mx-11 my-2">
                <a href="/"
                    class="font-regular font-['Montserrat'] text-xs text-violet-800 hover:underline underline-offset-1">CinemaTech</a>
                <span class="text-regular font-['Montserrat'] text-violet-800 opacity-70 text-xs">/</span>
                <a href=""
                    class="font-regular font-['Montserrat'] text-xs text-violet-800 hover:underline underline-offset-1">Movies</a>
                <h3 class="font-['Montserrat'] font-extrabold text-white text-3xl">Avenger: End Game</h3>
            </div>
        </div>
    </div>
    {{-- Desc fim --}}
    <div class="w-full h-fit my-16 mx-6 relative flex flex-col md:flex-row">
        <img src="https:/via.placeholder.com/420x420"
            class="flex-shrink-0 rounded-xl mx-10 md:mx-10 md:w-1/3 h-[600px] object-cover">
        <div class="max-w-[480px] flex flex-col px-12 ml-32">
            <div class="text-slate-100 text-2xl font-bold leading-8 tracking-tight self-stretch w-full mt-10">
                Part of the journey is the end.
            </div>
            <div class="text-gray-400 text-xl leading-8 self-stretch w-full mt-9">
                After the devastating events of Avengers: Infinity War, the universe is in
                ruins due to the efforts of the Mad Titan, Thanos. With the help of
                remaining allies, the Avengers must assemble once more in order to undo
                Thanos' actions and restore order to the universe once and for all, no
                matter what consequences may be in store.
            </div>
            <div
                class="items-center backdrop-blur-sm bg-black bg-opacity-70 flex w-[59px] max-w-full gap-1 mt-7 px-2 py-1 rounded-lg self-start">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/7a96908fc03116c7bb300aa42bc91a3a597a293ced113850bac3f0146407ec1d?"
                    class="aspect-square object-contain object-center w-full justify-center items-center overflow-hidden shrink-0 flex-1 my-auto" />
                <div class="text-orange-400 text-base leading-6 self-stretch grow whitespace-nowrap">
                    8.3
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
                                181 min
                            </div>
                            <div class="text-slate-500 text-base leading-6 whitespace-nowrap mt-4 self-start">
                                Genres
                            </div>
                            <div class="text-slate-300 text-xl leading-8 self-stretch whitespace-nowrap mt-2">
                                Adventure, Science Fiction, Action
                            </div>
                            <a href=""
                                class="text-white text-base leading-6 whitespace-nowrap justify-center items-stretch  bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500   mt-8 px-8 py-4 rounded-2xl  self-start">
                                Watch Now
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-col items-stretch w-full md:w-1/3 ml-auto md:ml-5">
                        <div class="items-stretch flex flex-col text-right">
                            <div class="text-slate-500 text-base leading-6 whitespace-nowrap">
                                Release Date:
                            </div>
                            <div class="text-slate-300 text-xl leading-8 whitespace-nowrap mt-2">
                                2019-04-24
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
