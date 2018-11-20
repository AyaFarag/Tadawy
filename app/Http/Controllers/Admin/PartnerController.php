<?php

namespace App\Http\Controllers\Admin;

use App\Models\Api\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PartnerController extends Controller
{

    public function index() {
        $partners = User::where('partner', 1) -> paginate(10);

        return view("Admin.Partners.Index", compact('partners'));
    }


    public function create(Request $request)
    {
        $companies = User::where('role', User::COMPANY_ROLE);

        if ($request -> has('query')) {
            $query = "%{$request -> input('query')}%";
            $companies -> where('name', 'like', $query);
        }

        $companies = $companies -> paginate(10) -> appends($request -> query());


        return view("Admin.Partners.Create", compact('companies'));
    }

    public function store(Request $request, $id)
    {
        $company = User::where('role', User::COMPANY_ROLE)
            -> where('id', $id)
            -> firstOrFail();

        $company -> partner = 1;
        $company -> save();

        return redirect() -> route('admin.partner.index');
    }


    public function destroy($id)
    {
        $company = User::where('role', User::COMPANY_ROLE)
            -> where('partner', 1)
            -> where('id', $id)
            -> firstOrFail();

        $company -> partner = 0;
        $company -> save();

        return redirect() -> route('admin.partner.index');
    }
}
