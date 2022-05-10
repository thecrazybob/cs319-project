<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vaccine;
use Illuminate\Auth\Access\HandlesAuthorization;

class VaccinePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if ($user->can('view_test')) {
            return true;
        }
    }

    public function view(User $user, Vaccine $vaccine = null)
    {
        if ($user->can('view_test')) {
            return true;
        }
        if ($vaccine->patient_id == $user->patient?->id) {
            return true;
        }
    }

    public function create(User $user)
    {
        if ($user->can('create_test')) {
            return true;
        }
    }

    public function update(User $user, Vaccine $vaccine)
    {
        if ($user->can('modify_test')) {
            return true;
        }
        if ($vaccine->patient_id == $user->patient?->id) {
            return true;
        }
    }

    public function delete(User $user, Vaccine $vaccine)
    {
        if ($user->can('modify_test')) {
            return true;
        }
        if ($vaccine->patient_id == $user->patient?->id) {
            return true;
        }
    }
}
