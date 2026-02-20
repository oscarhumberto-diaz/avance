<?php

namespace App\Policies;

use App\Models\Page;
use App\Models\User;
use App\Policies\Concerns\AuthorizesByRole;

class PagePolicy
{
    use AuthorizesByRole;

    public function viewAny(User $user): bool
    {
        return $this->isAdminOrEditor($user);
    }

    public function view(User $user, Page $page): bool
    {
        return $this->isAdminOrEditor($user);
    }

    public function create(User $user): bool
    {
        return $this->isAdminOrEditor($user);
    }

    public function update(User $user, Page $page): bool
    {
        return $this->isAdminOrEditor($user);
    }

    public function delete(User $user, Page $page): bool
    {
        return $this->isAdminOrEditor($user);
    }

    public function restore(User $user, Page $page): bool
    {
        return $this->isAdmin($user);
    }

    public function forceDelete(User $user, Page $page): bool
    {
        return $this->isAdmin($user);
    }
}
