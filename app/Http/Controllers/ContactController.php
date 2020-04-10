<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contact::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'contacts' => 'required'
        ]);

        for ($i=0; $i < count($request->get('contacts')); $i++) { 
            $data = $request->get('contacts')[$i];
            $contact = new Contact();

            $contact->length = $data['length'];
            $contact->user1 = $data['user1'];
            $contact->user2 = $data['user2'];
            $contact->lat = $data['lat'];
            $contact->long = $data['long'];
            $contact->time = $data['time'];
            $contact->save();
        }
        return 200;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contact($id)
    {
        $contacts = Contact::where('user1', $id)->paginate(20);
        return view('pages.contact', compact('contacts'));
    }

    public function heatmap()
    {
        $contacts = Contact::whereDate('created_at', '>=', Carbon::today()->subDay()->toDateString())->get();
        return view('pages.heatmap', compact('contacts'));
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
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return $contact;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return 204;
    }
}
