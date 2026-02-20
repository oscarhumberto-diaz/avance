<?php

namespace App\Policies;

use App\Models\User;
use App\Policies\Concerns\AuthorizesByRole;

class MaterialPolicy
{
    use AuthorizesByRole;

    public function viewAny(User $user): bool
    {
        return $this->isAdminOrEditor($user);
    }

    public function view(User $user, mixed $material): bool
    {
        return $this->isAdminOrEditor($user);
    }

    public function create(User $user): bool
    {
        return $this->isAdminOrEditor($user);
    }

    public function update(User $user, mixed $material): bool
    {
        return $this->isAdminOrEditor($user);
    }

    public function delete(User $user, mixed $material): bool
    {
        return $this->isAdminOrEditor($user);
    }
}
