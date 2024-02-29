<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Company;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $applications = $user->applications->get();
        $recentOffers = Offer::with('skills')->latest()->take(5)->get();
        $companies = Company::latest()->take(5)->get();
        $recruiters = User::whereIn('role_id', [2, 3])->latest()->take(5)->get();
        return view('user.applications', compact('applications', 'user', 'companies', 'recruiters','recentOffers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        // Store resume and cover letter in the media library
        $application = new Application();
        $application->user_id = Auth::id();
        $application->offer_id = $request->offer_id;
        $application->applied_at = now();
        
        $resumePath = $request->file('resume')->store('resumes', 'public');
        $application->addMedia(storage_path('app/public/' . $resumePath))->toMediaCollection('resumes');

        
        $coverLetterPath = $request->file('cover_letter')->store('cover_letters', 'public');
        $application->addMedia(storage_path('app/public/' . $coverLetterPath))->toMediaCollection('cover_letters');

        $application->save();

        return redirect()->back()->with('success', 'Application submitted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::findOrFail($id);
        return view('applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = Application::findOrFail($id);
        return view('applications.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            // Define validation rules here
        ]);

        $application = Application::findOrFail($id);
        $application->update($request->all());

        return redirect()->route('applications.index')
            ->with('success', 'Application updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return redirect()->route('applications.index')
            ->with('success', 'Application deleted successfully.');
    }
}

