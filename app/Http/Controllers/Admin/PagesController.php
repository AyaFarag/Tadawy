<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pages;
use Illuminate\Http\Request;
use App\Http\Requests\PagesRequest;
use App;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::all();
        return view('Admin.Pages.View',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pages $pages)
    {
        return view('Admin.Pages.Create',compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PagesRequest $request)
    {
        $input = $request->input();
        $pages =  Pages::create($request->all());

        return back()->with('success', 'Sectiion added successully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(Pages $pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pages = Pages::find($id);
        return view('Admin.Pages.Edit', compact('pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(PagesRequest $request, $id)
    {
        $pages = Pages::find($id);
        $pages->update($request->all());

        return redirect()->route('admin.pages.index')->with('success', 'Section updated successully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pages $pages)
    {
        $pages -> delete();


        return redirect()->route('admin.pages.index')->with('success', 'Section deleted successfully!');
    }
}
