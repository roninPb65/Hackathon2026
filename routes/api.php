<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/chat', function (Request $request) {
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=' . env('GEMINI_API_KEY'), [
        'system_instruction' => [
            'parts' => [['text' => $request->input('system')]]
        ],
        'contents' => collect($request->input('messages'))->map(fn($m) => [
            'role' => $m['role'] === 'assistant' ? 'model' : 'user',
            'parts' => [['text' => $m['content']]]
        ])->values()->toArray(),
    ]);

    return response()->json($response->json());
});
