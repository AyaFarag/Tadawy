<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;
use App;
use App\Http\Controllers\Controller;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = City::orderBy('id','desc')->get();
        return view('Admin.City.View', compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(City $city)
    {
        $country = App\Models\Country::orderBy('id','desc')->get();
        return view('Admin.City.Create', compact('city','country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        // City::create($request->all());
        // return back()->with('success', 'Name added successully!');
        $this->validate($request, array(
            'name' => 'required',
            'country' => 'required',
        ));

        $city =  new App\Models\City();
        $city->name = $request->name;
        $city->country_id = $request->country;

        $city->save();

        return back()->with('success', 'Name added successully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city, Country $country)
    {
        $country = Country::all();
        return view('Admin.City.edit', compact('city','country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required',
        ));

        $city = App\Models\City::find($id);
        $city->name = $request->name;
        $city->country_id = $request->country;

        $city->save();

        return redirect()->route('admin.city.index')->with('success', 'Name added successully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return back()->with('success', 'Deleted successfully!');
    }
}
