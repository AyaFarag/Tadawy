<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsRequest;
use App;
use App\Http\Controllers\Controller;
class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contacts::latest()->first();
        if(!$contacts){
            $contacts = Contacts::create([
                'address' => '',
                'phone' => '',
                'email' => '',
              ]);
        }

        return view('Admin.Contacts.View' ,compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Contacts $contacts)
    {
        return view('Admin.Contacts.Create' ,compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactsRequest $request)
    {
        $contacts =  Contacts::create($request->all());
        return back()->with('success', 'Name added successully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $contacts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacts $contacts)
    {
        return view('Admin.Contacts.Edit' ,compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(ContactsRequest $request, Contacts $contacts)
    {
        $contacts = $contacts->update($request->all());
        return redirect()->route('admin.contacts.index')->with('success', 'Name updated successully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacts $contacts)
    {
        $contacts->delete();
        return back()->with('success', 'Deleted successfully!');
    }
}
