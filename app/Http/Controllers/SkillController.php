<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\UserSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function index()
    {
        $availableSkills = Skill::orderBy('category')
            ->orderBy('name')
            ->get()
            ->groupBy('category');

        // For many-to-many, use the relationship directly
        $userSkills = Auth::user()->skills;  // This is correct for belongsToMany

        return view('skills.index', compact('availableSkills', 'userSkills'));
    }

    public function addSkill(Request $request)
    {
        $validated = $request->validate([
            'skill_id' => 'required|exists:skills,id',
            'proficiency_level' => 'required|integer|min:1|max:5',
        ]);

        // Check if already exists
        if (Auth::user()->skills()->where('skill_id', $request->skill_id)->exists()) {
            return back()->with('error', 'You already have this skill!');
        }

        // Use attach for many-to-many relationships
        Auth::user()->skills()->attach($request->skill_id, [
            'proficiency_level' => $request->proficiency_level
        ]);

        return back()->with('success', 'Skill added successfully!');
    }

    public function removeSkill(Skill $skill)
    {
        // Use detach for many-to-many relationships
        Auth::user()->skills()->detach($skill->id);

        return back()->with('success', 'Skill removed!');
    }
}
