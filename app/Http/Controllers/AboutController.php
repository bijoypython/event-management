<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=About::all();
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
        $data = About::create([
            'slogan' => $request->input('slogan'),
            'title' => $request->input('title'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'date' => $request->input('date'),
            'address' => $request->input('address'),
        ]);
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => 'created successfully!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        About::find($id)->delete();
        return response()->json(['success'=>true,'message'=>' deleted successfully!']);
    }
}
