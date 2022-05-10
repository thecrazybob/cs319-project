<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Support;
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

    public function view(User $user, Support $support)
    {
        return $support->patient_id == $user->patient->id;
    }
}
