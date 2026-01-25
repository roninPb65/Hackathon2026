<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('is_approved', true)
            ->orderBy('event_date')
            ->paginate(12);
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_type' => 'required|string',
            'url' => 'nullable|url',
            'event_date' => 'required|date',
            'location' => 'nullable|string',
            'is_online' => 'boolean',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['is_approved'] = true; // Admin approval required

        Event::create($validated);

        return redirect()->route('events.index')
            ->with('success', 'Event submitted for approval!');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }
}
