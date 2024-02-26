<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Http\Requests\EducationStoreRequest;
use App\Http\Requests\EducationUpdateRequest;
use App\Models\Education;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EducationController extends Controller
{
    public function index()
    {
        // Ajoutez la logique pour récupérer les éducations du recruteur ici
        $educations = auth()->user()->educations;
        return view('recruiter.educations.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recruiter.educations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EducationStoreRequest $request): RedirectResponse
    {
        
        Education::create($request->validated());

        return redirect()->route('recruiter.educations.index')->with('success', 'Education added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education): View
    {
        return view('recruiter.educations.show', compact('education'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education): View
    {
        return view('recruiter.educations.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EducationUpdateRequest $request, Education $education): RedirectResponse
    {
        
        $education->update($request->validated());

        return redirect()->route('recruiter.educations.index')->with('success', 'Education updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education): RedirectResponse
    {
        $education->delete();
        return redirect()->route('recruiter.educations.index')->with('success', 'Education deleted successfully!');
    } 
}
