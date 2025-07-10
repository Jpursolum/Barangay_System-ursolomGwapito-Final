<?php

namespace App\Policies;

use App\Models\Demograph;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DemographPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_demograph');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Demograph $demograph): bool
    {
        // Check if the user has permission and if the record is approved
        return $user->can('view_demograph') && $demograph->approved;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_demograph');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Demograph $demograph): bool
    {
        return $user->can('update_demograph');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Demograph $demograph): bool
    {
        return $user->can('delete_demograph');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_demograph');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Demograph $demograph): bool
    {
        // Check if the user has permission and if the record is approved
        return $user->can('force_delete_demograph') && $demograph->approved;
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_demograph');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Demograph $demograph): bool
    {
        // Check if the user has permission and if the record is approved
        return $user->can('restore_demograph') && $demograph->approved;
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_demograph');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Demograph $demograph): bool
    {
        // Check if the user has permission and if the record is approved
        return $user->can('replicate_demograph') && $demograph->approved;
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_demograph');
    }
}
