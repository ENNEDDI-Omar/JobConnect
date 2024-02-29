<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function show($id)
  {
    $user = User::with('skills', 'educations', 'experiences')->find($id);
    return view('user.profile', compact('user'));
  }

  public function edit($id)
  {
    $user = User::find($id);

    // Authorize the 'update' action using the UserProfilPolicy
    $this->authorize('update', $user);

    return view('user.profile', compact('user'));
  }

  public function update(Request $request, $id)
  {
    $user = User::find($id);

    // Authorize the 'update' action using the UserProfilPolicy
    $this->authorize('update', $user);

    // Add your validation logic here for the update request

    $user->update($request->all());

    return redirect()->route('user.show', $id)
      ->with('success', 'Profile updated successfully');
  }

  public function destroy($id)
  {
    $user = User::find($id);

    // Authorize the 'delete' action using the UserProfilPolicy
    $this->authorize('delete', $user);

    // Add your logic for deleting the user profile

    return redirect()->route('home')->with('success', 'Profile deleted successfully');
  }
}
