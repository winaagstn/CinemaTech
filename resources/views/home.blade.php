@extends('layouts.main')
@section('contain')
     {{-- Header --}}
        @include('components.navbar')

       {{-- caorusel --}}
        @include('components.carousel')
        {{-- Top 10 Movies Section --}}
        <div class="mt-12">
            <span class="ml-28  text-indigo-100 font-[Montserrat] font-semibold text-xl ">Top 10 Movies</span>
        </div>
        <div class="w-auto flex flex-row overflow-x-auto  pl-28 pt-6 pb-12">
        @include('components.moviecards')
        </div>


@endsection

