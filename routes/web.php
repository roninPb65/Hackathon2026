<?php
// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\GraduateInsightController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\ProfileController;

// Public routes
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
})->name('home');

// Authentication routes (if using Laravel UI)
Auth::routes();

// Protected routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Events
    Route::resource('events', EventController::class);

    // Actions
    Route::get('/actions', [ActionController::class, 'index'])->name('actions.index');
    Route::post('/actions', [ActionController::class, 'store'])->name('actions.store');
    Route::get('/my-actions', [ActionController::class, 'myActions'])->name('actions.my-actions');

    // Graduate Insights
    Route::resource('insights', GraduateInsightController::class);

    // Skills
    Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
    Route::post('/skills/add', [SkillController::class, 'addSkill'])->name('skills.add');
    Route::delete('/skills/{skill}', [SkillController::class, 'removeSkill'])->name('skills.remove');

    // ATS Chatbot
    Route::get('/ats-helper', [ChatbotController::class, 'index'])->name('chatbot.index');
    Route::post('/ats-helper/chat', [ChatbotController::class, 'chat'])->name('chatbot.chat');

    // Resume Builder
    Route::get('/resume', function () {
        return view('resume.builder');
    })->name('resume.builder');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Career Roadmap
    Route::get('/roadmap', function () {
        return view('roadmap.index');
    })->name('roadmap.index');

    Route::post('/chat', function (Request $request) {
        $response = Http::withHeaders([
            'x-api-key' => env('ANTHROPIC_API_KEY'),
            'anthropic-version' => '2023-06-01',
            'Content-Type' => 'application/json',
        ])->post('https://api.anthropic.com/v1/messages', [
            'model' => 'claude-sonnet-4-20250514',
            'max_tokens' => 1000,
            'system' => $request->system,
            'messages' => $request->messages,
        ]);
    
        return $response->json();
    });
});
