<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if ($user->can('view_invoice')) {
            return true;
        }
    }

    public function view(User $user)
    {
        if ($user->can('view_invoice')) {
            return true;
        }
    }

    public function create(User $user)
    {
        if ($user->can('create_invoice')) {
            return true;
        }
    }

    public function update(User $user)
    {
        if ($user->can('modify_invoice')) {
            return true;
        }
    }

    public function delete(User $user)
    {
        if ($user->can('modify_invoice')) {
            return true;
        }
    }
}
