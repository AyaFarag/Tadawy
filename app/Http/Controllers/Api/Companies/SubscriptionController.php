<?php

namespace App\Http\Controllers\Api\Companies;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Companies\SubscriptionRequest;

use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store(SubscriptionRequest $request) {
        $this -> authorize('create', Subscription::class);

        $subscription = new Subscription($request -> all());
        $subscription -> save();

        return response()
            -> json([
                'message'=> trans('api.Updated successfully')
            ],200);
    }
}
