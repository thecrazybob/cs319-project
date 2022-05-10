<?php

namespace App\Policies;

use App\Models\Support;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupportPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if ($user->can('view_ticket')) {
            return true;
        }
    }

    public function view(User $user, Support $support = null)
    {
        if ($user->can('view_ticket')) {
            return true;
        }
        if ($support?->patient_id == $user->patient?->id) {
            return true;
        }
    }

    public function create(User $user)
    {
        if ($user->can('create_ticket')) {
            return true;
        }
    }

    public function update(User $user)
    {
        if ($user->can('modify_ticket')) {
            return true;
        }
    }

    public function delete(User $user)
    {
        if ($user->can('modify_ticket')) {
            return true;
        }
    }
}
