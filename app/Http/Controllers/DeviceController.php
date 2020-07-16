<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     
     
    /**
     * api requests
     */
     
    public function likly(Request $request)
    {
        $userId = $request->input('userid');
    
        $infectedUsers = Device::where('status', '2')->latest('status')->count();
        $contacts1 = Contact::where('user1',$userId)->distinct()->count('user2');
        $contacts2 = Contact::where('user2',$userId)->distinct()->count('user1');

        $contacts = $contacts1 + $contacts2;
        // $contacts = Contact::where('user1',$userId)->orWhere('user2',$userId);

        /**
         * percent by connection
         */
         $lastcontact = Contact::where('user1',$userId)->latest()->take(10)->get();
         $connPercent = 0;
         foreach ($lastcontact as &$patientRecord) {
            $user2 = $patientRecord->user2;
            $userContact = Contact::where('user1',$user2);
            
            foreach ($userContact as &$nodeRecord){
                $usern2 = $patientRecord->user2;
                $count = Device::where('status', '2')-orWhere('status', '3');
                $connPercent = $connPercent + 50 * $count;
            }
         }
         if($connPercent>100){
             $connPercent =100;
         }
         
        /**
        * percent by the number of people in the area
        */
        
        $geoPercent = 0;
        
         $totalPercent = $geoPercent*0.25 + $connPercent * 0.75;
        
        return ["numberofcontact" => $contacts ,"likelyhood" => $totalPercent,"newcases" => $infectedUsers];
    }
     
     
     /**
     * end of api requests
     */



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $devices = Device::orderBy('id', 'desc')->paginate(20);
        if ($request->is('api/*')) {
            return $devices;
        } else {
            return view('pages.devices', compact('devices'));
        }
    }

    public function tracker()
    {
        $devices = Device::Where('status', '2')->orWhere('status', '3')->orderBy('id', 'desc')->paginate(20);
        return view('pages.tracker', compact('devices'));
    }

    public function search(Request $request)
    {
        $value = $request->input('q');
        $devices = Device::where('name', 'LIKE', '%' . $value . '%')->orWhere('phone', 'LIKE', '%' . $value . '%')->orWhere('mac_address', 'LIKE', '%' . $value . '%')->orderBy('id', 'desc')->limit(20)->get();

        return view('pages.finder', compact('devices'));
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
            'name' => 'required',
            'phone' => ['required', 'unique:devices'],
            "mac_address" => 'required'
        ]);
        $device = new Device();
        $device->name = $request->get('name');
        $device->phone = $request->get('phone');
        $device->mac_address = $request->get('mac_address');
        $device->status = "1";
        $device->save();

        return $device;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($phone)
    {
        return Device::where('phone', $phone)->get();
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
        $device = Device::findOrFail($id);
        $device->update(['status' => $request->get('status')]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
