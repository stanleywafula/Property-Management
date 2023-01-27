<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Property;

use App\Http\Requests\CreateWorkOrdersRequest;
use App\Models\WorkOrder;
use App\Http\Requests\UpdateWorkOrderRequest;

class WordOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(auth()->user()->role == 'tenant'){
            $user_email = auth()->user()->email;

            $user= Tenant::where('email', $user_email)->first();

            $user_work =  Null;

            if(!$user == Null){

            $user_works =  WorkOrder::where('tenant_id', $user->id)->get();

            }



            return view('work.index',[
                'works' => $user_works,
            ]

            );
        }
        return view('work.index', [
            'works' => WorkOrder::all(),
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
        if(auth()->user()->role == 'tenant'){
            $user_email = auth()->user()->email;

            $tenant= Tenant::where('email', $user_email)->first();

            return view('work.user-work', [
                'renter' => $tenant,
                'tenants' => Tenant::all(),
                'properties' => Property::all(),
            ]);
        }

        return view('work.create', [
            'tenants' => Tenant::all(),
            'properties' => Property::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateWorkOrdersRequest $request)
    {
        //

        WorkOrder::create([
            'subject' => $request->subject,
            'property_id' => $request->property_id,
            'tenant_id' => $request->tenant_id,
            'category' => $request->category,
            'amount' => $request->amount,
            'charge' => $request->charge,
            'entry' => $request->entry,
            'notes' => $request->notes,
            'status' => $request->status,
            'priority' => $request->priority,
            'due_date' => $request->due_date,
        ]);

        session()->flash('success', ' You have successfully added a new Tenant');
        return redirect()->route('home');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(WorkOrder $wordorder)
    {
        //
        return view('work.details', [
            'work'=> $wordorder,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkOrder $wordorder)
    {
        //
        return view('work.create', [
            'work' => $wordorder,
            'tenants' => Tenant::all(),
            'properties' => Property::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkOrderRequest $request, WorkOrder $wordorder)
    {
        //
        $data = $request->all();

        $wordorder->update($data);

        session()->flash('success', 'You have successfully updated the Work Order');
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkOrder $wordorder)
    {
        //
        $wordorder->delete();

        session()->flash('success', 'Work Order successfully deleted');

        return redirect()->route('home');
    }
}
