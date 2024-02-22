<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferStoreRequest;
use App\Http\Requests\OfferUpdateRequest;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::all();
        return view('Recruiter.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Recruiter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferStoreRequest $request)
    {
        $offers = Offer::create($request->validated());
        $offers->addMediaFromRequest('picture')->toMediaCollection('offers');

        return redirect()->route('offers.index')->with('success', 'Job Offer added succefuly!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        return view('Recruiter.index', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $id)
    {
        $offer=Offer::findOrFail($id);
        return view('Recruiter.index', compact('offer'));
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
          
        return redirect()->route('offers.index')->with('success', 'Offer updated succfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('offers.index')->with('success', 'Offer deleted succfully!');
    }
}
