@extends('layouts.main')
@section('contain')
     {{-- Header --}}
        @include('components.navbar')

       {{-- caorusel --}}
        @include('components.carousel')
        {{-- Top 10 Movies Section --}}

        <div class="mt-16">
            <span class="ml-20 text-indigo-100 font-[Montserrat] font-semibold text-xl ">Top 10 Movies</span>
            @include('components.moviecards')

            <div class="mt-16">
            <span class="ml-20 text-indigo-100 font-[Montserrat] font-semibold text-xl ">Top 10 Tv Shows </span>
            @include('components.tvshowcards')
        </div>



    @include('components.footer')
@endsection

