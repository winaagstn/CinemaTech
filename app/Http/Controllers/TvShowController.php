<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Http;

class TvShowController extends Controller
{
    public function tvShow(Request $request) {
    $baseURL = env('MOVIE_DB_BASE_URL');
    $imageBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
    $apiKey = env('MOVIE_DB_API_KEY');
    $sortBy = 'popularity.desc';
    $minimalVoter = 40;
    $page = $request->query('page', 1);

    // Hit API data
    $tvResponse = Http::get("$baseURL/discover/tv", [
        'api_key' => $apiKey,
        'sort_by' => $sortBy,
        'vote_count.gte' => $minimalVoter,
        'page' => $page,
    ]);

    // Prepare variable
    $tvArray = [];

    // Check API response and handle it
    if ($tvResponse->successful()) {
        $resultArray = $tvResponse->object()->results;

        // Check if results are not null
        if (!empty($resultArray)) {
            // Save response data to our array variable
            $tvArray = $resultArray;
        }
    }

    // Pass the movieArray and page to the view
    return view('tvshows', [
        'baseURL' => $baseURL,
        'imageBaseURL' => $imageBaseURL,
        'apiKey' => $apiKey,
        'tvShow' => $tvArray,
        'sortBy' => $sortBy,
        'page' => $page,
        'minimalVoter' => $minimalVoter,
    ]);

 }


public function tvDetail($id) {
    $baseURL = env('MOVIE_DB_BASE_URL');
    $imageBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
    $apiKey = env('MOVIE_DB_API_KEY');

    // Hit API data
    $response = Http::get("$baseURL/tv/$id", [
        'api_key' => $apiKey,
        'append_to_response' => 'videos'
    ]);

    // Prepare variable
    $tvData = null;

    // Check API response and handle itp
    if ($response->successful()) {
        $tvData = $response->object();
    }


    return view('TvShow', compact('baseURL', 'imageBaseURL', 'apiKey', 'tvData'));
}
}
