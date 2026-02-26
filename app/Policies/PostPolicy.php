<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, Post $post)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Post $post)
    {
        return $user->isAdmin();
    }
}
