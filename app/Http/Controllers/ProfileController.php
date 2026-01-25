<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAction;
use App\Models\EventRegistration;

class ProfileController extends Controller
{
    public function show()
    {
        $userActions = UserAction::where('user_id', Auth::id())
            ->with('action')
            ->latest('completed_at')
            ->get();

        // Use 'event_date' instead of 'date'
        $registeredEvents = EventRegistration::where('user_id', Auth::id())
            ->with('event')
            ->whereHas('event', function($query) {
                $query->where('event_date', '>=', now());
            })
            ->get();

        return view('profile.profile', compact('userActions', 'registeredEvents'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}