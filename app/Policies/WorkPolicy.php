<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Work;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any works.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_work');
    }

    /**
     * Determine whether the user can view a specific work.
     */
    public function view(User $user, Work $work): bool
    {
        return $user->can('view_work');
    }

    /**
     * Determine whether the user can create works.
     */
    public function create(User $user): bool
    {
        return $user->can('create_work');
    }

    /**
     * Determine whether the user can update a specific work.
     */
    public function update(User $user, Work $work): bool
    {
        return $user->can('update_work');
    }

    /**
     * Determine whether the user can delete a specific work.
     */
    public function delete(User $user, Work $work): bool
    {
        return $user->can('delete_work');
    }

    /**
     * Determine whether the user can bulk delete works.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_work');
    }

    /**
     * Determine whether the user can restore a specific work.
     */
    public function restore(User $user, Work $work): bool
    {
        return $user->can('restore_work');
    }

    /**
     * Determine whether the user can bulk restore works.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_work');
    }

    /**
     * Determine whether the user can permanently delete a specific work.
     */
    public function forceDelete(User $user, Work $work): bool
    {
        return $user->can('force_delete_work');
    }

    /**
     * Determine whether the user can permanently bulk delete works.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_work');
    }

    /**
     * Determine whether the user can replicate a work.
     */
    public function replicate(User $user, Work $work): bool
    {
        return $user->can('replicate_work');
    }

    /**
     * Determine whether the user can reorder works.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_work');
    }
}
