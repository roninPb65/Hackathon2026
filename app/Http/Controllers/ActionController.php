<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\UserAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller
{
    public function index()
    {
        $actions = Action::orderBy('impact_score', 'desc')->get();
        $completedActionIds = UserAction::where('user_id', Auth::id())
            ->pluck('action_id')
            ->toArray();

        return view('actions.index', compact('actions', 'completedActionIds'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'action_id' => 'required|exists:actions,id',
            'event_id' => 'nullable|exists:events,id',
            'reflection' => 'nullable|string',
            'completed_at' => 'required|date',
        ]);

        $validated['user_id'] = Auth::id();

        UserAction::create($validated);

        return redirect()->back()
            ->with('success', 'Action logged successfully!');
    }

    public function myActions()
    {
        $userActions = UserAction::where('user_id', Auth::id())
            ->with(['action', 'event'])
            ->latest()
            ->get();

        return view('actions.my-actions', compact('userActions'));
    }
}