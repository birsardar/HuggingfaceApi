<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class HuggingfaceController extends Controller
{
    public function showForm()
    {
        return view('query_form'); // Create a Blade view named query_form.blade.php for the form
    }
    public function query(Request $request)
    {

        // Get the input value from the request (assuming it's submitted through a form)
        $inputValue = $request->input('input_value');

        // Huggingface API endpoint URL
        $apiUrl = 'https://api-inference.huggingface.co/models/johnslegers/epic-diffusion';

        // API request data
        $data = ['inputs' =>  $inputValue];

        // Fetch API data using Guzzle HTTP client
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer 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',
            ])->post($apiUrl, $data);


            // Check if the request was successful (HTTP status code 200-299)
            if ($response->successful()) {
                // Get the response as binary content
                $result = $response->body();
                // dd($result);

                // Use the result as needed
                // For example, you can save it as a file or display it in the view
                return view('result', ['result' => $result]);
            } else {
                // Handle error responses here
                return response()->json(['error' => 'API request failed'], $response->status());
            }
        } catch (\Exception $e) {
            // Handle exceptions (e.g., connection errors) here
            return response()->json(['error' => 'API request error'], 500);
        }
    }
}
