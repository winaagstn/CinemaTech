@extends('layouts.main')
@section('contain')
    @include('components.navbar')

    <div
        class="self-center flex flex-col md:flex-row w-full max-w-[1200px] mt-6 px-5 items-start md:items-center max-md:max-w-full max-md:mt-10">
        <div class="md:w-2/3 pr-5">
            <div
                class="text-slate-100 text-6xl font-semibold leading-[80px] tracking-tighter ml-0 -mr-0.5 max-md:max-w-full max-md:text-4xl">
                Most Popular Movies
            </div>
            <div class="text-gray-400 text-base leading-6 w-full mt-4 max-md:max-w-full">
                This page contains all the movies that have been added to the Favorites tab by you.
            </div>
            <div
                class="flex items-center border border-[color:var(--Grey-700,#323B54)] bg-black bg-opacity-10 gap-4 mt-9 pl-4 pr-10 py-5 rounded-xl border-solid max-md:pr-5">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/4d395e56a6fdcbc2fbc71910ae25bf6a043efd97a4b5012eebbd8c8ee3923c19?"
                    class="aspect-square object-contain object-center w-6 justify-center items-center overflow-hidden shrink-0 max-w-full" />
                <div class="text-slate-600 text-sm leading-4 self-center grow whitespace-nowrap my-auto">
                    Search movies from your favorites
                </div>
            </div>
            <div
                class="text-slate-500 text-3xl font-semibold leading-6 tracking-tighter self-stretch mt-10 max-md:max-w-full">
                Movies
                <span class="text-base leading-6">(2048104)</span>
            </div>
        </div>
    </div>

    <div
        class="items-stretch backdrop-blur-2xl bg-slate-800 bg-opacity-80 flex max-w-[200px] flex-col mx-16 my-10 pt-2 pb-6 px-2 rounded-xl">
        <div
            class="flex-col overflow-hidden relative flex aspect-[0.665] w-full justify-between gap-5 pt-2.5 pb-12 px-2.5 items-start">
            <img loading="lazy" srcset="..." class="absolute h-full w-full object-cover object-center inset-0" />
            <div class="relative items-center backdrop-blur-sm bg-black bg-opacity-70 flex gap-1 mr-auto p-2 rounded-lg">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/7a96908fc03116c7bb300aa42bc91a3a597a293ced113850bac3f0146407ec1d?"
                    class="aspect-square object-contain object-center w-4 overflow-hidden shrink-0 max-w-full my-auto" />
                <div class="text-orange-400 text-base leading-6 self-stretch grow whitespace-nowrap">
                    6.8
                </div>
            </div>
        </div>
        <div class="text-slate-100 text-base font-semibold leading-6 tracking-wide mt-6">
            Black Widow
        </div>
    </div>
@endsection
