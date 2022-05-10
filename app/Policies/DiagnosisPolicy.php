<?php

namespace App\Policies;

use App\Models\Diagnosis;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiagnosisPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function viewAny(User $user)
    {
        if ($user->can('view_diagnosis')) {
            return true;
        }
    }

    public function view(User $user, Diagnosis $diagnosis = null)
    {
        if ($user->can('view_diagnosis')) {
            return true;
        } elseif ($diagnosis->patient_id == $user->patient?->id) {
            return true;
        }
    }

    public function create(User $user)
    {
        if ($user->can('create_diagnosis')) {
            return true;
        }
    }

    public function update(User $user)
    {
        if ($user->can('modify_diagnosis')) {
            return true;
        }
    }

    public function delete(User $user)
    {
        if ($user->can('modify_diagnosis')) {
            return true;
        }
    }
}
