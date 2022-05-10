<?php

namespace App\Policies;

use App\Models\Report;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if ($user->can('view_report')) {
            return true;
        }
    }

    public function view(User $user, Report $report = null)
    {
        if ($user->can('view_report')) {
            return true;
        }
        if ($report->patient_id == $user->patient?->id) {
            return true;
        }
    }

    public function create(User $user)
    {
        if ($user->can('create_report')) {
            return true;
        }
    }

    public function update(User $user)
    {
        if ($user->can('modify_report')) {
            return true;
        }
    }

    public function delete(User $user)
    {
        if ($user->can('modify_report')) {
            return true;
        }
    }
}
