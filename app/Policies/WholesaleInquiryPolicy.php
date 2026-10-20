<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\WholesaleInquiry;
use Illuminate\Auth\Access\HandlesAuthorization;

class WholesaleInquiryPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:WholesaleInquiry');
    }

    public function view(AuthUser $authUser, WholesaleInquiry $wholesaleInquiry): bool
    {
        return $authUser->can('View:WholesaleInquiry');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:WholesaleInquiry');
    }

    public function update(AuthUser $authUser, WholesaleInquiry $wholesaleInquiry): bool
    {
        return $authUser->can('Update:WholesaleInquiry');
    }

    public function delete(AuthUser $authUser, WholesaleInquiry $wholesaleInquiry): bool
    {
        return $authUser->can('Delete:WholesaleInquiry');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:WholesaleInquiry');
    }

    public function restore(AuthUser $authUser, WholesaleInquiry $wholesaleInquiry): bool
    {
        return $authUser->can('Restore:WholesaleInquiry');
    }

    public function forceDelete(AuthUser $authUser, WholesaleInquiry $wholesaleInquiry): bool
    {
        return $authUser->can('ForceDelete:WholesaleInquiry');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:WholesaleInquiry');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:WholesaleInquiry');
    }

    public function replicate(AuthUser $authUser, WholesaleInquiry $wholesaleInquiry): bool
    {
        return $authUser->can('Replicate:WholesaleInquiry');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:WholesaleInquiry');
    }

}