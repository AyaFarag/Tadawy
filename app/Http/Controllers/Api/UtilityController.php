<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\City;
use App\Models\Category;
use App\Models\Specialization;
use App\Models\Ad;
use App\Models\Api\User;
use App\Models\Pages;
use App\Models\Plan;
use App\Models\Setting;
use App\Models\Contacts;
use App\Http\Resources\CountryResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SpecializationResource;
use App\Http\Resources\AdResource;
use App\Http\Resources\PageResource;
use App\Http\Resources\PlanResource;
use App\Http\Resources\SettingResource;
use App\Http\Resources\ContactResource;


use Auth;

class UtilityController extends Controller
{
    /**
     * Display a listing of the country resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function countries()
    {
        return CountryResource::collection(Country::all());
    }

        /**
     * Display a listing of the city resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cities()
    {
        return CityResource::collection(City::all());
    }

        /**
     * Display a listing of the category resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        return CategoryResource::collection(Category::all());
    }

    /**
     * Display a listing of the specialization resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function specializations()
    {
        return SpecializationResource::collection(Specialization::all());
    }
    /**
     * Display a listing of the ad resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ads()
    {
        $ads = Ad::where('ended_at', '>=', date('Y-m-d H:i:s'));
        if (Auth::check()) {
            $ads -> where('city_id', Auth::user());
        }
        $ads -> latest();


        $ads = $ads -> paginate();

        return AdResource::collection($ads);
    }
    /**
     * Display a listing of the durations.
     *
     * @return \Illuminate\Http\Response
     */
    public function durations()
    {
        return response()->json(Ad::$durations);
    }
    public function page($slug){
        $page = Pages::where('slug',$slug)->first();
        return new PageResource($page);
    }

    public function plans() {
        $plans = Plan::all();
        return PlanResource::collection($plans);
    }

    public function settings() {
        $setting = Setting::firstOrFail();
        return new SettingResource($setting);
    }

    public function contacts() {
        return ContactResource::collection(Contacts::all());
    }

    public function CompanyTypes() {
        return response()->json(User::getCompanyType());
    }
}
