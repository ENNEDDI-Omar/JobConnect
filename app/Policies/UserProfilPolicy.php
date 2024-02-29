<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserProfilPolicy
{
    

    
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, user $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, User $profilUser): bool
    {
        return $user->id === $profilUser->user_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, user $profilUser): bool
    {
        return $user->id === $profilUser->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, user $profilUser): bool
    {
        return $user->id === $profilUser->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, user $profilUser): bool
    {
        return $user->id === $profilUser->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, user $profilUser): bool
    {
        return $user->id === $profilUser->user_id;
    }


}
