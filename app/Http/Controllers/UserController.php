<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function show($id)
  {
    $user = User::with('skills', 'educations', 'experiences')->find($id);
    return view('user.profile', compact('user'));
  }

  public function edit(User $user)
  {

    if (Gate::allows('update', $user)) {
      // User is authorized to perform the 'update' action
      // Your logic here
      return view('user.profile');
    } else {
      // User is not authorized
      abort(403, 'Unauthorized');
      
    }
  }

  // public function update(Request $request, User $user)
  // {
  //   $this->authorize('update', $user);

  //   $user->update($request->all());

  //   return redirect()->route('user.show', compact('user'))
  //     ->with('success', 'Profile updated successfully');
  // }

  public function destroy($id)
  {
    $user = User::find($id);

    // Authorize the 'delete' action using the UserProfilPolicy
    $this->authorize('delete', $user);

    // Add your logic for deleting the user profile

    return redirect()->route('home')->with('success', 'Profile deleted successfully');
  }
}
