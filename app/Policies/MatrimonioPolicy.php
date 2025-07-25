<?php

namespace App\Policies;

use App\Models\User;
use App\Models\mnt_boda;
use Illuminate\Auth\Access\Response;

class MatrimonioPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, mnt_boda $mntBoda): bool
    {
        //
        return $user->can('boda.view');

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return $user->can('boda.create');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, mnt_boda $mntBoda): bool
    {
        //
        return $user->can('boda.update');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, mnt_boda $mntBoda): bool
    {
        //
        return $user->can('boda.delete');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, mnt_boda $mntBoda): bool
    {
        //
        return $user->can('boda.restore');

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, mnt_boda $mntBoda): bool
    {
        //
        return false;

    }
}
