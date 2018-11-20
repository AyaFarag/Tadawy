<?php

namespace App\Policies;

use App\Models\Api\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriptionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() { }

    public function create(User $user) {
        return $user -> role === User::COMPANY_ROLE;
    }
}
