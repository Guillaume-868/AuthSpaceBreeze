<?php

namespace App\Policies;

use App\Models\Planet;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PlanetsPolicy
{
    // Peut créer si permission
    public function create(User $user): bool
    {
        return $user->can('planets.create');
    }

    // Peut mettre à jour s'il a la permission ET (est auteur OU est editor/admin)
    public function update(User $user, Planet $planets): bool
    {
        return $user->can('planets.edit') && (
            $planets->user_id === $user->id || $user->hasRole(['admin', 'planetsmanager'])
        );
    }

    // Peut supprimer s'il a la permission ET (est auteur OU editor/admin)
    public function delete(User $user, Planet $planets): bool
    {
        return $user->can('planets.delete') && (
            $planets->user_id === $user->id || $user->hasRole(['admin', 'planetsmanager'])
        );
    }

    // Publier / dépublier : permission dédiée
    public function publish(User $user, Planet $post): bool
    {
        return $user->can('planets.publish');
    }
}
