<?php

namespace App\Http\Controllers\Api\Companies;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Companies\AdRequest;
use App\Http\Resources\AdResource;
use App\Models\Ad;

class AdController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        $ads = auth()->user()->ads()->latest()->paginate();
        return AdResource::collection($ads);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return AdResource
     */
    public function store(AdRequest $request)
    {
        $this->authorize('create',Ad::class);
        $ad = auth()->user()->ads()->create($request->inputs());
        return new AdResource($ad);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return AdResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(AdRequest $request, Ad $ad)
    {
        $this->authorize('update',$ad);
        $updated_at = $ad->updated_at;
        $ad->update($request->inputs());
        if ($updated_at != $ad->updated_at){
            $ad->accepted_at = null;
            $ad->save();
        }
        return new AdResource($ad);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Ad $ad)
    {
       $this->authorize('delete',$ad);
        $ad->delete();
        return response()->json([
            'message'=> trans('api.Deleted successfully')
        ],200);
    }
}
