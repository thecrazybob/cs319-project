<?php

namespace App\Policies;

use App\Models\Document;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if ($user->can('view_file')) {
            return true;
        }
    }

    public function view(User $user, Document $document = null)
    {
        if ($user->can('view_file')) {
            return true;
        }
        if ($document?->patient_id == $user->patient?->id) {
            return true;
        }
    }

    public function create(User $user, Document $document = null)
    {
        if ($user->can('create_file')) {
            return true;
        }
        if ($document?->patient_id == $user->patient?->id) {
            return true;
        }
    }

    public function update(User $user, Document $document = null)
    {
        if ($user->can('modify_file')) {
            return true;
        }
        if ($document?->patient_id == $user->patient?->id) {
            return true;
        }
    }

    public function delete(User $user, Document $document = null)
    {
        if ($user->can('modify_file')) {
            return true;
        }
        if ($document?->patient_id == $user->patient?->id) {
            return true;
        }
    }
}
