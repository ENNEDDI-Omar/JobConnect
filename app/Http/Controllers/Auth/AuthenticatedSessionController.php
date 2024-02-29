<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $user = Auth::user();

    


        if ($user->is_admin) {
            return redirect()->route('admin.dashboard.index');
        } elseif ($user->is_user) {
            return redirect()->route('home');
        } elseif ($user->is_recruiter) {
            return redirect()->route('recruiter.dashboard.index');
        } elseif ($user->is_representant) {
            return redirect()->route('representant.offers.index');
        } else {
            // Redirect to a default route if the user's role is not recognized
            return redirect(RouteServiceProvider::HOME);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
