<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        $baseURL = env('MOVIE_DB_BASE_URL');
        $imageURL = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env('MOVIE_DB_API_KEY');

        // Function to fetch data from TMDB API
        $fetchData = function ($url, $maxItems) use ($baseURL, $apiKey) {
            $response = Http::get("$baseURL/$url", ['api_key' => $apiKey]);

            $dataArray = [];
            if ($response->successful()) {
                $resultArray = $response->object()->results;

                if (isset($resultArray)) {
                    foreach ($resultArray as $item) {
                        $dataArray[] = $item;

                        if (count($dataArray) == $maxItems) {
                            break;
                        }
                    }
                }
            }

            return $dataArray;
        };

        // Fetch banners
        $bannerArray = $fetchData('movie/popular', 3);

        // Fetch top-rated movies
        $topMovieArray = $fetchData('movie/top_rated', 10);

        // Fetch top-rated TV shows
        $topTVShowsArray = $fetchData('tv/top_rated', 10);

        return view('home', [
            'baseURL' => $baseURL,
            'imageBaseUrl' => $imageURL,
            'apiKey' => $apiKey,
            'banner' => $bannerArray,
            'topMovies' => $topMovieArray,
            'topTVShows' => $topTVShowsArray,
        ]);
    }

    public function movies(Request $request)
    {
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

    public function sortMovies(Request $request)
    {
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

    public function movieDetail($id)
    {
        $baseURL = env('MOVIE_DB_BASE_URL');
        $imageURL = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env('MOVIE_DB_API_KEY');

        $response = Http::get("{$baseURL}/movie/{$id}", [
            'api_key' => $apiKey,
            'append_to_response' => 'videos',
        ]);
        $movieData = null;

        if ($response->successful()) {
            $movieData = $response->object();
        }

        return view('movie', [
            'baseURL' => $baseURL,
            'ImageBaseURL' => $imageURL,
            'apiKey' => $apiKey,
            'movieData' => $movieData,
        ]);
    }
}
