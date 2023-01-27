<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Http\Requests\CreateLeasesRequest;
use App\Models\Lease;

class LeasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Lease.index', [
            'leases' => Lease::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Lease.create', [
            'tenants' => Tenant::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLeasesRequest $request)
    {
        //

        Lease::create([
            'tenant_id' => $request->tenant_id,
            'period' => $request->period,
            'amount' => $request->amount,
            'balance' => $request->balance,
        ]);

        session()->flash('success', ' You have successfully added a new Payment');
        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lease $lease)
    {
        //
        return view('Lease.details', [
            'lease' => $lease,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lease $lease)
    {
        //


        $lease->delete();

        session()->flash('success', 'Lease successfully deleted');

         return redirect()->route('home');
    }
}
