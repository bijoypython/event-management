<?php

namespace App\Http\Controllers;

use App\Models\Eventname;
use Illuminate\Http\Request;

class EventnameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Eventname::all();
        return response ()->json([ 'success'=>true,'data'=>$data, 'message' =>'successfully show']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Eventname::create([
            'name' => $request->input('name'),
        ]);
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => 'Created successfully!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Eventname $eventname)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eventname $eventname)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eventname $eventname)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Eventname::find($id)->delete();
        return response()->json(['success'=>true,'message'=>' deleted successfully!']);
    }
}
