<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Http;


class MovieController extends Controller
{
    public function index(){
        $baseURL = env ('MOVIE_DB_BASE_URL');
        $imageURL = env ('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env ('MOVIE_DB_API_KEY');

        // Hit Api

                $bannerResponse = Http::get("{$baseURL}/movie/popular",[
                'api_key' => $apiKey,

              ]);

      // Variable
            $bannerArray=[];
            $MAX_BANNER = 3 ;
      // Check Api Response
        if ($bannerResponse->successful()) {
            $resultArray = $bannerResponse-> object()->results;

            if (isset($resultArray)){
                //looping data
                foreach ($resultArray as $item) {

                    array_push($bannerArray, $item);

                  if (count ($bannerArray) == $MAX_BANNER ) {
                    break ;

                 }
            }

        }
        // top movie hit API
 $topMovieResponse = Http::get("{$baseURL}/movie/top_rated",[
                'api_key' => $apiKey,

              ]);


    $topMovieArray=[];
    $MAX_TOP_MOVIES= 10 ;


     if ($topMovieResponse->successful()) {
            $resultArray = $topMovieResponse-> object()->results;

            if (isset($resultArray)){
                //looping data
                foreach ($resultArray as $item) {

                    array_push($topMovieArray, $item);

                  if (count ($topMovieArray) == $MAX_TOP_MOVIES ) {
                    break ;

                 }
            }

        }



        return view('home',[
            'baseURL' => $baseURL,
            'imageBaseUrl'=>$imageURL,
            'apiKey'=> $apiKey,
            'banner'=> $bannerArray,
            'topMovies'=> $topMovieArray

        ]);

        }
    }
  }

  public function movieDetail($id){
         $baseURL = env ('MOVIE_DB_BASE_URL');
        $imageURL = env ('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env ('MOVIE_DB_API_KEY');

         $response = Http::get("{$baseURL}/movie/{$id}",[
                'api_key' => $apiKey,
                'append_to_response'=> 'videos'

              ]);
              $movieData = null;
          if($response->successful()){
                $movieData = $response->object();

          }

        return view('movie',[
            'baseURL' =>$baseURL,
            'ImageBaseURL'=>$imageURL,
            'apiKey'=> $apiKey,
            'movieData' => $movieData
         ]);

  }
}
