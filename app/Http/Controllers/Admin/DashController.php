<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Application;
use App\Models\Offer;
use App\Models\Role;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{
    public function index(){
        $users=User::all();
        $companies = Company::all();

        return view('Admin.index', compact('companies', 'users'));
    }


    public function allStatistics(Request $request)
    {
        
        $startDate = $request->input('start_date', Carbon::now()->subYear());
        $endDate = $request->input('end_date', Carbon::now());
        $totalUsers = User::count();
        $roles = Role::pluck('id', 'name');
        $roleCounts = [];
        foreach ($roles as $roleName => $roleId) {
            $roleCounts[$roleName] = User::where('role_id', $roleId)->count();
        }
        $completedProfilesCount = User::whereHas('experiences')
            ->whereHas('educations')
            ->whereHas('skills')
            ->count();
        //$usersWithProfilePicturesCount = User::whereNotNull('profile_picture')->count();
        $registeredUsersWithinTimeFrame = User::whereBetween('created_at', [$startDate, $endDate])->count();

        // Company statistics
        $totalCompanies = Company::count();
        $companiesWithRepresentatives = Company::has('representative')->count();
        $companiesWithRecruiters = Company::has('recruiter')->count();
        $industries = Company::distinct('industry')->pluck('industry')->toArray();
        //$totalTestimonials = Testimonial::count();
        $totalJobOffers = Offer::count();

        // Application statistics
        $totalApplications = Application::count();
        $applicationsPerOffer = Offer::withCount('applications')->get()->pluck('applications_count')->toArray();
        $applicationsPerUser = User::withCount('applications')->get()->pluck('applications_count')->toArray();
        $statusBreakdown = Application::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status')
            ->toArray();

            return view('admin.Dashboard', [
                'userStatistics' => [
                    'totalUsers' => $totalUsers,
                    'roleCounts' => $roleCounts,
                    'completedProfilesCount' => $completedProfilesCount,
                    'registeredUsersWithinTimeFrame' => $registeredUsersWithinTimeFrame,
                ],
                'companyStatistics' => [
                    'totalCompanies' => $totalCompanies,
                    'companiesWithRepresentatives' => $companiesWithRepresentatives,
                    'companiesWithRecruiters' => $companiesWithRecruiters,
                    'industries' => $industries,
                    'totalJobOffers' => $totalJobOffers,
                ],
                'applicationStatistics' => [
                    'totalApplications' => $totalApplications,
                    'applicationsPerOffer' => $applicationsPerOffer,
                    'applicationsPerUser' => $applicationsPerUser,
                    'statusBreakdown' => $statusBreakdown,
                ],
            ]);
    }
}


