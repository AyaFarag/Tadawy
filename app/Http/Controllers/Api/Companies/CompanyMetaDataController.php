<?php

namespace App\Http\Controllers\Api\Companies;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Companies\CompanyMetaDataRequest;
use App\Models\CompanyMetaData;
use App\Http\Resources\CompanyMetaDataResource;

use Auth;

class CompanyMetaDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyMetaDataRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyMetaDataRequest $request)
    {
        $this->authorize('update',CompanyMetaData::class);

        $user = Auth::user();
        if (
            $request -> has('website')
            || $request -> has('license_image')
            || $request -> has('images')
            || $request -> has('logo')
            || $request -> has('social_networks')
        ) {
            $metaData = $user -> meta;
            if ($request -> has('images')) {
                $metaData -> images = $request -> input('images');
            }

            if ($request -> has('social_networks')) {
                $metaData -> social_networks = $request -> input('social_networks');
            }

            $metaData -> fill(
                $request->only([
                    'website',
                    'license_image',
                    'logo'
                ])
            );

            $metaData -> save();
        }

        if (
            $request -> has("name")
            || $request -> has("description")
            || $request -> has("city_id")
            || $request -> has("country_id")
            || $request -> has("specialization_id")
        ) {
            $user->update(
                $request->only([
                    'name',
                    'description',
                    'city_id',
                    'country_id',
                    'specialization_id'
                ])
            );
        }



        return response()->json([
            'message'=> trans('api.Updated successfully')
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyMetaData $metaData)
    {
        // $this->authorize('delete',$metaData);
        // $metaData->delete();
        // return response()->json([
        //     'message'=> trans('api.Deleted successfully')
        // ],200);
    }
}
