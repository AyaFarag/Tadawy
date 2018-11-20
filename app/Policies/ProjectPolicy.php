<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Api\User;
use App\Models\Project;

class ProjectPolicy
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

    public function update(User $user, Project $project) {
        return $user -> id === $project -> company_id;
    }

    public function delete(User $user, Project $project) {
        return $user -> id === $project -> company_id;
    }
}
