<?php

// In app/Policies/FaqQuestionPolicy.php

namespace App\Policies;

use App\Models\User;
use App\Models\FaqQuestion;
use Illuminate\Auth\Access\HandlesAuthorization;

class FaqQuestionPolicy
{
    public function viewAny(User $user)
    {
        return true; // Alle gebruikers kunnen alle vragen bekijken
    }

    public function view(User $user)
    {
        return true; // Alle gebruikers kunnen een specifieke vraag bekijken
    }

    public function create(User $user)
    {
        return $user->is_admin; // Alleen admins kunnen vragen maken
    }

    public function update(User $user)
    {
        return $user->is_admin; // Alleen admins kunnen vragen bijwerken
    }

    public function delete(User $user)
    {
        return $user->is_admin; // Alleen admins kunnen vragen verwijderen
    }
}
