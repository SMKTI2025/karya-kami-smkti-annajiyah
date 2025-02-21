<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any roles.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_role');
    }

    /**
     * Determine whether the user can view a specific role.
     */
    public function view(User $user, Role $role): bool
    {
        return $user->can('view_role');
    }

    /**
     * Determine whether the user can create roles.
     */
    public function create(User $user): bool
    {
        return $user->can('create_role');
    }

    /**
     * Determine whether the user can update a specific role.
     */
    public function update(User $user, Role $role): bool
    {
        return $user->can('update_role');
    }

    /**
     * Determine whether the user can delete a specific role.
     */
    public function delete(User $user, Role $role): bool
    {
        return $user->can('delete_role');
    }

    /**
     * Determine whether the user can bulk delete roles.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_role');
    }

    /**
     * Determine whether the user can permanently delete a specific role.
     */
    public function forceDelete(User $user, Role $role): bool
    {
        return $user->can('force_delete_role');
    }

    /**
     * Determine whether the user can permanently bulk delete roles.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_role');
    }

    /**
     * Determine whether the user can restore a specific role.
     */
    public function restore(User $user, Role $role): bool
    {
        return $user->can('restore_role');
    }

    /**
     * Determine whether the user can bulk restore roles.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_role');
    }

    /**
     * Determine whether the user can replicate a role.
     */
    public function replicate(User $user, Role $role): bool
    {
        return $user->can('replicate_role');
    }

    /**
     * Determine whether the user can reorder roles.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_role');
    }
}
