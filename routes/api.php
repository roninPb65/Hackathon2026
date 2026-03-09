<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/chat', function (Request $request) {
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
        'Content-Type' => 'application/json',
    ])->post('https://api.groq.com/openai/v1/chat/completions', [
        'model' => 'llama-3.1-8b-instant',
        'max_tokens' => 500,
        'messages' => array_merge(
            [['role' => 'system', 'content' => $request->input('system')]],
            $request->input('messages')
        ),
    ]);

    return response()->json($response->json());
});
