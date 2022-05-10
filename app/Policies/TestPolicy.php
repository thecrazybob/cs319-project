<?php

namespace App\Policies;

use App\Models\Test;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Test $test
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if ($user->can('view_test')) {
            return true;
        }
    }

    public function view(User $user, Test $test = null)
    {
        if ($user->can('view_test')) {
            return true;
        } elseif ($test->patient_id == $user->patient?->id) {
            return true;
        }
    }

    public function create(User $user)
    {
        if ($user->can('create_test')) {
            return true;
        }
    }

    public function update(User $user)
    {
        if ($user->can('modify_test')) {
            return true;
        }
    }

    public function delete(User $user)
    {
        if ($user->can('modify_test')) {
            return true;
        }
    }
}
