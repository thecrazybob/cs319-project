<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DoctorPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if ($user->can('view_doctor')) {
            return true;
        }
    }

    public function view(User $user)
    {
        if ($user->can('view_doctor')) {
            return true;
        }
    }

    public function create(User $user)
    {
        if ($user->can('create_doctor')) {
            return true;
        }
    }

    public function update(User $user)
    {
        if ($user->can('modify_doctor')) {
            return true;
        }
    }

    public function delete(User $user)
    {
        if ($user->can('modify_doctor')) {
            return true;
        }
    }
}
