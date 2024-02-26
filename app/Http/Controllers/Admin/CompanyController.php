<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index(){
        $users=User::all();
        $companies = Company::all();

        return view('Admin.Company.index', compact('companies', 'users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recruiters=User::all();
        $representatives=User::all();
        return view('Admin.Company.create', compact('recruiters', 'representatives'));
    }

    public function store(Request $request)
    {
        
       Company::create($request->all());
        return redirect()->route('admin.company.index');
    }


    public function updateUser(Request $request, $id)
    {
        try {
            // Validate the request data
            $request->validate([
                'user_id' => 'nullable|exists:users,id',
                // Add other validation rules as needed for updating company fields
            ]);

            // Retrieve the company
            $company = Company::findOrFail($id);

            // Update company fields
            $company->update($request->only(['name', 'capital', 'industry']));

            // Assign the user if provided
            if ($request->has('user_id')) {
                $user = User::findOrFail($request->user_id);
                $company->user()->associate($user); // Assuming you have a 'user' relationship in your Company model
                $company->save();
            }

            // You can return a response indicating success if needed
            return response()->json(['message' => 'Company updated successfully'], 200);
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the update process
            return response()->json(['error' => 'Error updating company'], 500);
        }
    }
}
