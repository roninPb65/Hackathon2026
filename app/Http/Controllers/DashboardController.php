<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Action;
use App\Models\UserAction;
use App\Models\GraduateInsight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $upcomingEvents = Event::where('is_approved', true)
            ->where('event_date', '>', now())
            ->orderBy('event_date')
            ->take(5)
            ->get();

        $recommendedActions = Action::orderBy('impact_score', 'desc')
            ->take(6)
            ->get();

        $recentInsights = GraduateInsight::where('is_approved', true)
            ->with('user')
            ->latest()
            ->take(3)
            ->get();

        $userProgress = UserAction::where('user_id', $user->id)
            ->count();

        return view('dashboard', compact(
            'upcomingEvents',
            'recommendedActions',
            'recentInsights',
            'userProgress'
        ));
    }
}
