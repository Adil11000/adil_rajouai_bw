<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function before($user, $ability)
    {
        if ($user->is_admin()) {
            return true; // Beheerders hebben altijd toegang
        }
    }
    
    public function edit(User $user)
{
    return $user->is_admin;
}

public function delete(User $user)
{
    return $user->is_admin;
}

use HandlesAuthorization;

    public function create(User $user)
    {
        // Hier bepaal je de logica voor wie de 'create'-machtiging heeft
        return $user->is_admin; // Bijvoorbeeld, alleen admins mogen producten toevoegen
    }
    
}
