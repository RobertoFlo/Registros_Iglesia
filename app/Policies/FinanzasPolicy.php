<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Gasto;
use Illuminate\Auth\Access\Response;

class FinanzasPolicy
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
    public function view(User $user, Gasto $mntGasto): bool
    {
        //
        return $user->can('finanzas.view');

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return $user->can('finanzas.create');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Gasto $mntGasto): bool
    {
        //
        return $user->can('finanzas.update');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Gasto $mntGasto): bool
    {
        //
        return $user->can('finanzas.delete');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Gasto $mntGasto): bool
    {
        return $user->can('finanzas.restore');
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Gasto $mntGasto): bool
    {
        return false;
        //
    }
}
