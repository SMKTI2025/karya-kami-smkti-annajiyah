<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Assessment;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssessmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any assessments.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_assessment');
    }

    /**
     * Determine whether the user can view a specific assessment.
     */
    public function view(User $user, assessment $assessment): bool
    {
        return $user->can('view_assessment');
    }

    /**
     * Determine whether the user can create assessments.
     */
    public function create(User $user): bool
    {
        return $user->can('create_assessment');
    }

    /**
     * Determine whether the user can update a specific assessment.
     */
    public function update(User $user, assessment $assessment): bool
    {
        return $user->can('update_assessment');
    }

    /**
     * Determine whether the user can delete a specific assessment.
     */
    public function delete(User $user, assessment $assessment): bool
    {
        return $user->can('delete_assessment');
    }

    /**
     * Determine whether the user can bulk delete assessments.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_assessment');
    }

    /**
     * Determine whether the user can restore a specific assessment.
     */
    public function restore(User $user, assessment $assessment): bool
    {
        return $user->can('restore_assessment');
    }

    /**
     * Determine whether the user can bulk restore assessments.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_assessment');
    }

    /**
     * Determine whether the user can permanently delete a specific assessment.
     */
    public function forceDelete(User $user, assessment $assessment): bool
    {
        return $user->can('force_delete_assessment');
    }

    /**
     * Determine whether the user can permanently bulk delete assessments.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_assessment');
    }

    /**
     * Determine whether the user can replicate a assessment.
     */
    public function replicate(User $user, assessment $assessment): bool
    {
        return $user->can('replicate_assessment');
    }

    /**
     * Determine whether the user can reorder assessments.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_assessment');
    }
}
