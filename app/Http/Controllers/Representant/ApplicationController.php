<?php

namespace App\Http\Controllers\Representant;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index($offerId)
    {
        $offer = Offer::findOrFail($offerId);
        if (Auth::user()->id != $offer->user->representative_id) {
            abort(403, 'Unauthorized action.');
        }

        $applications = $offer->applications;

        return view('company.applications.index', compact('applications'));
    }
    public function updateStatus($applicationId, Request $request)
    {
        $application = Application::findOrFail($applicationId);
        if (Auth::user()->id != $application->offer->user->representative_id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $application->status = $request->status;
        $application->save();

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }
    public function destroy($applicationId)
    {
        $application = Application::findOrFail($applicationId);
        if (Auth::user()->id != $application->offer->user->representative_id) {
            abort(403, 'Unauthorized action.');
        }

        $application->delete();

        return redirect()->back()->with('success', 'Application deleted successfully.');
    }

    public function showApplicationUser(Application $application){
        return response()->json($application);
    }
}
