 <div class="w-auto flex flex-none overflow-x-auto   pb-12">
    <div class="flex items-center justify-center h-screen px-20 ">
        @foreach ($topMovies as $movieItem)
        @php
            $original_date = $movieItem->release_date;
            $timestamp = strtotime($original_date);
            $movieYear = date("Y",$timestamp);
            $rating = number_format((double)($movieItem->vote_average * 1), 1);
            $movieImage="{$imageBaseUrl}/w500{$movieItem->poster_path}"

        @endphp

        <div class="grid rounded-3xl w-[300px]  shadow-sm bg-gradient-to-b from-indigo-800 to [#110426]  flex-row mr-8">
        <img src="{{$movieImage}}"
            width="352" height="300" class="rounded-t-3xl justify-center grid h-80 object-cover" alt="movie.title" />

        <div class="group p-4 grid z-10">
            <a href="/movie/{{$movieItem->id}}"
                class="text-white group-hover:text-violet-700 drop-shadow-lg font-bold sm:text-2xl line-clamp-2">
                {{$movieItem->title}}
            </a>
            <span class="text-violet-400 pt-2 pb-2 font-semibold">
                {{$movieYear}}
            </span>
            <div class="flex items-center">
                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 22 20">
                    <path
                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                </svg>
                <p class="ms-2 text-sm font-bold text-gray-900 dark:text-white">{{$rating}}</p>
                <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                <a href="#"
                    class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white">
                    {{$movieItem->vote_count}} reviews</a>
            </div>
            <div class="h-20">
                <span class=" text-white line-clamp-2 py-2 text-base font-light leading-relaxed">
                    {{$movieItem->overview}}

                </span>
            </div>
        </div>
    </div>
         @endforeach
</div>
</div>
