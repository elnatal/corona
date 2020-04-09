<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmergencyContact;

class EmergencyContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $emergencyContact = EmergencyContact::orderBy('id', 'desc')->paginate(20);
        if ($request->is('api/*')) {
            return $emergencyContact;
        } else {
            return view('pages.emergency_contact.list', compact('emergencyContact'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.emergency_contact.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EmergencyContact::create($request->all());

        return redirect('/emergency-contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return EmergencyContact::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emergencyContact = EmergencyContact::findOrFail($id);
        return view('pages.emergency_contact.edit', compact('emergencyContact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $emergencyContact = EmergencyContact::findOrFail($id);
        $emergencyContact->update($request->all());

        return redirect('/emergency-contact');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emergencyContact = EmergencyContact::findOrFail($id);
        $emergencyContact->delete();

        return 204;
    }
}
