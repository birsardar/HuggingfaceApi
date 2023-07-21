<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    public function fetchApiData()
    {
        // API URL
        $apiUrl = 'https://huggingface.co/spaces/Rothfeld/stable-diffusion-mat-outpainting-primer';

        // Fetch API data using Guzzle HTTP client
        try {
            $response = Http::get($apiUrl);

            // Check if the request was successful (HTTP status code 200-299)
            if ($response->successful()) {
                // Convert the JSON response to an array
                $apiData = $response->json();

                // Handle the fetched data as needed
                // For example, return it as a view to display in the browser
                dd($apiData);
                return view('api_data', ['apiData' => $apiData]);
            } else {
                // Handle error responses here if necessary
                return response()->json(['error' => 'API request failed'], $response->status());
            }
        } catch (\Exception $e) {
            // Handle exceptions (e.g., connection errors) here
            return response()->json(['error' => 'API request error'], 500);
        }
    }
}
