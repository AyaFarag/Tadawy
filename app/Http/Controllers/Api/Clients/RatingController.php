<?php

namespace App\Http\Controllers\Api\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Clients\RatingRequest;
use App\Models\Rating;

class RatingController extends Controller
{
     /**
     * @param RatingRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(RatingRequest $request)
    {

        $rate = new Rating();
        $data = $request->input();
        $data ['client_id'] = auth()->user()->id;
        $rate->fill($data);
        $this->authorize('create',$rate);
        if($rate->save()){
            return response()->json([
                'message'=> trans('api.Added successfully')
            ],201);
        }else{
            return response()->json([
                'message'=> trans('api.Unexpected error')
            ],500);
        }
    }
    public function update(RatingRequest $request , Rating $rate)
    {
        $this->authorize('update',$rate);
        $rate->update(array_filter($request->input()));
        return response()->json([
            'message'=> trans('api.Updated successfully')
        ],200);
    }
    public function destroy(Rating $rate)
    {
        $this->authorize('delete',$rate);
        $rate->delete();
        return response()->json([
            'message'=> trans('api.Deleted successfully')
        ],200);
    }
}
