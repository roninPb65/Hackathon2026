<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/chat', function (Request $request) {
    $response = Http::withHeaders([
        'x-api-key' => env('ANTHROPIC_API_KEY'),
        'anthropic-version' => '2023-06-01',
        'Content-Type' => 'application/json',
    ])->post('https://api.anthropic.com/v1/messages', [
        'model' => 'claude-sonnet-4-20250514',
        'max_tokens' => 1000,
        'system' => $request->input('system'),
        'messages' => $request->input('messages'),
    ]);

    return response()->json($response->json());
});
