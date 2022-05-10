<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupportPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function viewAny(User $user)
    {
        if ($user->hasRole('')) {
            return true;
        }
    }




}
