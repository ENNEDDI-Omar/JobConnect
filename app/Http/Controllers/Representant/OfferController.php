<?php

namespace App\Http\Controllers\Representant;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferStoreRequest;
use App\Http\Requests\OfferUpdateRequest;
use App\Models\Category;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->companyRepresented) {
            $company = $user->companyRepresented;

            $offers = $user->offers()->get();
            
            return view('Representant.offer.display', compact('company', 'offers'));
        } else {
            return response()->json(['message' => 'User does not represent any company'], 404);
        }        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('Representant.offer.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferStoreRequest $request)
    {
        $offers = Offer::create($request->validated());
        $offers->addMediaFromRequest('picture')->toMediaCollection('offers');

        return redirect()->route('representant.offers.index')->with('success', 'Job Offer added succefuly!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        $applications = $offer->applications;
        return view('Representant.offer.show', compact('offer', 'applications'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        $categories = Category::all();
        return view('Representant.offer.edit', compact('offer', 'categories'));
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
          
        return redirect()->route('representant.offers.index')->with('success', 'Offer updated succfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->back()->with('success', 'Offer deleted succfully!');
    }
}


