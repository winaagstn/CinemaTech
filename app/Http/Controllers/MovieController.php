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


        return view('home',[
            'baseURL' => $baseURL,
            'imageBaseUrl'=>$imageURL,
            'apiKey'=> $apiKey,
            'banner'=> $bannerArray,
        ]);

        }
    }
}
