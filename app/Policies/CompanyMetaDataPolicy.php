<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\Api\User;
use App\Models\CompanyMetaData;

class CompanyMetaDataPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() { }

    public function create(User $user) {
    }

    public function update(User $user) {
        return $user -> role === User::COMPANY_ROLE;
    }

    public function delete(User $user, CompanyMetaData $metaData) {
    }
}
