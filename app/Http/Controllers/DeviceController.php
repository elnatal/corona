<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
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
        $device->status = "0";
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
