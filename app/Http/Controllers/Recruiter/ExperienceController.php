<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExperienceStoreRequest;
use App\Http\Requests\ExperienceUpdateRequest;
use App\Models\Experience;
use App\Models\Offer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $experiences = Experience::all();
        return view('recruiter.experiences.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recruiter.experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExperienceStoreRequest $request): RedirectResponse
    {
        Experience::create($request->validated());

        return redirect()->route('recruiter.experiences.index')->with('success', 'Experience added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience): View
    {
        return view('recruiter.experiences.show', compact('experience'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience): View
    {
        return view('recruiter.experiences.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExperienceUpdateRequest $request, Experience $experience): RedirectResponse
    {
        $experienceData = $request->validated();
        $experience->update($experienceData);

        return redirect()->route('recruiter.experiences.index')->with('success', 'Experience updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience): RedirectResponse
    {
        $experience->delete();
        return redirect()->route('recruiter.experiences.index')->with('success', 'Experience deleted successfully!');
    }
}
