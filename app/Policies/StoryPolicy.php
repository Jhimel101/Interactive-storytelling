<?php

namespace App\Policies;

use App\Models\Story;
use App\Models\User;

class StoryPolicy
{
    public function viewDashboard(User $user)
    {
        return $user->role === 'author';
    }

    public function createStory(User $user)
    {
        return $user->role === 'author';
    }
}
