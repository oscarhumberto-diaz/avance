<?php

namespace App\Policies;

use App\Models\Material;
use App\Models\User;
use App\Policies\Concerns\AuthorizesByRole;

class MaterialPolicy
{
    use AuthorizesByRole;

    public function viewAny(?User $user = null): bool
    {
        return true;
    }

    public function view(?User $user, Material $material): bool
    {
        if (!$material->leaders_only) {
            return true;
        }

        return $user !== null && $this->isAdminLeaderOrEditor($user);
    }

    public function create(User $user): bool
    {
        return $this->isAdminOrEditor($user);
    }

    public function update(User $user, Material $material): bool
    {
        return $this->isAdminOrEditor($user);
    }

    public function delete(User $user, Material $material): bool
    {
        return $this->isAdminOrEditor($user);
    }
}
