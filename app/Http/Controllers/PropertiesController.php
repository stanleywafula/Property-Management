<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Requests\CreatePropertiesRequest;
use App\Notifications\NewPropertyAdded;
use App\Http\Requests\UpdatePropertyRequest;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('property.index')->with([
            'properties' => Property::all(),
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
        return view('property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePropertiesRequest $request)
    {
        //
        Property::create([

            'property_type' => $request->property_type,
            'property_name' => $request->property_name,
            'address' => $request->address,
            'city' => $request->city,
            'county' => $request->county,
            'zip' => $request->zip,
            'country' => 'Kenya',
        ]);

        $user = auth()->user();

        $user->notify(new NewPropertyAdded($user));

        session()->flash('success', ' You have successfully added a new Property');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
        return view('property.details', [
            'property' => $property,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
        return view('property.create', [
            'property' => $property,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        //
        $data=$request->all();

        $property->update($data);

        session()->flash('success', 'You have successfully updated the property');

        return redirect()->route('properties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
        if($property->tenants->count() > 0 || $property->workOrders->count() > 0 || $property->tasks->count() > 0 || $property->services->count() > 0 || $property->memo->count() > 0 ){

            session()->flash('error', 'Property cannot be deleted because it has some data linked to it');

            return redirect()->back();
        }

        $property->delete();

        session()->flash('success', 'Property successfully deleted');

         return redirect()->route('home');
    }
}
