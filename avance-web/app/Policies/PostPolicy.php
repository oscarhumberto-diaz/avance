<?php

namespace App\Policies;

use App\Models\User;
use App\Policies\Concerns\AuthorizesByRole;

class PostPolicy
{
    use AuthorizesByRole;

    public function viewAny(User $user): bool
    {
        return $this->isAdminOrEditor($user);
    }

    public function view(User $user, mixed $post): bool
    {
        return $this->isAdminOrEditor($user);
    }

    public function create(User $user): bool
    {
        return $this->isAdminOrEditor($user);
    }

    public function update(User $user, mixed $post): bool
    {
        return $this->isAdminOrEditor($user);
    }

    public function delete(User $user, mixed $post): bool
    {
        return $this->isAdminOrEditor($user);
    }
}
