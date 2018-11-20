<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Api\User;
use App\Models\Rating;

class RatingPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() { }

    public function create(User $user, Rating $rating) {
        return $user -> role === User::CLIENT_ROLE
            && !$user -> clientRatings() -> where('company_id', $rating -> company_id) -> count();
    }

    public function update(User $user, Rating $rating) {
        return $user -> id === $rating -> client_id;
    }

    public function delete(User $user, Rating $rating) {
        return $user -> id === $rating -> client_id;
    }
}
