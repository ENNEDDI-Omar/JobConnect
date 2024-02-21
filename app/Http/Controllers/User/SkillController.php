<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource for the authenticated user.
     */
    public function index()
    {
        $skills = Auth::user()->skills;
        return view('user.skill.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.skill.create');
    }

    /**
     * Store a newly created resource in storage for the authenticated user.
     */
    public function store(StoreSkillRequest $request)
    {
        Auth::user()->skills()->create($request->validated());

        return redirect()->route('user.skill.index');
    }

    /**
     * Display the specified resource for the authenticated user.
     */
    public function show(Skill $skill)
    {
        // Check if the skill belongs to the authenticated user
        if ($skill->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('user.skill.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource for the authenticated user.
     */
    public function edit(Skill $skill)
    {
        if ($skill->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('user.skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage for the authenticated user.
     */
    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        if ($skill->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $skill->update($request->validated());
        return redirect()->route('user.skill.index');
    }

    /**
     * Remove the specified resource from storage for the authenticated user.
     */
    public function destroy(Skill $skill)
    {
        if ($skill->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $skill->delete();
        return redirect()->route('user.skill.index');
    }
}
