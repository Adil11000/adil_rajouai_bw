<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FaqCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class FaqCategoryPolicy
{
    public function viewAny(User $user)
    {
        return true; // Alle gebruikers kunnen alle categorieën bekijken
    }

    public function view(User $user)
    {
        return true; // Alle gebruikers kunnen een specifieke categorie bekijken
    }

    public function create(User $user)
    {
        return $user->is_admin; // Alleen admins kunnen categorieën maken
    }

    public function update(User $user)
    {
        return $user->is_admin; // Alleen admins kunnen categorieën bijwerken
    }

    public function delete(User $user)
    {
        return $user->is_admin; // Alleen admins kunnen categorieën verwijderen
    }
}
