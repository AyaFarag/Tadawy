<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\User;

use App\Http\Resources\CompanyResource;

use DB;

class SearchController extends Controller
{
    private function applySorting($query, $sort) {
        $sortBy    = strtolower(ltrim($sort, '-')); // Sort by rating|time
        $sortDir   = 'ASC'; // Sort direction ASC|DESC

        if (strpos($sort, '-') !== false) {
            $sortDir = 'DESC';
        }

        switch ($sortBy) {
        case 'rating':
            $query
                -> leftJoin('ratings', 'ratings.company_id', '=', 'users.id')
                -> select([
                    'ratings.*',
                    'users.*',
                    DB::raw('AVG(ratings.rate) as average_rating')
                ])
                -> where('users.role', User::COMPANY_ROLE)
                -> orderBy('average_rating', $sortDir)
                -> groupBy('ratings.company_id');
            break;
        case 'time':
            $query -> orderBy('created_at', $sortDir);
        }
    }
    public function search(Request $request) {
        $companies = User::where('role', User::COMPANY_ROLE);

        if ($request -> has('city')) {
            $companies -> where('city_id', $request -> input('city'));
        }

        if ($request -> has('specialization')) {
            $companies -> where('specialization_id', $request -> input('specialization'));
        }

        if ($request -> has('country')) {
            $country = $request -> input('country');
            $companies -> whereHas('city', function ($query) use ($country) {
                $query -> where('country_id', $country);
            });
        }


        if ($request -> has('category')) {
            $category = $request -> input('category');
            $companies -> whereHas('specialization', function ($query) use ($category) {
                $query -> where('category_id', $category);
            });
        }


        if ($request -> has('sort')) {
            $this -> applySorting($companies, $request -> input('sort'));
        }

        if ($request -> has('type')) {
            $companies -> where('type', $request -> input('type'));
        }

        return CompanyResource::collection(
            $companies -> paginate(10)
                -> appends($request -> query())
        );
    }
}
