<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\ModeratorRequest;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Hash;

class ModeratorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moderators = Admin::where('role', Admin::MODERATOR_ROLE) -> get();

        return view('Admin.Moderator.Index', compact('moderators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Moderator.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModeratorRequest $request)
    {
        $data = $request -> all();
        $data['password'] = Hash::make($data['password']);

        $admin = new Admin($data);
        $admin -> role = Admin::MODERATOR_ROLE;
        $admin -> save();

        return redirect() -> route('admin.moderator.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $moderator)
    {
        return view('Admin.Moderator.Edit', compact('moderator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModeratorRequest $request, Admin $moderator)
    {
        $data = $request -> all();

        $data['password'] = Hash::make($data['password']);

        $moderator -> update($data);

        return redirect() -> route('admin.moderator.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $moderator)
    {
        $moderator -> delete();

        return redirect() -> route('admin.moderator.index');
    }
}
