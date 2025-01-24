<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;

class BlogPolicy
{
    /**
     * Determine whether the user can update the blog.
     */
    public function update(User $user, Blog $blog)
    {
        // ブログの投稿者とログイン中のユーザーが一致する場合に許可
        return $user->id === $blog->user_id;
    }

    /**
     * Determine whether the user can delete the blog.
     */
    public function delete(User $user, Blog $blog)
    {
        // ブログの投稿者とログイン中のユーザーが一致する場合に許可
        return $user->id === $blog->user_id;
    }
}