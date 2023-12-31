<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Http;


class MovieController extends Controller
{
    public function index()
    {
        $baseURL = env('MOVIE_DB_BASE_URL');
        $imageURL = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env('MOVIE_DB_API_KEY');

        // Hit API for Popular Movies data
        $bannerResponse = Http::get("{$baseURL}/movie/popular", [
            'api_key' => $apiKey,
        ]);

        $bannerArray = [];
        $MAX_BANNER = 3;

        if ($bannerResponse->successful()) {
            $resultArray = $bannerResponse->object()->results;

            if (isset($resultArray)) {
                foreach ($resultArray as $item) {
                    array_push($bannerArray, $item);

                    if (count($bannerArray) == $MAX_BANNER) {
                        break;
                    }
                }
            }
        }

        // Hit API for Top 10 Movies data
        $topMovieResponse = Http::get("{$baseURL}/movie/top_rated", [
            'api_key' => $apiKey,
        ]);

        $topMovieArray = [];
        $MAX_TOP_MOVIES = 10;

        if ($topMovieResponse->successful()) {
            $resultArray = $topMovieResponse->object()->results;

            if (isset($resultArray)) {
                foreach ($resultArray as $item) {
                    array_push($topMovieArray, $item);

                    if (count($topMovieArray) == $MAX_TOP_MOVIES) {
                        break;
                    }
                }
            }
        }

        // Hit API for Top 10 TV Shows data
        $topTVShowsResponse = Http::get("$baseURL/tv/top_rated", [
            'api_key' => $apiKey,
        ]);

        $topTVShowsArray = [];
        $MAX_TV_SHOWS_ITEM = 10;

        if ($topTVShowsResponse->successful()) {
            $resultArray = $topTVShowsResponse->object()->results;

            if (!empty($resultArray)) {
                foreach ($resultArray as $item) {
                    $topTVShowsArray[] = $item;

                    if (count($topTVShowsArray) == $MAX_TV_SHOWS_ITEM) {
                        break;
                    }
                }
            }
        }

        return view('home', [
            'baseURL' => $baseURL,
            'imageBaseUrl' => $imageURL,
            'apiKey' => $apiKey,
            'banner' => $bannerArray,
            'topMovies' => $topMovieArray,
            'topTVShows' => $topTVShowsArray,
        ]);
    }
  
public function movies(Request $request) {
    $baseURL = env('MOVIE_DB_BASE_URL');
    $imageBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
    $apiKey = env('MOVIE_DB_API_KEY');
    $sortBy = 'popularity.desc';
    $minimalVoter = 40;
    $page = $request->query('page', 1);

    // Hit API data
    $movieResponse = Http::get("$baseURL/discover/movie", [
        'api_key' => $apiKey,
        'sort_by' => $sortBy,
        'vote_count.gte' => $minimalVoter,
        'page' => $page,
    ]);

    // Prepare variable
    $movieArray = [];

    // Check API response and handle it
    if ($movieResponse->successful()) {
        $resultArray = $movieResponse->object()->results;

        // Check if results are not null
        if (!empty($resultArray)) {
            // Save response data to our array variable
            $movieArray = $resultArray;
        }
    }

    // Pass the movieArray and page to the view
    return view('movies', [
        'baseURL' => $baseURL,
        'imageBaseURL' => $imageBaseURL,
        'apiKey' => $apiKey,
        'movies' => $movieArray,
        'sortBy' => $sortBy,
        'page' => $page,
        'minimalVoter' => $minimalVoter,
    ]);
}
public function sortMovies(Request $request) {
    $baseURL = env('MOVIE_DB_BASE_URL');
    $imageBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
    $apiKey = env('MOVIE_DB_API_KEY');
    $minimalVoter = 40;
    $page = $request->query('page', 1);
    $sortBy = $request->query('sortBy', 'popularity.desc');

    // Hit API data
    $movieResponse = Http::get("$baseURL/discover/movie", [
        'api_key' => $apiKey,
        'sort_by' => $sortBy,
        'vote_count.gte' => $minimalVoter,
        'page' => $page,
    ]);

    // Prepare variable
    $movieArray = [];

    // Check API response and handle it
    if ($movieResponse->successful()) {
        $resultArray = $movieResponse->object()->results;

        // Check if results are not null
        if (!empty($resultArray)) {
            // Save response data to our array variable
            $movieArray = $resultArray;
        }
    }

    // Pass the movieArray and page to the view
    return view('partials.movie_list', [
        'baseURL' => $baseURL,
        'imageBaseURL' => $imageBaseURL,
        'apiKey' => $apiKey,
        'movies' => $movieArray,
        'sortBy' => $sortBy,
        'page' => $page,
        'minimalVoter' => $minimalVoter,
    ]);
}
public function searchMovies(Request $request)
{
    $baseURL = env('MOVIE_DB_BASE_URL');
    $imageURL = env('MOVIE_DB_IMAGE_BASE_URL');
    $apiKey = env('MOVIE_DB_API_KEY');

    $query = $request->input('query');

    // Hit API for search results
    $searchResponse = Http::get("$baseURL/search/movie", [
        'api_key' => $apiKey,
        'query' => $query,
    ]);

    // Prepare variable
    $searchResults = [];

    // Check API response and handle it
    if ($searchResponse->successful()) {
        $resultArray = $searchResponse->object()->results;

        // Check if results are not null
        if (!empty($resultArray)) {
            // Save response data to our array variable
            $searchResults = $resultArray;
        }
    }

    return view('search', [
        'baseURL' => $baseURL,
        'imageBaseURL' => $imageURL,
        'apiKey' => $apiKey,
        'query' => $query,
        'searchResults' => $searchResults,
    ]);
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
