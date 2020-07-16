<?php

namespace App\Http\Controllers;

use App\CaseRecord;
use App\Contact;
use App\Device;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $infectedUsers = Device::where('status', '2')->count();
        $death = Device::where('status', '3')->count();
        $recovery = Device::where('status', '4')->count();

        $newUsers = Device::whereDate('created_at', '>=', Carbon::today()->subDay()->toDateString())->count();
        $users = Device::count();
        $contacts = Contact::count();

        return view('pages.dashboard', compact(['newUsers', 'users', 'infectedUsers', 'contacts', 'death', 'recovery']));

    }
}
