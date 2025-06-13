<?php

namespace App\Policies;

use App\Models\User;
use App\Models\mnt_bautizo;
use Illuminate\Auth\Access\Response;
use Spatie\Permission\Models\Role;


class BautizoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, mnt_bautizo $mntBautizo): bool
    {
        return true;

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
    //     $role = Role::findByName('administrador', 'api');
          // dd($role->permissions->pluck('name'));
           // return $user->hasPermissionTo('bautizo.create', 'api');
    //       dd([
    //     'user' => $user->email,
    //     'roles' => $user->getRoleNames(),
    //     'permissions' => $user->getAllPermissions()->pluck('name'),
    //     'can' => $user->can('bautizo.create'),
    //     'hasPermissionTo' => $user->hasPermissionTo('bautizo.create', 'api'),
    // ]);
        return  $user->can('bautizo.create');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, mnt_bautizo $mntBautizo): bool
    {

        return true;

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, mnt_bautizo $mntBautizo): bool
    {
        return true;
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, mnt_bautizo $mntBautizo): bool
    {
        return true;
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, mnt_bautizo $mntBautizo): bool
    {
        return true;
        //
    }
}
