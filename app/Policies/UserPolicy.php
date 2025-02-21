<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy {
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any users.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_user');
    }

    /**
     * Determine whether the user can view a specific user.
     */
    public function view(User $user, User $model): bool
    {
        return $user->can('view_user') || $user->id === $model->id;
    }

    /**
     * Determine whether the user can create a new user.
     */
    public function create(User $user): bool
    {
        return $user->can('create_user');
    }

    /**
     * Determine whether the user can update a specific user.
     */
    public function update(User $user, User $model): bool
    {
        return $user->can('update_user') || $user->id === $model->id;
    }

    /**
     * Determine whether the user can delete a specific user.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->can('delete_user') && $user->id !== $model->id;
    }

    /**
     * Determine whether the user can bulk delete users.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_user');
    }

    /**
     * Determine whether the user can permanently delete a specific user.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return $user->can('force_delete_user') && $user->id !== $model->id;
    }

    /**
     * Determine whether the user can permanently bulk delete users.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_user');
    }

    /**
     * Determine whether the user can restore a specific user.
     */
    public function restore(User $user, User $model): bool
    {
        return $user->can('restore_user');
    }

    /**
     * Determine whether the user can bulk restore users.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_user');
    }

    /**
     * Determine whether the user can replicate a specific user.
     */
    public function replicate(User $user, User $model): bool
    {
        return $user->can('replicate_user');
    }

    /**
     * Determine whether the user can reorder users.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_user');
    }
}
