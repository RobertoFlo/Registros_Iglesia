<?php

namespace App\Policies;

use App\Models\User;
use App\Models\mnt_confirma;
use Illuminate\Auth\Access\Response;

class ConfirmaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, mnt_confirma $mntConfirma): bool
    {
        return $user->can('mnt_confirma.view');
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('mnt_confirma.create');
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, mnt_confirma $mntConfirma): bool
    {
        return $user->can('mnt_confirma.update');
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, mnt_confirma $mntConfirma): bool
    {
        return $user->can('mnt_confirma.delete');
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, mnt_confirma $mntConfirma): bool
    {
        return $user->can('mnt_confirma.restore');
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, mnt_confirma $mntConfirma): bool
    {
        return false;
        //
    }
}
