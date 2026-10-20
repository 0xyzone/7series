<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\B2bOffering;
use Illuminate\Auth\Access\HandlesAuthorization;

class B2bOfferingPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:B2bOffering');
    }

    public function view(AuthUser $authUser, B2bOffering $b2bOffering): bool
    {
        return $authUser->can('View:B2bOffering');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:B2bOffering');
    }

    public function update(AuthUser $authUser, B2bOffering $b2bOffering): bool
    {
        return $authUser->can('Update:B2bOffering');
    }

    public function delete(AuthUser $authUser, B2bOffering $b2bOffering): bool
    {
        return $authUser->can('Delete:B2bOffering');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:B2bOffering');
    }

    public function restore(AuthUser $authUser, B2bOffering $b2bOffering): bool
    {
        return $authUser->can('Restore:B2bOffering');
    }

    public function forceDelete(AuthUser $authUser, B2bOffering $b2bOffering): bool
    {
        return $authUser->can('ForceDelete:B2bOffering');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:B2bOffering');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:B2bOffering');
    }

    public function replicate(AuthUser $authUser, B2bOffering $b2bOffering): bool
    {
        return $authUser->can('Replicate:B2bOffering');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:B2bOffering');
    }

}