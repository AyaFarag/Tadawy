<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Api\User;
use App\Models\WorkDay;

class WorkDayPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() { }


    public function view(User $user) {
        return $user -> role === User::COMPANY_ROLE;
    }

    // public function create(User $user) {
    //     return $user -> role === User::COMPANY_ROLE;
    // }

    public function update(User $user) {
        return $user -> role === User::COMPANY_ROLE;
    }

    // public function delete(User $user, WorkDay $workDay) {
    //     return $user -> id === $workDay -> company_id;
    // }
}
