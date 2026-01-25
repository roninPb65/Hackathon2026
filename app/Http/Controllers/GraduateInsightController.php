<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\GraduateInsight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GraduateInsightController extends Controller
{
    public function index()
    {
        $insights = GraduateInsight::where('is_approved', true)
            ->with('user')
            ->latest()
            ->paginate(10);

        return view('insights.index', compact('insights'));
    }

    public function create()
    {
        return view('insights.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'success_story' => 'required|string|min:100',
            'key_actions' => 'required|array',
            'time_to_hire' => 'required|integer|min:0',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['is_approved'] = true;

        GraduateInsight::create($validated);

        return redirect()->route('insights.index')
            ->with('success', 'Thank you for sharing your success story!');
    }

    public function show(GraduateInsight $insight)
    {
        if (!$insight->is_approved && $insight->user_id !== Auth::id()) {
            abort(403);
        }

        return view('insights.show', compact('insight'));
    }
}