<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Recruiter;
use App\Models\Company;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $userJob = $user->experiences()->latest()->first();
        $offers = Offer::with('skills')->get();
        $recentOffers = Offer::with('skills')->latest()->take(5)->get();
        $companies = Company::latest()->take(5)->get();
        $recruiters = User::whereIn('role_id', [2, 3])->latest()->take(5)->get();
        return view('home', compact('user', 'offers', 'recentOffers', 'companies', 'recruiters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function displayCommunity()
    {
        $users = User::all();
        $user = Auth::user();
        $recentOffers = Offer::with('skills')->latest()->take(5)->get();
        $companies = Company::latest()->take(5)->get();


        return view('community', compact('users', 'user','recentOffers', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
