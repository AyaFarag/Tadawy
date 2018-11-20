<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\User;

use App\Http\Resources\CompanyDetailsResource;
use App\Http\Resources\CompanyDataResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\ProjectResource;

use Auth;

class CompanyDetailsController extends Controller
{
    public function data($id) {
        $company = $this -> getCompany($id);

        $company -> increment('views');
        $company -> save();

        return new CompanyDataResource($company);
    }

    public function details($id) {
        $company = $this -> getCompany($id);

        $company -> increment('views');
        $company -> save();


        return new CompanyDetailsResource($company);
    }

    public function comments($id) {
        $company = $this -> getCompany($id);

        $user = Auth::user();

        return CommentResource::collection($company -> companyComments() -> paginate(10))
            -> additional([
                "commentable" => $user
                    -> clientComments()
                    -> where("company_id", $id)
                    -> count() === 0
            ]);
    }

    public function projects($id) {
        $company = $this -> getCompany($id);
        return ProjectResource::collection($company -> projects() -> paginate(10));
    }

    private function getCompany($id) {
        return User::where('role', User::COMPANY_ROLE)
            -> where('id', $id)
            -> firstOrFail();
    }
}
