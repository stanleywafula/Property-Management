<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use App\Models\Property;
use App\Http\Requests\CreateMemosRequest;

class MemosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('memo.index', [
            'memos' => Memo::all(),
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
        return view('memo.create', [
            'properties' => Property::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMemosRequest $request)
    {
        //
        Memo::create([
            'property_id' => $request->property_id,
            'subject' => $request->subject,
            'to' => $request->subject,
            'from' => $request->from,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        session()->flash('success', ' You have successfully posted a new Mmeo');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Memo $memo)
    {
        //
        return view('memo.details', [
            'memo' => $memo,
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
    public function destroy(Memo $memo)
    {
        //

        $memo->delete();

        session()->flash('success', 'Memo successfully deleted');

         return redirect()->route('home');
    }
}
