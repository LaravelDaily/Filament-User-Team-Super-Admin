<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole(['user', 'team admin']);
    }

    public function view(User $user, Task $task): bool
    {
        return $user->hasRole(['user', 'team admin']);
    }

    public function create(User $user): bool
    {
        return $user->hasRole(['user', 'team admin']);
    }

    public function update(User $user, Task $task): bool
    {
        return $user->hasRole(['user', 'team admin']);
    }

    public function delete(User $user, Task $task): bool
    {
        return $user->hasRole(['user', 'team admin']);
    }
}
