<?php

namespace App\Policies;

use App\Models\BrgyInhabitant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BrgyInhabitantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Add your condition if necessary, e.g., only allowing approved records
        return $user->can('view_any_brgy::inhabitant');

        return ! $user->brgyInhabitant()->exists();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BrgyInhabitant $brgyInhabitant): bool
    {
        // Allow if admin OR the owner of the record
        return $user->hasRole('super_admin') ||
               $user->hasRole('brgySecretary') ||
               $user->id === $brgyInhabitant->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_brgy::inhabitant');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BrgyInhabitant $brgyInhabitant): bool
    {
        return $user->hasRole('super_admin') ||
               $user->hasRole('brgySecretary') ||
               $user->id === $brgyInhabitant->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BrgyInhabitant $brgyInhabitant): bool
    {
        return $user->can('delete_brgy::inhabitant');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_brgy::inhabitant');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, BrgyInhabitant $brgyInhabitant): bool
    {
        return $user->can('force_delete_brgy::inhabitant') && $brgyInhabitant->approved;
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_brgy::inhabitant');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, BrgyInhabitant $brgyInhabitant): bool
    {
        return $user->can('restore_brgy::inhabitant') && $brgyInhabitant->approved;
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_brgy::inhabitant');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, BrgyInhabitant $brgyInhabitant): bool
    {
        return $user->can('replicate_brgy::inhabitant') && $brgyInhabitant->approved;
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_brgy::inhabitant');
    }
}
