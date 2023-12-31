<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

public function viewAny(User $user)
{
    return $user->is_admin === 1;
}

public function promote(User $user, User $targetUser)
{
    // Hier kun je de logica aanpassen op basis van je specifieke vereisten.
    // Bijvoorbeeld, alleen admins kunnen andere gebruikers promoten.
    return $user->is_admin === 1 && $targetUser->is_admin === 0;
}

}
