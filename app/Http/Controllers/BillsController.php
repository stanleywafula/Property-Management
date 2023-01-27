<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBillsRequest;
use App\Models\Tenant;
use App\Models\Bill;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('bills.index', [
            'bills'=> Bill::all(),
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
        return view('bills.create')->with([
            'tenants' => Tenant::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBillsRequest $request)
    {
        //
        Bill::create([
            'tenant_id' => $request->tenant_id,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'memo' => $request->memo,
            'amount' => $request->amount,
        ]);

        session()->flash('success', ' You have successfully added a new Bill');
        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
        return view('bills.details', [
            'bill' => $bill,
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
    public function destroy(Bill $bill)
    {
        //
        $bill->delete();

        session()->flash('success', 'Bill successfully deleted');

        return redirect()->route('home');

    }

    public function MarkPaid(Bill $bill){
        $bill->status = 'Paid';

        $bill->save();

        session()->flash('success', 'Bill status updated successfully');
        return  redirect()->route('bills.index');
    }
}
