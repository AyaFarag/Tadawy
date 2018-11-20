<?php

namespace App\Http\Controllers\Admin;

use App\Models\Specialization;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\SpecializationRequest;
use App;
use App\Http\Controllers\Controller;


class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialization = Specialization::orderBy('id','desc')->get();
        $category = Category::orderBy('id','desc')->get();
        return view('Admin.Specialization.View', compact('specialization','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Specialization $specialization)
    {
        $category = Category::orderBy('id','desc')->get();
        return view('Admin.Specialization.Create', compact('specialization','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecializationRequest $request)
    {
        // $specialization =  Specialization::create($request->all());
        // return back()->with('success', 'Name added successully!');

        $specialization =  new App\Models\Specialization();
        $specialization->name = $request->specialization;
        $specialization->category_id = $request->category;
        $specialization->save();
        return back()->with('success', 'Name added successully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function show(Specialization $specialization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialization $specialization)
    {
        $category = Category::orderBy('id','desc')->get();
        return view('Admin.Specialization.edit', compact('specialization','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function update(SpecializationRequest $request, $id)
    {
        $specialization = Specialization::find($id);
        $specialization->name = $request->specialization;
        $specialization->category_id = $request->category;
        $specialization->save();
        return redirect()->route('admin.specialization.index')->with('success', 'Name updated successully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialization $specialization)
    {
        $specialization->delete();
        return back()->with('success', 'Deleted successfully!');
    }
}
