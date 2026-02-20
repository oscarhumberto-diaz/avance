<?php

namespace App\Policies\Concerns;

use App\Models\User;

trait AuthorizesByRole
{
    private function hasRole(User $user, array $roles): bool
    {
        return in_array($user->role, $roles, true);
    }

    private function isAdmin(User $user): bool
    {
        return $this->hasRole($user, ['admin']);
    }

    private function isAdminOrEditor(User $user): bool
    {
        return $this->hasRole($user, ['admin', 'editor']);
    }

    private function isAdminOrLeader(User $user): bool
    {
        return $this->hasRole($user, ['admin', 'leader']);
    }
}
