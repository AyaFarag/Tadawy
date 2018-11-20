<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Comment'         => 'App\Policies\CommentPolicy',
        'App\Models\Rating'          => 'App\Policies\RatingPolicy',
        'App\Models\Ad'              => 'App\Policies\AdPolicy',
        'App\Models\WorkDay'         => 'App\Policies\WorkDayPolicy',
        'App\Models\CompanyMetaData' => 'App\Policies\CompanyMetaDataPolicy',
        'App\Models\Project'         => 'App\Policies\ProjectPolicy',
        'App\Models\Subscription'    => 'App\Policies\SubscriptionPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
