<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferStoreRequest;
use App\Http\Requests\OfferUpdateRequest;
use App\Models\Application;
use App\Models\Category;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('Recruiter.offer.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferStoreRequest $request)
    {
        $offers = Offer::create($request->validated());
        $offers->addMediaFromRequest('picture')->toMediaCollection('offers');

        return redirect()->route('recruiter.dashboard.index')->with('success', 'Job Offer added succefuly!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        $offerApplications = $offer->applications;
        return view('Recruiter.offer.show', compact('offer', 'offerApplications'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        $this->authorize('update', $offer);
        $categories = Category::all();
        return view('Recruiter.offer.edit', compact('offer', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfferUpdateRequest $request, Offer $offer)
    {
        $offer->update($request->validated());

          if ($request->hasFile('picture')) {
            $offer->clearMediaCollection('offers');
            $offer->addMediaFromRequest('picture')->toMediaCollection('offers');
          }
          
        return redirect()->route('recruiter.dashboard.index')->with('success', 'Offer updated succfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('recruiter.dashboard.index')->with('success', 'Offer deleted succfully!');
    }
}
