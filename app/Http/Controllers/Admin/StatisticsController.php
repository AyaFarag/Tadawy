<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Api\User;
use App\Models\Visitor;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function index() {
        $client_count = User::where('role', User::CLIENT_ROLE) -> count();
        $company_count = User::where('role', User::COMPANY_ROLE) -> count();
        $visitor_count = Visitor::count();

        return view(
            'Admin.Statistics.index',
            compact('client_count', 'company_count', 'visitor_count')
        );
    }
}
