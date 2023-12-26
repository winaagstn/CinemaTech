

<div id="default-carousel" class=" w-full relative " data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="sticky h-96  pb-26 overflow-hidden rounded-lg md:h-96 bg-slate-200">
    @foreach ($banner as $bannerItem )
             @php
                $bannerImage = "{$imageBaseUrl}/original{$bannerItem->backdrop_path}";
             @endphp
        <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active" >
              <img src="{{$bannerImage}}" class="absolute  w-full h-full  translate-x-1/2 -translate-y-1/2  top-1/2 -left-1/2 " />
             <div class="absolute  w-full flex flex-col mt-10 ml-28 translate-x-1/2 -translate-y-1/2  top-1/2 -left-1/2  ">
                <span class ="font-semibold font-[Montserrat] text text-xl text-white"> {{ $bannerItem->title }}</span>
                <span class="font-light font-inter text-sm text-white w-1/2 line-clamp-3">{{$bannerItem->overview}} </span>
                <a href="/movie/{{$bannerItem->id}}" class="w-fit bg-gradient-to-r from-green-400 to-blue-500 text-white  pl-4 pr-6 py-3 mt-6  font-inter text-sm flex flex-row rounded-full items-center hover:from-pink-500 hover:to-yellow-500 drop-shadow-lg duration-200">
                    <svg width="30" height="15" viewBox="0 0 11 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0.982556V15.0146C0.00304683 15.1892 0.0517801 15.36 0.141349 15.5099C0.230918 15.6599 0.3582 15.7837 0.510522 15.8692C0.662844 15.9547 0.834895 15.9988 1.00955 15.9971C1.1842 15.9954 1.35536 15.948 1.506 15.8596L13.512 8.84356C13.6605 8.75807 13.7839 8.63495 13.8696 8.4866C13.9554 8.33825 14.0006 8.16992 14.0006 7.99856C14.0006 7.8272 13.9554 7.65886 13.8696 7.51051C13.7839 7.36217 13.6605 7.23905 13.512 7.15356L1.506 0.137556C1.35536 0.0491507 1.1842 0.00174128 1.00955 4.70583e-05C0.834895 -0.00164717 0.662844 0.0424332 0.510522 0.127899C0.3582 0.213366 0.230918 0.337237 0.141349 0.487184C0.0517801 0.63713 0.00304683 0.807922 0 0.982556Z" fill="white"/>
                    </svg>
                 <span class=""> Tonton Sekarang</span>
            </a>
            </div>
        </div>

   @endforeach
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>

    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-10 start-0 z-30 flex  items-center justify-center h-full px-4 cursor-pointer " data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10  rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M13.9897 17C13.7251 16.9999 13.4713 16.8947 13.2842 16.7074L9.2922 12.7123C9.1051 12.525 9 12.271 9 12.0061C9 11.7413 9.1051 11.4873 9.2922 11.3L13.2842 7.30491C13.3762 7.20952 13.4863 7.13343 13.6081 7.08109C13.7299 7.02874 13.8608 7.00119 13.9933 7.00004C14.1258 6.99889 14.2573 7.02416 14.3799 7.07437C14.5026 7.12459 14.614 7.19876 14.7077 7.29253C14.8014 7.38631 14.8755 7.49783 14.9257 7.62057C14.9759 7.74332 15.0011 7.87484 15 8.00745C14.9988 8.14007 14.9713 8.27113 14.919 8.39298C14.8667 8.51484 14.7906 8.62504 14.6953 8.71718L11.4089 12.0061L14.6953 15.2951C14.8349 15.4348 14.9299 15.6127 14.9684 15.8064C15.0068 16.0001 14.9871 16.2009 14.9116 16.3834C14.8361 16.5659 14.7082 16.7219 14.5441 16.8316C14.38 16.9414 14.1871 17 13.9897 17Z" fill="#34343E"/>
                 </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-10 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer rotate-180 " data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M13.9897 17C13.7251 16.9999 13.4713 16.8947 13.2842 16.7074L9.2922 12.7123C9.1051 12.525 9 12.271 9 12.0061C9 11.7413 9.1051 11.4873 9.2922 11.3L13.2842 7.30491C13.3762 7.20952 13.4863 7.13343 13.6081 7.08109C13.7299 7.02874 13.8608 7.00119 13.9933 7.00004C14.1258 6.99889 14.2573 7.02416 14.3799 7.07437C14.5026 7.12459 14.614 7.19876 14.7077 7.29253C14.8014 7.38631 14.8755 7.49783 14.9257 7.62057C14.9759 7.74332 15.0011 7.87484 15 8.00745C14.9988 8.14007 14.9713 8.27113 14.919 8.39298C14.8667 8.51484 14.7906 8.62504 14.6953 8.71718L11.4089 12.0061L14.6953 15.2951C14.8349 15.4348 14.9299 15.6127 14.9684 15.8064C15.0068 16.0001 14.9871 16.2009 14.9116 16.3834C14.8361 16.5659 14.7082 16.7219 14.5441 16.8316C14.38 16.9414 14.1871 17 13.9897 17Z" fill="#34343E"/>
                 </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
