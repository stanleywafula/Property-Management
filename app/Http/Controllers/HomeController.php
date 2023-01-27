<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Lease;
use App\Models\Payment;
use App\Models\Bill;
use App\Models\Property;
use App\Models\WorkOrder;
use App\Models\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == 'tenant'){
            $user_email = auth()->user()->email;

            $user= Tenant::where('email', $user_email)->first();

            $user_bills = Null;
            $user_lease = Null;
            $user_payments = Null;
            $user_work =  Null;

            if(!$user == Null){

            $user_bills =  Bill::where('tenant_id', $user->id)->get();

            $user_lease =  Lease::where('tenant_id', $user->id)->get();

            $user_payments =  Payment::where('tenant_id', $user->id)->get();

            $user_works =  WorkOrder::where('tenant_id', $user->id)->get();

            }



            return view('users.user-dashboard', [
            'bills' => $user_bills,
            'leases' => $user_lease,
            'payments' => $user_payments,
            'works' => $user_works,
            ]);
        }


        return view('home',
    [
        'bills' => Bill::all(),
        'payments' => Payment::all(),
        'tasks' => Task::all(),
        'properties' => Property::all(),
        'works' => WorkOrder::all(),
    ]);
    }
}
