<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Tenant;
use App\Http\Requests\CreateTenantsRequest;
use App\Http\Requests\UpdateTenantRequest;

use Illuminate\Support\Facades\Storage;

class TenantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('tenants.index')->with([
            'tenants' => Tenant::all(),
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
        return view('tenants.create')->with([
            'properties' => Property::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTenantsRequest $request)
    {
        //

        if($request->hasFile('files')){
            //upload it
            $file = $request->file('files')->store('file','public');
        }else{
            $file=NULL;
        }

        Tenant::create([
            'property_id' => $request->property_id,
            'apartment_number' => $request->apartment_number,
            'full_name' => $request->full_name,
            'mobile_phone' => $request->mobile_phone,
            'email' => $request->email,
            'start_date' =>$request->start_date,
            'security_deposit' => $request->security_deposit,
            'files' => $file,

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
    public function show(Tenant $tenant)
    {
        //
        return view('tenants.details',[
            'tenant' =>  $tenant,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        //
        return view('tenants.create', [
            'tenant' => $tenant,
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
    public function update(UpdateTenantRequest $request,  Tenant $tenant)
    {
        //
        $data = $request->all();


        //
        if($request->hasFile('files')){
         //upload it
           $files = $request->file('files')->store('file','public');
         //delete the old one
         Storage::disk('public')->delete('storage/'. $tenant->files);

         $data['files']= $files;

        }

        //update

        $tenant->update($data);

        session()->flash('success', 'You have successfully updated the Tenant Info');
        return redirect()->route('tenants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        //
        //
        if($tenant->bills->count() > 0 || $tenant->workOrders->count() > 0 || $tenant->payments->count() > 0 || $tenant->leases->count() > 0 ){

            session()->flash('error', 'Tenant cannot be deleted because it has some data linked to it');

            return redirect()->back();
        }

        $tenant->delete();

        session()->flash('success', 'Tenant successfully deleted');

         return redirect()->route('home');
    }
}
